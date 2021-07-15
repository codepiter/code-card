<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //para borrado
use Auth;
use DB;
use JeroenDesloovere\VCard\VCard;
use Image;
use View; //para acceder a una vista creada fuera de este controlador
use Illuminate\Validation\Rule;


class PersonalInformationController extends Controller
{
	
	
 public function verificar()
	  {
		 $id_user = auth()->id();
		
		 $user = PersonalInformation::where('user_id', $id_user)->first();

		 if ($user)

			{       
			$id_inf=$user->id;		
				return redirect()->route('personalInformation.edit', array($id_inf));
			}else{
			//	return redirect()->route('personalInformation.create');
			
					return View::make('formPaypal.index');
				}
				
			
		}



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$id = auth()->id();
		$is_admin = auth()->user()->is_admin;
	    $status_id = 1;
		
		  $payms = Payment::where('user_id', '=', $id)->first();
		 // echo $payms;die;
		    
			$infpers =  PersonalInformation::where('user_id', $id)->first();
			$slug = $infpers->slug;
			//echo $slug;die;
			
		 

		if ($is_admin == 1){

			$inf_pers = PersonalInformation::where('status_id', '=', $status_id)->orderBy('created_at','desc')->paginate(6);

		}else{
			
			$perExist = PersonalInformation::where('user_id', $id)->first();

			if ($perExist)
			{
				$inf_pers= PersonalInformation::where('user_id', '=', $id)->orderBy('created_at','desc')->paginate(6);
			  
			}else{
				return redirect()->route('personalInformation.create');
			}
		}
        //return view('personalInformations.index', compact('inf_pers','is_admin', 'payms'));
        return view('personalInformations.n-index', compact('inf_pers','is_admin', 'payms', 'slug'));
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	
		$id_user = auth()->id();
		
		$user = User::where('id', '=', $id_user)->first();
		
			$activ=$user->is_activated;
			
		if($activ == '1'){
				
			$paym = Payment::where('user_id', '=', $id_user)->first();

			$pi = PersonalInformation::where ('user_id', $id_user)->first();
	
				if($pi){
					
					$status = 'Ya Ud. tienes al menos un registro de oficina virtual';
	
						return redirect('personalInformation')
						->with(compact ('status'));
					
				}
				
				if (isset($paym)) {
					
					$type=$paym->type_card;

					return view('personalInformations.create')->with(compact('type'));
					 
				}else{
					//return View::make('formPaypal.index');
					return View::make('formPaypal.n-index');
				}

			
		}else{
		    //return View::make('formPaypal.index');
		    return View::make('formPaypal.n-index');			
		}
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 $request->validate([
			'photo'=>'required|mimes:png,jpg,jpeg|max:8000',    //'required|mimes:jpg,jpeg,gif,png,xls,xlsx,doc,docx,pdf'
			 'header' =>  'mimes:png,jpg,jpeg|max:8000',
			 'favi'   => 'mimes:png,jpg,jpeg|max:8000',
			 'favi2'  => 'mimes:png,jpg,jpeg|max:8000',
			 'photo2' => 'mimes:png,jpg,jpeg|max:8000',
			 'photo3' => 'mimes:png,jpg,jpeg|max:8000',
			 'carr1'  => 'mimes:png,jpg,jpeg|max:8000',
			 'carr2'  => 'mimes:png,jpg,jpeg|max:8000',
			 'carr3'  => 'mimes:png,jpg,jpeg|max:8000',
			 'carr4'  => 'mimes:png,jpg,jpeg|max:8000',
			 'carr5'  => 'mimes:png,jpg,jpeg|max:8000',
			 'carr6'  => 'mimes:png,jpg,jpeg|max:8000',
			 'logo'   => 'mimes:png,jpg,jpeg|max:8000',
			 'logo2'  => 'mimes:png,jpg,jpeg|max:8000',
			 'logo3'  => 'mimes:png,jpg,jpeg|max:8000',
			 'logo4'  => 'mimes:png,jpg,jpeg|max:8000',
			 'logo5'  => 'mimes:png,jpg,jpeg|max:8000',
			 'logo6'  => 'mimes:png,jpg,jpeg|max:8000',
			 'qr'     => 'mimes:png,jpg,jpeg|max:8000',
			 'qr2'     => 'mimes:png,jpg,jpeg|max:8000',
			
			 'first_name'=>'required',

        ]);

        $id_user = auth()->id();
        $user = PersonalInformation::where('user_id', $id_user)->first();
		

		$username =  auth()->user()->username;

		$first=strtolower($request->get('first_name'));
			$last=strtolower($request->get('last_name'));
			$tipo=$request->get('tipo');
			
	     $is_admin = auth()->user()->is_admin;
	     //if(!$user){

