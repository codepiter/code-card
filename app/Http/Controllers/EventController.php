<?php
namespace App\Http\Controllers;

use App\Mail\CitaConfirmation;
use App\Mail\CancelCita;
use App\Mail\MessageReceived;
use App\Mail\Response;
use App\Events\EventEvent;
use App\Notifications\EventNotification;
use App\Event;
use App\User;
use App\SmsConfig;
use App\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Mail;

use Twilio\Rest\Client;


class EventController extends Controller
{
	public function listado()
	{

		$id_user = auth()->id();
		$user = User::find($id_user);
		$id_user_p = $user->personalInformation->id;
		
		$cita = Event::where('personal_information_id', $id_user_p)->first();
		 if ($cita){
        $cant = Event::where('personal_information_id', $id_user_p)->get();
		$existe = 1;
		}else{
			$cant = 0;
			$existe = 0;
		 }
		 $events  = Event::where('personal_information_id', $id_user_p)->orderBy('id', 'DESC')->simplePaginate(8);
		 
		
		 $personalInformation = PersonalInformation::where('user_id', $id_user)->first(); 
		 $hora_inicio = substr($personalInformation->hora_inicio, 0, 2);
		 $hora_fin = substr($personalInformation->hora_fin, 0, 2);
		 $intervalo = $personalInformation->intervalo;

          return view('events.listado',compact('events', 'cant', 'existe', 'id_user_p', 'hora_inicio', 'hora_fin', 'intervalo'))
             ->with('i', (request()->input('page', 1) - 1) * 5);	
	}
	
	
	public function showd($id)
    {
		$event = Event::where('id', $id)->first();
		
		return view('events.show',compact('event'));
    }

   public function index()
    {
		 $id = auth()->id();
		 $personalInformation = PersonalInformation::where('user_id', $id)->first(); 
		
		
		if (isset($personalInformation)) {


         $pi=$personalInformation->id;
		 $id_up=$personalInformation->id;
		 $days_lab=$personalInformation->days_lab; 
		 $hora_inicio = substr($personalInformation->hora_inicio, 0, 2);
		 $hora_fin = substr($personalInformation->hora_fin, 0, 2);
		 $intervalo = $personalInformation->intervalo;
		 
		 if($personalInformation->inicio_receso != ""){
			$inicio_receso = substr($personalInformation->inicio_receso, 0, 2);
		 }else{
			$inicio_receso = "";
		 }
		 if($personalInformation->fin_receso != ""){
			$fin_receso = substr($personalInformation->fin_receso, 0, 2);
		 }else{
			$fin_receso = "";
		 }
		 


	      return view('events.n-index', compact('pi', 'id_up', 'days_lab', 'hora_inicio', 'hora_fin',  'inicio_receso', 'fin_receso', 'intervalo'));
		  //return view('events.index', compact('pi', 'id_up', 'days_lab', 'hora_inicio', 'hora_fin', 'intervalo'));

		}else{
			  return redirect()->home();
		}

    }
 


