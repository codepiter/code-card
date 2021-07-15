<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Imports\CustomersImport;

use App\Customer;
use App\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //para borrado
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $id_user = auth()->id();

		$pers = PersonalInformation::where('user_id', $id_user)->first();
		
		if($pers){
            $pi =$pers->id;
            
            
            $customers = Customer::where('personal_information_id', $pi)->paginate(6);		
            
            /*return view('customers.index',compact('customers'))
                ->with('i', (request()->input('page', 1) - 1) * 5);*/
            return view('customers.n-index',compact('customers'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
		}else{
		$messagecust = "Oh, parece que aun no tiene su perfil interactivo creado, creelo a continuación para que pueda ingresar su cartera de clientes";
		return redirect()->route('personalInformation.create')
                        ->with(compact('messagecust'));
						
		}	
			
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //return view('customers.create', compact('nomcomp'));
         return view('customers.n-create');
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
			//'personal_information_id'=>'required'
			/*'fecha_pago'=>'required',
			'n_pago'=>'required',
	        'invoice'=>'required',
	        'amount'=>'required',
	        'payment_mode'=>'required',
	        'notes'=>'required'*/
        ]);
		
		
		
		
		if ($request->file('photo')== null){
				$photo= "";
			}else{
				$photo= $customers['photo']=$request->file('photo')->store('uploads', 'public');
			}
		
		$id_user = auth()->id();

		$pers = PersonalInformation::where('user_id', $id_user)->first();
			$pi =$pers->id;
		
		//Customer::create($request->all());
		$customers = Customer::create([
			'personal_information_id'=> $pi,
			'doc_id'=> $request->get('doc_id'),
			'first_name'=> $request->get('first_name'),
			'last_name'=> $request->get('last_name'),
			'date_birth'=> $request->get('date_birth'),
			'telephone'=> $request->get('telephone'),
			'email'=> $request->get('email'),
			'photo'=> $photo,
			'address'=> $request->get('address'),	
		]);
		
        return redirect()->route('customers.index')
                        ->with('success','Cliente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.n-show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
         return view('customers.n-edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {

	$datoPersonal = request()->except(['_token', '_method']);
		
		 $request->validate([
			'personal_information_id'=>'required'
			/*
			'doc_id'=>'required',
			'first_name'=>'required',
			'last_name'=>'required',
	        'date_birth'=>'required',
	        'telephone'=>'required',
	        'email'=>'required',
	        'address'=>'required',
	        'photo'=>'required',
			*/
        ]);
		
       // $customer->update($request->all());
		
		if($request->hasFile('photo')){
		$customer = Customer::findOrFail($id);
		Storage::delete('public/'.$customer->photo);
		$datoPersonal['photo'] = $request->file('photo')->store('uploads', 'public');
	}
	
	
		Customer::where('id','=',$id)->update($datoPersonal);
		$customer = Customer::findOrFail($id);
	
  
        return redirect()->route('customers.index')
                        ->with('success','Cliente actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
  
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
	
	public function importExcel(Request $request)
	{
		$file = $request->file('file');
		Excel::import(new CustomersImport, $file);
		return back()->with('message', 'Importacion completada');
	}
	
	
	public function exportExcel()
	{
		return Excel::download(new CustomersExport, 'customer-list.xlsx');
	}
	
	
	/*
	public function importExcel(Request $request)
	{
		//return Excel::download(new CustomersExport, 'customer-list.xlsx');
	}*/
	

	public function ajaxDocId(Request $request)
    {
		if($_POST['doc_id']){
			
			$pi = Auth::user()->personalInformation->id;
			$doc_id = $_POST['doc_id'];
			
			$datos = Customer::where('doc_id', '=', $doc_id)->where('personal_information_id', '=', $pi)->get();
		
		}
        return $datos;
    }
	
	
	
}