			//al comienzo de la tajeta
				if ($request->file('header')== null) {
				 $header = "";
				 $favi2 = "";
				}else{
				$header= $datosPersonals['header']=$request->file('header')->store('uploads', 'public');
				
						$favi2 = Image::make($request->file('header')->getRealPath());
						$favi2->resize(512, null, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});
						$favi2->orientate();
						$file_name = time() . "." . $request->file('header')->extension();

						//$favi2->save(public_path('/img/favi2/' . $file_name));
						$favi2->save(storage_path('/app/public/uploads/' . $file_name));
						$favi2= $datosPersonals['favi2']= "uploads/".$file_name;

				}

			
			/*if ($request->file('header')== null){
				$header= "";
			}else{
				$header= $datosPersonals['header']=$request->file('header')->store('uploads', 'public');
			}*/

			if ($request->file('photo')== null) {
				 $photo="";
				}else{
			
			
			
			 /*$photo = $request->file('photo');
			 $data = getimagesize($photo);
			 $width = $data[0];
			 $height = $data[1];
			// echo $width."<br>";
			// echo $height;die;
             $porc = (30 * $height)/100;
			 $suma = $width + $porc;
			 //echo $suma;die;
			if($suma <= $height){
				//return redirect()->back()->with('errdim', 'El ancho debe ser mayor que el alto'); 
			        echo "imagen muy alta y flaquita ademas";die;
			}else{
				echo "imagen adecuada";die;
			}*/

			
			//$photo = $datosPersonals['photo']=$request->file('photo')->store('uploads', 'public');
			//$photo = Image::make($request->file('photo')->getRealPath());
				
						$favi = Image::make($request->file('photo')->getRealPath());
						$favi->orientate();
						$favi->resize(384, null, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});
						
						$file_name = time() . "." . $request->file('photo')->extension();

						//$favi->save(public_path('/img/favi/' . $file_name));
						$favi->save(storage_path('/app/public/uploads/' . $file_name));
						$favi= $datosPersonals['favi']= "uploads/".$file_name;
						
				/*photo original*/
				
						$foto = Image::make($request->file('photo')->getRealPath());
						
						
						
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/

                      //  $foto->orientate()->resizeCanvas(470, 500);
						
						$file_name2 = "weisw" . time() . "." . $request->file('photo')->extension();

						//$favi->save(public_path('/img/favi/' . $file_name));
						$foto->save(storage_path('/app/public/uploads/' . $file_name2));
						$photo= $datosPersonals['photo']= "uploads/".$file_name2;
						
				/**/	
			
						
				}

			if ($request->file('photo2')== null) {
				 $photo2="";
				}else{
				//$photo2= $datosPersonals['photo2']=$request->file('photo2')->store('uploads', 'public');
						$foto2 = Image::make($request->file('photo2')->getRealPath());
						$foto2->orientate();
						/*$foto2->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $foto2->orientate()->resizeCanvas(470, 500);
						
						$file_name3 = "ph2" . time() . "." . $request->file('photo2')->extension();
						$foto2->save(storage_path('/app/public/uploads/' . $file_name3));
						$photo2= $datosPersonals['photo2']= "uploads/".$file_name3;
				}
			if ($request->file('photo3')== null) {
				 $photo3="";
				}else{
				//$photo3= $datosPersonals['photo3']=$request->file('photo3')->store('uploads', 'public');
						$foto3 = Image::make($request->file('photo3')->getRealPath());
						$foto3->orientate();
						/*$foto3->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						//$foto3->orientate()->resizeCanvas(470, 500);
						
						$file_name4 = "ph3" . time() . "." . $request->file('photo3')->extension();
						$foto3->save(storage_path('/app/public/uploads/' . $file_name4));
						$photo3= $datosPersonals['photo3']= "uploads/".$file_name4;
				}

			
			
			if ($request->file('carr1')== null) {
				 $carr1="";
				}else{
				//$carr1= $datosPersonals['carr1']=$request->file('carr1')->store('uploads', 'public');
						$car1 = Image::make($request->file('carr1')->getRealPath());
						$car1->orientate();
						/*$car1->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						 //$car1->orientate()->resizeCanvas(470, 500);
						
						$file_name5 = "c1" . time() . "." . $request->file('carr1')->extension();
						$car1->save(storage_path('/app/public/uploads/' . $file_name5));
						$carr1= $datosPersonals['carr1']= "uploads/".$file_name5;
				}
			if ($request->file('carr2')== null) {
				 $carr2="";
				}else{
				//$carr2= $datosPersonals['carr2']=$request->file('carr2')->store('uploads', 'public');
						$car2 = Image::make($request->file('carr2')->getRealPath());
						$car2->orientate();
						/*$car2->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $car2->orientate()->resizeCanvas(470, 500);
						
						$file_name6 = "c2" . time() . "." . $request->file('carr2')->extension();
						$car2->save(storage_path('/app/public/uploads/' . $file_name6));
						$carr2= $datosPersonals['carr2']= "uploads/".$file_name6;
				}
			if ($request->file('carr3')== null) {
				 $carr3="";
				}else{
				//$carr3= $datosPersonals['carr3']=$request->file('carr3')->store('uploads', 'public');
						$car3 = Image::make($request->file('carr3')->getRealPath());
						$car3->orientate();
						/*$car3->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $car3->orientate()->resizeCanvas(470, 500);
						
						$file_name7 = "c3" . time() . "." . $request->file('carr3')->extension();
						$car3->save(storage_path('/app/public/uploads/' . $file_name7));
						$carr3= $datosPersonals['carr3']= "uploads/".$file_name7;
				}
			if ($request->file('carr4')== null) {
				 $carr4="";
				}else{
				//$carr4= $datosPersonals['carr4']=$request->file('carr4')->store('uploads', 'public');
						$car4 = Image::make($request->file('carr4')->getRealPath());
						$car4->orientate();
						/*$car4->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						 //$car4->orientate()->resizeCanvas(470, 500);
						
						$file_name8 = "c4" . time() . "." . $request->file('carr4')->extension();
						$car4->save(storage_path('/app/public/uploads/' . $file_name8));
						$carr4= $datosPersonals['carr4']= "uploads/".$file_name8;
				}
			if ($request->file('carr5')== null) {
				 $carr5="";
				}else{
				//$carr5= $datosPersonals['carr5']=$request->file('carr5')->store('uploads', 'public');
						$car5 = Image::make($request->file('carr5')->getRealPath());
						$car5->orientate();
						/*$car5->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						 //$car5->orientate()->resizeCanvas(470, 500);
						
						$file_name9 = "c5" . time() . "." . $request->file('carr5')->extension();
						$car5->save(storage_path('/app/public/uploads/' . $file_name9));
						$carr5= $datosPersonals['carr5']= "uploads/".$file_name9;
				}
			if ($request->file('carr6')== null) {
				 $carr6="";
				}else{
				//$carr6= $datosPersonals['carr6']=$request->file('carr6')->store('uploads', 'public');
						$car6 = Image::make($request->file('carr6')->getRealPath());
						$car6->orientate();
						/*$car6->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $car6->orientate()->resizeCanvas(470, 500);
						
						$file_name10 = "c6" . time() . "." . $request->file('carr6')->extension();
						$car6->save(storage_path('/app/public/uploads/' . $file_name10));
						$carr6= $datosPersonals['carr6']= "uploads/".$file_name10;
				}

				//al final de la tarjeta
			if ($request->file('logo')== null){
				$logo= "";
			}else{
				//$logo= $datosPersonals['logo']=$request->file('logo')->store('uploads', 'public');
			            $logo = Image::make($request->file('logo')->getRealPath());
						$logo->orientate();
						/*$logo->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $logo->orientate()->resizeCanvas(470, 500);
						
						$filen1 = "lg" . time() . "." . $request->file('logo')->extension();
						$logo->save(storage_path('/app/public/uploads/' . $filen1));
						$logo= $datosPersonals['logo']= "uploads/".$filen1;
			}
			
			
			if ($request->file('logo2')== null){
				$logo2= "";
			}else{
				//$logo2= $datosPersonals['logo2']=$request->file('logo2')->store('uploads', 'public');
							 $foto = Image::make($request->file('logo2')->getRealPath());
							 $foto->orientate();
							/* $foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						 //$foto->orientate()->resizeCanvas(470, 500);
						
						$filen2 = "lg2" . time() . "." . $request->file('logo2')->extension();
						$foto->save(storage_path('/app/public/uploads/' . $filen2));
						$logo2= $datosPersonals['logo2']= "uploads/".$filen2;
			}
			
			if ($request->file('logo3')== null){
				$logo3= "";
			}else{
				//$logo3= $datosPersonals['logo3']=$request->file('logo3')->store('uploads', 'public');
			            $foto = Image::make($request->file('logo3')->getRealPath());
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						//$foto->orientate()->resizeCanvas(470, 500);
						
						$filen3 = "lg3" . time() . "." . $request->file('logo3')->extension();
						$foto->save(storage_path('/app/public/uploads/' . $filen3));
						$logo3= $datosPersonals['logo3']= "uploads/".$filen3;
			}
			
			if ($request->file('logo4')== null){
				$logo4= "";
			}else{
				//$logo4= $datosPersonals['logo4']=$request->file('logo4')->store('uploads', 'public');
						$foto = Image::make($request->file('logo4')->getRealPath());
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						//$foto->orientate()->resizeCanvas(470, 500);
						
						$filen4 = "lg4" . time() . "." . $request->file('logo4')->extension();
						$foto->save(storage_path('/app/public/uploads/' . $filen4));
						$logo4= $datosPersonals['logo4']= "uploads/".$filen4;
			}
			
			if ($request->file('logo5')== null){
				$logo5= "";
			}else{
				//$logo5= $datosPersonals['logo5']=$request->file('logo5')->store('uploads', 'public');
						$foto = Image::make($request->file('logo5')->getRealPath());
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						// $foto->orientate()->resizeCanvas(470, 500);
						
						$filen5 = "lg5" . time() . "." . $request->file('logo5')->extension();
						$foto->save(storage_path('/app/public/uploads/' . $filen5));
						$logo5= $datosPersonals['logo5']= "uploads/".$filen5;
			}
			
			if ($request->file('logo6')== null){
				$logo6= "";
			}else{
				//$logo6= $datosPersonals['logo6']=$request->file('logo6')->store('uploads', 'public');
						$foto = Image::make($request->file('logo6')->getRealPath());
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						//$foto->orientate()->resizeCanvas(470, 500);
						
						$filen6 = "lg6" . time() . "." . $request->file('logo6')->extension();
						$foto->save(storage_path('/app/public/uploads/' . $filen6));
						$logo6= $datosPersonals['logo6']= "uploads/".$filen6;
			}
			
			if ($request->file('qr')== null){
				$qr= "";
			}else{
				$qr= $datosPersonals['qr']=$request->file('qr')->store('uploads', 'public');
			}
			if ($request->file('qr2')== null){
				$qr2= "";
			}else{
				$qr2= $datosPersonals['qr2']=$request->file('qr2')->store('uploads', 'public');
			}
			
			if($tipo == "persona"){
				$na=strtolower($first);
				$nam =str_replace(' ', '', $na);
				
				$slug = $nam."-".$last."-".$username;
				
			}else{
				$na=strtolower($first);
				$nam =str_replace(' ', '', $na);
				
				$slug = $nam."-".$username;
				
			}



	     if (!$user || ($is_admin == 1)){
		    $datosPersonals = PersonalInformation::create([
		    'user_id' => Auth::user()->id,
		    //'status_id' => 1,
			'slug' => $slug,
			'slug_calendar' => "cal-".$slug,
			'header' => $header,
			'photo' => $photo,
			'favi' => $favi,
			'favi2' => $favi2,
			'photo2' => $photo2,
			'photo3' => $photo3,
			
			'carr1' => $carr1,
			'carr2' => $carr2,
			'carr3' => $carr3,
			'carr4' => $carr4,
			'carr5' => $carr5,
			'carr6' => $carr6,
			
			'logo' => $logo,
			'logo2' => $logo2,
			'logo3' => $logo3,
			'logo4' => $logo4,
			'logo5' => $logo5,
			'logo6' => $logo6,
			'qr' => $qr,
			'qr2' => $qr2,

			
			'template' => $request->get('template'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'correo' => $request->get('correo'),
            'date_birth' => $request->get('date_birth'),
			
			'telephone' => $request->get('telephone'),
			
            'company' => $request->get('company'),
            'position' => $request->get('position'),
            'puesto' => $request->get('puesto'),
            'presentation' => $request->get('presentation'),
            'services' => $request->get('services'),
            'we' => $request->get('we'),
            'address' => $request->get('address'),
            'url_map' => $request->get('url_map'),
            'pais' => $request->get('pais'),
            'whatsapp' => $request->get('whatsapp'),
            
			'facebook' => $request->get('facebook'),
            'youtube' => $request->get('youtube'),
            'twitter' => $request->get('twitter'),
            'instagram' => $request->get('instagram'),
            'linkedin' => $request->get('linkedin'), //https://www.linkedin.com/in/codepiter
            'paypalme' => $request->get('paypalme'),
            'nmp' => $request->get('np2'),
            'pasarela2' => $request->get('pasarela2'),
			
            'days_lab' => "0,1,2,3,4,5,6,7",
            'hora_inicio' => "08:00:00",
            'hora_fin' => "17:00:00",
            'intervalo' => "60",

        ]);


			return redirect('personalInformation')->with('success', 'Su registro se ha realizado Satisfactoriamente!');
		}else{
			return redirect('personalInformation')->with('success', 'Ud. ya ha realizado un registro previo');
		}

        
		//return response()->json($datosPersonals);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInformation $personalInformation)
   // public function show(PersonalInformation $personalInformation)
    {

		$id_user = $personalInformation->user_id;
		$template = $personalInformation->template;
	    $user1 = 	User::find($id_user);
		$email = $user1->email;

    if ($template == 24) {
		  //echo "soy 24";die;
		  return view ('personalInformations.show24', compact('personalInformation','email')); 
		  return view ('layouts.style24', compact('personalInformation','email')); 
	    }

    if ($template == 23) {
		  //echo "soy 23";die;
		  return view ('personalInformations.show23', compact('personalInformation','email')); 
		  return view ('layouts.style23', compact('personalInformation','email')); 
	    }

    if ($template == 22) {
		  //echo "soy 22";die;
		  return view ('personalInformations.show22', compact('personalInformation','email')); 
		  return view ('layouts.style22', compact('personalInformation','email')); 
	    }


    if ($template == 21) {
		  //echo "soy 21";die;
		  return view ('personalInformations.show21', compact('personalInformation','email')); 
		  return view ('layouts.style21', compact('personalInformation','email')); 
	    }
		
		
	if ($template == 20) {
	  //echo "soy 20";die;
	  return view ('personalInformations.show20', compact('personalInformation','email')); 
	  return view ('layouts.style20', compact('personalInformation','email')); 
	}
		

    if ($template == 19) {
		  //echo "soy 19";die;
		  return view ('personalInformations.show19', compact('personalInformation','email')); 
		  return view ('layouts.style19', compact('personalInformation','email')); 
	    }
		  
    if ($template == 18) {
		  //echo "soy 18";die;
		return view ('personalInformations.show18', compact('personalInformation','email')); 
		return view ('layouts.style18', compact('personalInformation','email')); 
		}

    if ($template == 17) {
		  //echo "soy 17";die;
		return view ('personalInformations.show17', compact('personalInformation','email')); 
		return view ('layouts.style17', compact('personalInformation','email')); 
		}

    if ($template == 16) {
		  //echo "soy 16";die;
		return view ('personalInformations.show16', compact('personalInformation','email')); 
		return view ('layouts.style16', compact('personalInformation','email')); 
		}

    if ($template == 15) {
		  //echo "soy 15";die;
		return view ('personalInformations.show15', compact('personalInformation','email')); 
		return view ('layouts.style15', compact('personalInformation','email')); 
		}

    if ($template == 14) {
		  //echo "soy 14";die;
		return view ('personalInformations.show14', compact('personalInformation','email')); 
		return view ('layouts.style14', compact('personalInformation','email')); 
		}

    if ($template == 13) {
		  //echo "soy 13";die;
		return view ('personalInformations.show13', compact('personalInformation','email')); 
		return view ('layouts.style13', compact('personalInformation','email')); 
		}

    if ($template == 12) {
		  //echo "soy 12";die;
		return view ('personalInformations.show12', compact('personalInformation','email')); 
		return view ('layouts.style12', compact('personalInformation','email')); 
		}


	if ($template == 11) {
		  //echo "soy 11";die;
		return view ('personalInformations.show11', compact('personalInformation','email')); 
		return view ('layouts.style11', compact('personalInformation','email')); 
		}
		
	if ($template == 10) {
		  //echo "soy 10";die;
		return view ('personalInformations.show10', compact('personalInformation','email')); 
		return view ('layouts.style10', compact('personalInformation','email')); 
		}

	if ($template == 9) {
		  //echo "soy 9";die;
		return view ('personalInformations.show9', compact('personalInformation','email')); 
		return view ('layouts.style9', compact('personalInformation','email')); 
		}

	if ($template == 8) {
		  //echo "soy 8";die;
		return view ('personalInformations.show8', compact('personalInformation','email')); 
		return view ('layouts.style8', compact('personalInformation','email')); 
		}
		
	if ($template == 7) {
		  //echo "soy 7";die;
		  return view ('personalInformations.show7', compact('personalInformation','email')); 
		  return view ('layouts.style7', compact('personalInformation','email')); 
		}
	
	if ($template == 6) {
		  //echo "soy 6";die;
		  return view ('personalInformations.show6', compact('personalInformation','email')); 
		  return view ('layouts.style6', compact('personalInformation','email')); 
		}

	if ($template == 5) {
		  //echo "soy 5";die;
		  return view ('personalInformations.show5', compact('personalInformation','email')); 
		  return view ('layouts.style5', compact('personalInformation','email')); 
		}

	if ($template == 4) {
		  //echo "soy 4";die;
		  return view ('personalInformations.show4', compact('personalInformation','email')); 
		  return view ('layouts.style4', compact('personalInformation','email')); 
		}

	if ($template == 3) {
		  //echo "soy 3";die;
		  return view ('personalInformations.show3', compact('personalInformation','email')); 
		  return view ('layouts.style3', compact('personalInformation','email')); 
		}

    if ($template == 2) {
      //echo "soy 2";die;
	  return view ('personalInformations.show2', compact('personalInformation','email')); 
      return view ('layouts.style2', compact('personalInformation','email')); 
	}

    if ($template == 1) {
        //echo "soy 1";die;
		return view ('personalInformations.show', compact('personalInformation','email')); 
		return view ('layouts.style1', compact('personalInformation','email')); 
    }
       // return view ('personalInformations.show', compact('personalInformation')); 

	}
	

	
	public function vcard($id){

	         $personalInformation = PersonalInformation::where('id', $id)->first();
             $id_user = $personalInformation->user_id;
			 $user = User::where('id', $id_user)->first();
			 $email= $user->email;

				$vcard = new VCard();
				// define variables
                $additional = '';
				$prefix = '';
				$suffix = '';
				$lastname = $personalInformation->last_name;
				$firstname = $personalInformation->first_name;
				$correo = $personalInformation->correo;
				
				$telephone = $personalInformation->telephone;
				$address = $personalInformation->address;
				$url_map = $personalInformation->url_map;
				
				$company = $personalInformation->company;
				$position = $personalInformation->position;
				$puesto = $personalInformation->puesto;
				$presentation = $personalInformation->presentation;
				$website = $personalInformation->website;
				// add personal data
				//$vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
				$vcard->addName($lastname, $firstname);
				// add work data
				$vcard->addCompany($company);
				$vcard->addJobtitle($position);
				$vcard->addJobtitle($puesto);
				$vcard->addRole($presentation);
				$vcard->addEmail($email);//este no lo tengo en la tabla personal_information
				$vcard->addPhoneNumber($telephone, 'PREF;WORK');
				//$vcard->addPhoneNumber(123456789, 'WORK');
				// $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
				// $vcard->addLabel('street, worktown, workpostcode Belgium');
				$vcard->addURL($website);
				//$vcard->addPhoto(__DIR__ . '/landscape.jpeg');
				// return vcard as a string
				//return $vcard->getOutput();
				// return vcard as a download
				return $vcard->download();
				
}
	 public function borrar(Request $request)
    {
		$id_pi =$request->get('id_pi');
		$img = $request->get('imagen');
		$pi = PersonalInformation::findOrFail($id_pi);
		
		$id_user =$pi->user_id;		

		 Storage::delete('public/'.$pi->$img);
		 
		  $affected = DB::table('personal_information')
			->where('user_id', $id_user)
			 ->update(["$img" => null]);

		return response()->json([
		'success' => 'Record deleted successfully!'
		]);


	}/**/
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInformation $personalInformation)
    {
		   $cv = $personalInformation->cv;
		   $status_lab = $personalInformation->status_lab;
		   $template = $personalInformation->template;
		   $user_id = $personalInformation->user_id;
		   
		 //echo $template;die;
          return view('personalInformations.n-edit', compact('personalInformation', 'cv', 'status_lab', 'template', 'user_id'));

    }
        //nueva funcion ingresada por Ricardo
		public function edit2(PersonalInformation $personalInformation){
		$cv = $personalInformation->cv;
		$status_lab = $personalInformation->status_lab;
		$template = $personalInformation->template;
		$user_id = $personalInformation->user_id;

		return view('personalInformations.n-edit2', compact('personalInformation', 'cv', 'status_lab', 'template', 'user_id'));
	}													
