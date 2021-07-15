<?php

namespace App\Http\Controllers;

use App\PersonalInformation;

use App\Payment;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		
		$id = auth()->id();
		$is_admin = auth()->user()->is_admin;
		$is_activated = auth()->user()->is_activated;
		//echo $is_activated;die;
		//echo $is_admin;die; 
	  


		if ($is_admin == 1 && $is_activated ==1){

            $pagos = Payment::latest()->paginate(5);
            /*return view('pagos.index',compact('pagos'))
                ->with('i', (request()->input('page', 1) - 1) * 5);*/
            return view('pagos.n-index',compact('pagos'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }else{
            return redirect()->back()->with('inhabilitado', 'Ud No está habilitado para ejecutar esta acción');
        }
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		
	/*$user_id = auth()->id();
	$pi = PersonalInformation::where ('user_id', $user_id)->first();

		if (isset($pi)) {
		  //echo "Variable no vacia";
				 $nomb = $pi->first_name;
				 $apell = $pi->last_name;
				 $nomcomp = $nomb.' '.$apell;
				  return view('pagos.create', compact('nomcomp'));
				 
		}else{
			//echo "(usuario sin datos personales) colocar aca link para que el usuario cree un perfil de usuario";die;
		    return redirect()->route('personalInformation.create');
		}*/
		

		
		//echo $nomcomp;die;
		

		
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
			'personal_information_id'=>'required'
			/*'fecha_pago'=>'required',
			'n_pago'=>'required',
	        'invoice'=>'required',
	        'amount'=>'required',
	        'payment_mode'=>'required',
	        'notes'=>'required'*/
        ]);
		
		Pago::create($request->all());
        return redirect()->route('pagos.index')
                        ->with('success','Pago created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//$pi = PersonalInformation::find($id);
        $pagoId = Payment::findOrFail($id); // Buscando el registro de pago usando el id
        $pi = $pagoId->user->personalInformation; // Almacena el $pi la información personal del usuario.

       return view('pagos.n-show',compact('pi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
         return view('pagos.edit',compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
		 $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $pago->update($request->all());
  
        return redirect()->route('pagos.index')
                        ->with('success','Pago updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
         $pago->delete();
  
        return redirect()->route('pagos.index')
                        ->with('success','Pago deleted successfully');
    }
}