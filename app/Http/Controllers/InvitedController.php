<?php

namespace App\Http\Controllers;

use App\Mail\Invitation;
use App\Invited;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use DB;

class InvitedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $inviteds = Invited::latest()->paginate(5);
  
        /*return view('inviteds.index',compact('inviteds'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
        return view('inviteds.n-index',compact('inviteds'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$id_user = auth()->id();
		
		 $user = User::where('id', $id_user)->first();
		 $is_admin = $user->is_admin;

		/*$user = User::where('id', '=', $id_user)->first();
		$activ=$user->is_activated;*/

if ($is_admin==1){
		$rand1 = Str::random(6);
		$rand2 = Str::random(6);
		$rand3 = Str::random(6);
		$rand4 = Str::random(4);

		$str = $rand1."-".$rand2."-".$rand3."-".$rand4.$id_user;
		$randstring = strtoupper($str);

		 //return view('inviteds.create', compact('randstring'));
		 return view('inviteds.n-create', compact('randstring'));
		 }else{
			 echo"Ud no esta habilitado para ejecutar esta acción";
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
            // 'nombre' => 'required',
            // 'apellido' => 'required',
             'email' => 'required',
            // 'telefono' => 'required',
			 'codig' => 'required'
        ]);
  
        //Invited::create($request->all());

		    $invited = new Invited([
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'codig' => $request->get('codig')
        ]);
        $invited->save();

			$email = $request->get('email');
			$codigo = $request->get('codig');
			//echo $name;die;
           //Mail::to($name)->send(new MessageReceived);
           Mail::to($email)->queue(new Invitation($invited));

	   /* return redirect()->route('inviteds.index')
                      ->with('success','Invitado creado exitosamente y le enviamos un correo electronico con un codigo'); */
            return redirect()->route('inviteds.n-index')
            ->with('success','Invitado creado exitosamente y le enviamos un correo electronico con un codigo');
						

			
		
    }
    
    public function codigo(Request $request)
    {
		
		$id_user = auth()->id();
		
		$user = User::where('id', $id_user)->first();
			$email = $user->email;		
		
        $codigo = $request->get('codig');
        $type = $request->get('type_card');
		
		
		$consulta= Invited::where('email', '=', $email)->where('codig', '=', $codigo)->first();
		 
		 if($consulta){
			 
			$affected = DB::table('users')
			  ->where('id', $id_user)
			  ->update(['is_activated' => 1]);
						  
						  
			$affected2 = DB::table('payments')->insert([
			  'amount' => 0,
			  'user_id' => $id_user,
			  'payment_mode' => 'invitado',
			  'type_card' => $type
			 ]);
			 
			
			   $respuesta = "1";
			 
		 }else{
			  $respuesta = "0";
		 }
	
		return response()->json($respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function show(Invited $invited)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function edit(Invited $invited)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invited $invited)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invited  $invited
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invited $invited)
    {
        //
    }
}