    public function store(Request $request)
    {
        $datosEvento=request()->except(['_token','_method', 'fecha_evento']);
			
		$pi=$request->get('personal_information_id');
		
		$start  = $request->get('start');
		$hora_i = $request->get('hora_i');
		$hora_f = $request->get('hora_f');

		$title = $request->get('title');
		$description = $request->get('description');
		$sms_phone = $request->get('phone');
		

			$existente = DB::table('events')
            ->where('personal_information_id',  $pi)
            ->whereDate('start',  $start)
			->whereTime('hora_i', '>=' , $hora_i)
			->whereTime('hora_i', '<' , $hora_f)
            ->orWhere(function($query) use ($start,$hora_i, $hora_f, $pi)  {
			
                $query->where('personal_information_id',  $pi)
				      ->whereDate('start',  $start)
                      ->whereTime('hora_f', '>' , $hora_i)
					  ->whereTime('hora_f', '<=', $hora_f);
            })
			->orWhere(function($query) use ($start,$hora_i, $hora_f, $pi)  {
			
                $query->where('personal_information_id',  $pi)
					  ->whereDate('start',  $start)
                      ->whereTime('hora_i', '<' , $hora_f)
					  ->whereTime('hora_f', '>', $hora_i);
            })
            ->get();
			
			
			
		if(count($existente) >= 1 ){
			echo "ocupado"; 
		}else{
			
			$event = Event::create($datosEvento);
			$persInf = PersonalInformation::where('id', $pi)->first(); 
				$id_user=$persInf->user_id;
				$num_tlf=$persInf->telephone;
				$name_dc=$persInf->first_name;
		
			$datos = User::where('id', $id_user)->first();
			$name = $datos->email;
			
			Mail::to($name)->queue(new MessageReceived($event));
			event(new EventEvent($event));
			
			
		//Si le quieres mandar SMS
		
		$sms_data = SmsConfig::where('personal_information_id', $pi)->first();
		if ($sms_data) {
			 try {

				$twilio_number = $sms_data->recei_numb;
				$account_sid = $sms_data->nexmo_key;
				$auth_token = $sms_data->nexmo_secret;

				// Mensaje para el dueño del calendario
				$sms_for_my = "Cita de ".$title." sobre: ".$description." el dia: ".$start." desde: ".$hora_i." hasta: ".$hora_f;

				//Mensaje para el cliente que solicito la cita
				$applicant = "Su petición de ".$description." ha sido enviada. En breve le llegará otro mensaje con la confirmación de su cita. Pendiente. …".$name_dc;

								
				$client = new Client($account_sid, $auth_token);
			   // Mensaje para el dueño del calendario 
			   $client->messages->create($num_tlf, [
					'from' => $twilio_number, 
					'body' => $sms_for_my]);
	  
			   // Mensaje para el que solicitó 
			   $client->messages->create($sms_phone, [
					'from' => $twilio_number, 
					'body' => $applicant]);
	  
			}catch (Exception $e) {
				dd("Error: ". $e->getMessage());
			}
		}
		 
		 //hasta aqui el envio de sms
		}
		
    }

