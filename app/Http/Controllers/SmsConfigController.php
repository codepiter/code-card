<?php

namespace App\Http\Controllers;

use App\SmsConfig;
use App\User;
use App\PersonalInformation;
use Illuminate\Http\Request;

class SmsConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$id_user = auth()->id();
		$user = User::find($id_user);
		$id_user_p = $user->personalInformation->id; 
		
		$cita = SmsConfig::where('personal_information_id', $id_user_p)->first();
		 if ($cita){
        $cant = SmsConfig::where('personal_information_id', $id_user_p)->get();
		$existe = 1;
		
		}else{
			$cant = 0;
			$existe = 0;
		 }
		 $datos  = SmsConfig::where('personal_information_id', $id_user_p)->orderBy('created_at')->latest()->simplePaginate(8);

          return view('smss.index',compact('datos', 'cant', 'existe', 'id_user_p'))
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
		$user = User::find($id_user);
		$id_user_p = $user->personalInformation->id;
		
		$cita = SmsConfig::where('personal_information_id', $id_user_p)->first();
		 if ($cita){
			 echo "acceso denegado";
		 }else{
        return view('smss.create');
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
            'nexmo_key' => 'required',
            'nexmo_secret' => 'required',
            'recei_numb' => 'required',
        ]);
       //$insert = SmsConfig::create($request->all());
		$id_user = auth()->id();
		$personalInformation = PersonalInformation::where('user_id', $id_user)->first();
        $id_user_p=$personalInformation->id;

	     $insert = new SmsConfig([
            'personal_information_id' => $id_user_p,
			'nexmo_key' => $request->get('nexmo_key'),
            'nexmo_secret' => $request->get('nexmo_secret'),
            'recei_numb' => $request->get('recei_numb')
        ]);
        $insert->save();

	   return redirect()->route('sms.index')
            ->with('success', 'Sms Config created successfully.');

	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmsConfig  $smsConfig
     * @return \Illuminate\Http\Response
     */
    public function show(SmsConfig $sms)
    {

         return view('smss.show',compact('sms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsConfig  $smsConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsConfig $sms)
    {
       return view('smss.edit',compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmsConfig  $smsConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsConfig $sms)
    {
        $request->validate([
            'nexmo_key' => 'required',
            'nexmo_secret' => 'required',
            'recei_numb' => 'required',
		]);
        $sms->update($request->all());
  
        return redirect()->route('sms.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmsConfig  $smsConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $smss = SmsConfig::findOrFail($id);
	   SmsConfig::destroy($id);	
		
		/*if(Storage::delete('public/uploads/'.$inputLink->logo)){
			InputLink::destroy($id);	
		}*/
		return response()->json([
		'success' => 'Record deleted successfully!'
		]);    
    }
}



