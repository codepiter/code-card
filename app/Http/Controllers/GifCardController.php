<?php

namespace App\Http\Controllers;

use App\GifCard;
use App\Customer;
use App\Coin;
use App\Status;
use App\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;


class GifCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = auth()->id();
		$user = PersonalInformation::where('user_id', $id_user)->first();
		
		if($user){
            //echo "exisste";
            $pi =$user->id;
            $gifs = GifCard::where('status_id', 1)->with('customer', 'customer.personalInformation')->paginate(5);
            /*return view('gifs.index',compact('gifs', 'pi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
            return view('gifs.n-index',compact('gifs', 'pi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
		}else{
            //echo "no existe";
            $messagedgif = "Ud.no tiene un perfil creado, por ello no puede acceder a esta área";
            return redirect()->route('personalInformation.create')
                            ->with(compact('messagedgif'));
		}
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	   public function create()
		{
			//
		}
	 
    public function create2($id)
    {
		//echo $id;die;
		
		$customer = Customer::where('id', $id)->first();
		$idcust = $customer->id;
		
		$rand1 = Str::random(6);
		$rand2 = Str::random(6);
		$rand3 = Str::random(6);
		$rand4 = Str::random(4);

		$str = $rand1."-".$rand2."-".$rand3."-".$rand4.$idcust;

		$randstring = strtoupper($str);
		
		
		$monedas = Coin::all();
		$status = Status::all();
		
       return view('gifs.n-create', compact('customer', 'randstring','monedas', 'status'));
	   
	   
	   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		$var = $this->create();
		//echo $var;die;
		
       $request->validate([
			//'customer_id'=>'required',
			/*'identifier'=>'required',
			'emition'=>'required',
	        'expiration'=>'required',
	        'amount'=>'required',
	        'moneda'=>'required',
			*/
        ]);

//GifCard::create($request->all());
		
			$gifs = GifCard::create([
			//'customer_id'=> //Auth::user()->id,
			'customer_id'=> $request->get('customer_id'),
			'coin_id'=> $request->get('coin_id'),
			'status_id'=> 1,
			
			'identifier'=> $request->get('identifier'),
			'emition'=> $request->get('emition'),
			'expiration'=> $request->get('expiration'),
			'amount'=> $request->get('amount'),
			'moneda_id'=> $request->get('moneda_id'),
			'notes'=> $request->get('notes')
		]);
		
        return redirect()->route('gifCards.index')
                        ->with('success','Gifs creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GifCard  $gifCard
     * @return \Illuminate\Http\Response
     */
    public function show(GifCard $gifCard)
    {
       return view('gifs.show',compact('gifCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GifCard  $gifCard
     * @return \Illuminate\Http\Response
     */
    public function edit(GifCard $gifCard)
	{
		$monedas = Coin::all();
		$status = Status::all();
		
    
        return view('gifs.n-edit',compact('gifCard','monedas','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GifCard  $gifCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GifCard $gifCard)
    {
         $request->validate([
			'customer_id'=>'required'
			/*
			'identifier'=>'required',
			'emition'=>'required',
			'expiration'=>'required',
			'amount'=>'required',
	        'moneda'=>'required',
			*/
        ]);
		
        $gifCard->update($request->all());
  
        return redirect()->route('gifCards.index')
                        ->with('success','gifCard updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GifCard  $gifCard
     * @return \Illuminate\Http\Response
     */
     
      public function disappear($id)
	    {
		 DB::table('gifcards')
            ->where('id', $id)
            ->update(['status_id' => 2]);
			return redirect('gifCards')->with('success', 'Gif Card eliminada con exito!');
		}
     
    public function destroy(GifCard $gifCard)
    {
        $gifCard->delete();
  
        return redirect()->route('gifCards.index')
                        ->with('success','GifCard deleted successfully');
    }
}