 public function show($id)
    {
	$personalInformation = PersonalInformation::where('user_id', $id)->first(); 
		
		if($personalInformation){
		$pi=$personalInformation->id;

       //$data['events']=Event::all();
		$data['events']=Event::where('personal_information_id', $pi)->get();

		 return response()->json($data['events']);
		}else{
			 return redirect('/events/');
		}
	}
    public function lista($id)
    {
		$id = auth()->id();
		$personalInformation = PersonalInformation::where('user_id', $id)->first(); 
		
		if($personalInformation){
		$pi=$personalInformation->id;

       //$data['events']=Event::all();
		$data['events']=Event::where('personal_information_id', $pi)->get();

		 return response()->json($data['events']);
		}else{
			 return redirect('/events/');
		}
	}

	
	public function showc($id)
    {

		$data['events']=Event::where('personal_information_id', $id)->get();
	

		 return response()->json($data['events']);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $datosEvento=request()->except(['_token','_method', 'fecha_evento']);

		$id_up=$request->get('personal_information_id');
		$start = $request->get('start');
		$hora_i = $request->get('hora_i');
		$hora_f = $request->get('hora_f');
		
		$existente = DB::table('events')
            ->where('id', '!=', $id)
            ->where('personal_information_id',  $id_up)
            ->where('status',  'aproved')
            ->whereDate('start',  $start)
			->whereTime('hora_i', '>=' , $hora_i)
			->whereTime('hora_i', '<' , $hora_f)
            ->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up, $id)  {
			
                $query->where('personal_information_id',  $id_up)
					  ->where('id', '!=', $id)
				      ->where('status',  'aproved')
				      ->whereDate('start',  $start)
                      ->whereTime('hora_f', '>' , $hora_i)
					  ->whereTime('hora_f', '<=', $hora_f);
            })
			->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up, $id)  {
			
                $query->where('personal_information_id',  $id_up)
					  ->where('id', '!=', $id)
					  ->where('status',  'aproved')
					  ->whereDate('start',  $start)
                      ->whereTime('hora_i', '<' , $hora_f)
					  ->whereTime('hora_f', '>', $hora_i);
            })
            ->get();


		if(count($existente) >= 1 ){
			echo "ocupado_confirmada";

		}else{
			
		$evento_prev = Event::find($id);
			$hora_i_pre =$evento_prev->hora_i;
				
		$event_up= Event::where('id', '=', $id)->update($datosEvento);		
		$event = Event::find($id);
		//cliente
		$email_customer = $event->email;	
        Mail::to($email_customer)->queue(new Response($event));
	 
	 $id_us = auth()->id();
	 $personalInformation = PersonalInformation::where('user_id', $id_us)->first();
	 $due_cal = $personalInformation->first_name;
	 
	  //Envio de correo al propietario del caledario
		$id_user=$event->personalInformation->user_id;
		$datos = User::where('id', $id_user)->first();
		$email = $datos->email;
		Mail::to($email)->queue(new CitaConfirmation($event));
		Event::where('id', '=', $id)->update(['status' => 'aproved']);

	//Si le quieres mandar SMS a el que solicitó cita desde la el listado

        $sms_data = SmsConfig::where('personal_information_id', $id_up)->first();
		if($sms_data){
			 try {
			
				$twilio_number = $sms_data->recei_numb;
				$account_sid = $sms_data->nexmo_key;
				$auth_token = $sms_data->nexmo_secret;
	
				$title = $request->get('title');
				$description = $request->get('description');
				$hora_im = \Carbon\Carbon::parse($request->get('hora_i'))->isoFormat('h:mm');
				$hora_fm = \Carbon\Carbon::parse($request->get('hora_f'))->isoFormat('h:mm');
					

				if($hora_i != $hora_i_pre){
						//si se hizo cambio hora cita enviar msj al cliente		
						
					$sms_for_client = $title.", su cita ha sigo reprogramada para el ".$start." a las ".$hora_im."pm. ¡Le esperamos!";
				}else{
					$sms_for_client = $title.", usted tiene confirmada una cita para el día ".$start." a partir de las ".$hora_im."pm. Saludos.";
				}
				

				$sms_phone = $request->get('phone');
		
				 $client = new Client($account_sid, $auth_token);
					$client->messages->create($sms_phone, [
						'from' => $twilio_number, 
						'body' => $sms_for_client]);
  
			  }catch (Exception $e) {
					dd("Error: ". $e->getMessage());
			  }
		
			//hasta aqui el envio de sms al cliente
			$msg="actualizado";
			return response()->json($msg);

		}else{

			$msg="actualizado";
			return response()->json($msg);
		}

		$msg="actualizado";
		return response()->json($msg);		
    }
	}

    public function findEvent(Request $request)
    {
		  $id=$request->get('id');
		  $evento = Event::find($id);
		  
		  return response()->json($evento);
	}
	
	public function verifyHour(Request $request)
    {		
		$id_up = $request->get('id_up');
		$start = $request->get('dia_e');
		$hora_i = $request->get('f_in');
		$hora_f = $request->get('f_fn');
		
			$existente = DB::table('events')
            ->where('personal_information_id',  $id_up)
            ->whereDate('start',  $start)
			->whereTime('hora_i', '>=' , $hora_i)
			->whereTime('hora_i', '<' , $hora_f)
            ->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up)  {
			
                $query->where('personal_information_id',  $id_up)
				      ->whereDate('start',  $start)
                      ->whereTime('hora_f', '>' , $hora_i)
					  ->whereTime('hora_f', '<=', $hora_f);
            })
			->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up)  {
			
                $query->where('personal_information_id',  $id_up)
					  ->whereDate('start',  $start)
                      ->whereTime('hora_i', '<' , $hora_f)
					  ->whereTime('hora_f', '>', $hora_i);
            })
            ->get();
		

		if(count($existente) >= 1 ){
			$msg ="ocupado"; 
		return response()->json($msg);
		}else{
			$msg = "libre";
			return response()->json($msg);
		}
	
    }
	
	
	public function solicitudCancel(Request $request)  {
		
		$p_id=$request->get('user_p_id');
		
		$personalInformation=PersonalInformation::where('id', $p_id)->first();
			$id_user = $personalInformation->user_id;
		
		$user = User::where('id', $id_user)->first();
			$email = $user->email;
			
		
		$name=$request->get('title_can');
		$tlf=$request->get('phone_can');
		$motivo=$request->get('motivo');
		

		Mail::to($email)->queue(new CancelCita($name, $tlf, $motivo));
		
		$msg = "enviado";
		return response()->json($msg);
		
		
	}
	
	
	public function destroy($id) //aqui el cliente envia sms al administrador 
    {


	$evento=Event::findOrFail($id);
	$id_user=$evento->personalInformation->user_id;
	
	$personalInformation = personalInformation::where('user_id', $id_user)->first();
		 $id_up = $personalInformation->id;
		 $due_cal = $personalInformation->name;
		 $slug = $personalInformation->slug;
		 $title = $evento->title;
		 $description = $evento->description;
		 $hora_im = \Carbon\Carbon::parse($evento->hora_i)->isoFormat('h:mm');
		 $hora_fm = \Carbon\Carbon::parse($evento->hora_f)->isoFormat('h:mm');
		 $sms_phone = $evento->phone;

	//Eliminaciòn del evento	
	Event::destroy($id);

	//Enviando sms al cliente indicandole que la cita fue rechazada.
        $sms_data = SmsConfig::where('personal_information_id', $id_up)->first();
		if($sms_data){
			 try {
			
				 $recei_numb = $sms_data->recei_numb;
				 $nexmo_key = $sms_data->nexmo_key;
				 $nexmo_secret = $sms_data->nexmo_secret;
				 //return response()->json($recei_numb);die;
				 $account_sid = $nexmo_key;
				 $auth_token = $nexmo_secret;
				//$twilio_number = '+19546072711';
				 $twilio_number = $recei_numb;
				
				
				$sms_for_client = $title.", su cita ha sido cancelada. Gracias";


				 $client = new Client($account_sid, $auth_token);
					$client->messages->create($sms_phone, [
						'from' => $twilio_number, 
						'body' => $sms_for_client]);
  
				}catch (Exception $e) {
					dd("Error: ". $e->getMessage());
			}
			

		}
		//hasta aqui el envio de sms al cliente
		$msg = "eliminado";
			return response()->json($msg);
	
	}


	
	
	public function aprobar(Request $request) //aqui enviamos sms
    {
	
		$id=$request->get('id');
		$evento = Event::find($id);
		
		$id_up=$evento->personal_information_id;
		$start = $evento->start;
		$hora_i = $evento->hora_i;
		$hora_f = $evento->hora_f;
		
		$existente = DB::table('events')
            ->where('id', '!=', $id)
            ->where('personal_information_id',  $id_up)
            ->where('status',  'aproved')
            ->whereDate('start',  $start)
			->whereTime('hora_i', '>=' , $hora_i)
			->whereTime('hora_i', '<' , $hora_f)
            ->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up, $id)  {
			
                $query->where('personal_information_id',  $id_up)
					  ->where('id', '!=', $id)
				      ->where('status',  'aproved')
				      ->whereDate('start',  $start)
                      ->whereTime('hora_f', '>' , $hora_i)
					  ->whereTime('hora_f', '<=', $hora_f);
            })
			->orWhere(function($query) use ($start,$hora_i, $hora_f, $id_up, $id)  {
			
                $query->where('personal_information_id',  $id_up)
					  ->where('id', '!=', $id)
					  ->where('status',  'aproved')
					  ->whereDate('start',  $start)
                      ->whereTime('hora_i', '<' , $hora_f)
					  ->whereTime('hora_f', '>', $hora_i);
            })
            ->get();


		if(count($existente) >= 1 ){
			echo "ocupado_confirmada"; 

		}else{
			

		//cliente
		    $email_customer = $evento->email;	
            Mail::to($email_customer)->queue(new Response($evento));
			
			
				$id_user=$evento->personalInformation->user_id;
				$datos = User::where('id', $id_user)->first();
				$email = $datos->email;
					
				Mail::to($email)->queue(new CitaConfirmation($evento));


				Event::where('id', '=', $id)->update(['status' => 'aproved']);
				
					
			//Si le quieres mandar SMS a el que solicitó cita desde el calendario publico
			$sms_data = SmsConfig::where('personal_information_id', $id_up)->first();
	
			
			if($sms_data){
				
				//return response()->json($sms_data);die;
				try {
				
					$twilio_number = $sms_data->recei_numb;
					$account_sid = $sms_data->nexmo_key;
					$auth_token = $sms_data->nexmo_secret;
					//return response()->json($recei_numb);die;

					$title = $evento->title;

					 $id_us = auth()->id();
					 $personalInformation = personalInformation::where('user_id', $id_us)->first();
					 $due_cal = $personalInformation->first_name;

					$sms_for_client = $title.", usted tiene confirmada una cita con ".$due_cal.". El día ".$start." a partir de las ".$hora_i." saludos";
	
					$sms_phone = $evento->phone;

				
					$client = new Client($account_sid, $auth_token);
					$client->messages->create($sms_phone, [
					'from' => $twilio_number, 
					'body' => $sms_for_client]);

				}catch (Exception $e) {
					dd("Error: ". $e->getMessage());
				}
				

				$msg="actualizado";
				return response()->json($msg);

				
				
			//hasta aqui el envio de sms al cliente		
			}else{

				$msg="actualizado";
				return response()->json($msg);

			}

		}
			

    }
	
	
}