//nuevas funciones ingresada por Ricardo
	public function update2Image(){
		return "Metodo updateImage";
	}
	

	public function update2PersonalInformation(Request $request, PersonalInformation $personalInformation){
		//return $request->presentation;

		/* $request->validate([
			'name'          => 'required',
			'email'         => 'required',
		]); */

		if($request->has('form')){
			if($request->form == 'optionContent1'){
				$request->validate([
					'first_name'          => 'required|max:120',
					'last_name'         => 'required|max:120',
					'company'         => 'required|max:120',
					'position'         => 'required|max:120',
					'presentation'         => 'required|max:650',
				]);
			}
		}


		return response()->json(['success'=>'Contact form submitted successfully']);

		return "Metodo update2PersonalInformation";
	}
	//hasta aqui las nuevas funciones ingresada por Ricardo
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */

  public function update(Request $request, $id)
{
		 $request->validate([
       // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
		'header' => 'image',
		'photo' => 'image',
		'favi'  => 'image',
		'favi2' => 'image',
		'photo2'=> 'image',
		'photo3'=> 'image',
		'carr1' => 'image',
		'carr2' => 'image',
		'carr3' => 'image',
		'carr4' => 'image',
		'carr5' => 'image',
		'carr6' => 'image',
		'logo'  => 'image',
		'logo2' => 'image',
		'logo3' => 'image',
		'logo4' => 'image',
		'logo5' => 'image',
		'logo6' => 'image',
		'qr'    => 'image',
		'qr2'    => 'image',
        ]);

	$datoPersonal = request()->except(['_token', '_method']);









	if($request->hasFile('header')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->header);
		Storage::delete('public/'.$personalInformation->favi2);
		
		$datoPersonal['header'] = $request->file('header')->store('uploads', 'public');

	    $favi2 = Image::make($request->file('header')->getRealPath());
						$favi2->resize(512, null, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});
						$favi2->orientate();
						$file_name = time() . "." . $request->file('header')->extension();

						$favi2->save(storage_path('/app/public/uploads/' . $file_name)); //guardamos el archivo
						$favi2= $datoPersonal['favi2']= "uploads/".$file_name; //asignamos nombre en BD
	}

	
	if($request->hasFile('photo')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->photo);
		Storage::delete('public/'.$personalInformation->favi);
		
			/***/
						$favi = Image::make($request->file('photo')->getRealPath());
						$favi->orientate();
						$favi->resize(384, null, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});
						
						$file_name = "favic" . time() . "." . $request->file('photo')->extension();

						//$favi->save(public_path('/img/favi/' . $file_name));
						$favi->save(storage_path('/app/public/uploads/' . $file_name));
						$favi= $datoPersonal['favi']= "uploads/".$file_name;
						
						$datoPersonal['favi']= "uploads/".$file_name;
						
				/*photo original*/
				
						$foto = Image::make($request->file('photo')->getRealPath());
						$foto->orientate();
						/*$foto->resize(null, 700, function($constraint2) {
							 $constraint2->aspectRatio();
							 $constraint2->upsize();
						});*/
						
						$file_favi = "up" . time() . "." . $request->file('photo')->extension();

						//$favi->save(public_path('/img/favi/' . $file_name));
						$foto->save(storage_path('/app/public/uploads/' . $file_favi));
						$photo= $datoPersonal['photo']= "uploads/".$file_favi;
						$datoPersonal['photo']= "uploads/".$file_favi;
				
			/***/
		
	
	}

	if($request->hasFile('photo2')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->photo2);
		
		$foto = Image::make($request->file('photo2')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
	
		$file_name2 = "ph2" . time() . "." . $request->file('photo2')->extension();

		//$favi->save(public_path('/img/favi/' . $file_name));
		$foto->save(storage_path('/app/public/uploads/' . $file_name2));
		$photo2= $datoPersonal['photo2']= "uploads/".$file_name2;
		$datoPersonal['photo2']= "uploads/".$file_name2;
		
						
		
	}
	
	
	if($request->hasFile('photo3')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->photo3);
		
		$foto = Image::make($request->file('photo3')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_name3 = "ph3" . time() . "." . $request->file('photo3')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name3));
		$photo3= $datoPersonal['photo3']= "uploads/".$file_name3;
		$datoPersonal['photo3']= "uploads/".$file_name3;
		
			
			
	}
	
	
	if($request->hasFile('carr1')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr1);
		
		$foto = Image::make($request->file('carr1')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr1 = "c1" . time() . "." . $request->file('carr1')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr1));
		$carr1= $datoPersonal['carr1']= "uploads/".$file_carr1;
		$datoPersonal['carr1']= "uploads/".$file_carr1;
	}
	
	if($request->hasFile('carr2')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr2);
		
		$foto = Image::make($request->file('carr2')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr2 = "c2" . time() . "." . $request->file('carr2')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr2));
		$carr2= $datoPersonal['carr2']= "uploads/".$file_carr2;
		$datoPersonal['carr2']= "uploads/".$file_carr2;
	}
	
	if($request->hasFile('carr3')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr3);
		
		$foto = Image::make($request->file('carr3')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr3 = "c1" . time() . "." . $request->file('carr3')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr3));
		$carr3= $datoPersonal['carr3']= "uploads/".$file_carr3;
		$datoPersonal['carr3']= "uploads/".$file_carr3;
	}
	
	if($request->hasFile('carr4')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr4);
		
		$foto = Image::make($request->file('carr4')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr4 = "c4" . time() . "." . $request->file('carr4')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr4));
		$carr4= $datoPersonal['carr4']= "uploads/".$file_carr4;
		$datoPersonal['carr4']= "uploads/".$file_carr4;
	}
	
	if($request->hasFile('carr5')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr5);
		
		$foto = Image::make($request->file('carr5')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr5 = "c5" . time() . "." . $request->file('carr5')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr5));
		$carr5= $datoPersonal['carr5']= "uploads/".$file_carr5;
		$datoPersonal['carr5']= "uploads/".$file_carr5;
	}
	
	if($request->hasFile('carr6')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->carr6);

		$foto = Image::make($request->file('carr6')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_carr6 = "c6" . time() . "." . $request->file('carr6')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_carr6));
		$carr6= $datoPersonal['carr6']= "uploads/".$file_carr6;
		$datoPersonal['carr6']= "uploads/".$file_carr6;
	}
	

	if($request->hasFile('logo')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo);
		
		
		$foto = Image::make($request->file('logo')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_logo = "logo" . time() . "." . $request->file('logo')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_logo));
		$logo= $datoPersonal['logo']= "uploads/".$file_logo;
		$datoPersonal['logo']= "uploads/".$file_logo;
	}
	
	if($request->hasFile('logo2')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo2);
		
		$foto = Image::make($request->file('logo2')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_log2 = "logo2" . time() . "." . $request->file('logo2')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_log2));
		$logo2= $datoPersonal['logo2']= "uploads/".$file_log2;
		$datoPersonal['logo2']= "uploads/".$file_log2;
	}
	
	if($request->hasFile('logo3')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo3);
	
	
		$foto = Image::make($request->file('logo3')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_log3 = "logo3" . time() . "." . $request->file('logo3')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_log3));
		$logo3= $datoPersonal['logo3']= "uploads/".$file_log3;
		$datoPersonal['logo3']= "uploads/".$file_log3;
		
		
	}
	
	if($request->hasFile('logo4')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo4);
	
		$foto = Image::make($request->file('logo4')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_log4 = "logo4" . time() . "." . $request->file('logo4')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_log4));
		$logo4= $datoPersonal['logo4']= "uploads/".$file_log4;
		$datoPersonal['logo4']= "uploads/".$file_log4;
		
	}
	
	if($request->hasFile('logo5')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo5);
	
		$foto = Image::make($request->file('logo5')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_log5 = "logo5" . time() . "." . $request->file('logo5')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_log5));
		$logo5= $datoPersonal['logo5']= "uploads/".$file_log5;
		$datoPersonal['logo5']= "uploads/".$file_log5;
		
	}
	
	if($request->hasFile('logo6')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->logo6);
	
		$foto = Image::make($request->file('logo6')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		
		$file_log6 = "logo6" . time() . "." . $request->file('logo6')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_log6));
		$logo6= $datoPersonal['logo6']= "uploads/".$file_log6;
		$datoPersonal['logo6']= "uploads/".$file_log6;
		
	}
	
	if($request->hasFile('qr')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->qr);
	
		$foto = Image::make($request->file('qr')->getRealPath());
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		$foto->orientate();
		$file_name2 = "qr" . time() . "." . $request->file('qr')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name2));
		$qr= $datoPersonal['qr']= "uploads/".$file_name2;
		$datoPersonal['qr']= "uploads/".$file_name2;
		
	}
	if($request->hasFile('qr2')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->qr2);
	
		$foto = Image::make($request->file('qr2')->getRealPath());
		/*$foto->resize(null, 700, function($constraint2) {
			 $constraint2->aspectRatio();
			 $constraint2->upsize();
		});*/
		$foto->orientate();
		$file_name2 = "qr2" . time() . "." . $request->file('qr2')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name2));
		$qr2= $datoPersonal['qr2']= "uploads/".$file_name2;
		$datoPersonal['qr2']= "uploads/".$file_name2;
		
	}
	
	/*
	if($request->hasFile('vcard')){
		$personalInformation = PersonalInformation::findOrFail($id);
		Storage::delete('public/'.$personalInformation->vcard);
		$datoPersonal['vcard'] = $request->file('vcard')->store('uploads', 'public');
	}
	*/
	
		$days =$request->days_lab;
		if($days){
			$array_day = implode(',', $days);
		}else{
		$array_day = "";	
		}
	
	$datoPersonal['days_lab']= $array_day;
	PersonalInformation::where('id','=',$id)->update($datoPersonal);
		$personalInformation = PersonalInformation::findOrFail($id);
	
	if($request->has('form')){
	return response()->json(['success'=>'Contact form submitted successfully']);
	//return view('personalInformations.edit', compact('personalInformation'));
	return redirect('personalInformation')->with('success', 'datos Personales Modificados!');

		}
	return redirect('personalInformation')->with('success', 'datos Personales Modificados!');
    }



	public function disappear(Request $request)
	    {
			$id =$request->id;
			
			
			 DB::table('personal_information')
				->where('id', $id)
				->update(['status_id' => 2]);
			
			$data = "eliminado";
			return response()->json($data);
		
		}



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
   // public function destroy(PersonalInformation $personalInformation)
    public function destroy ($id)
    {
		$personalInformation = PersonalInformation::findOrFail($id);
		
		if(Storage::delete('public/'.$personalInformation->photo)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->favi)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->favi2)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->photo2)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->photo3)){
		PersonalInformation::destroy($id);	
		}


		if(Storage::delete('public/'.$personalInformation->logo)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->logo2)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->logo3)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->logo4)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->logo5)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->logo6)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->qr)){
		PersonalInformation::destroy($id);	
		}
		
		if(Storage::delete('public/'.$personalInformation->qr2)){
		PersonalInformation::destroy($id);	
		}
		
		
	$msg = "eliminado";
			return response()->json($msg);
    }
	
	
	
	
	public function calendar($slug)
    {
		$personalInformation = PersonalInformation::where('slug_calendar', $slug)->first(); 		 
		if($personalInformation){
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
		 


			return view('events.indexc', compact('personalInformation', 'hora_inicio', 'hora_fin', 'inicio_receso', 'fin_receso', 'intervalo'));
		 }else{
			 return view('home'); 
		 }

    }
	
	
	
}
