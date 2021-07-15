<?php

namespace App\Http\Controllers;

use App\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datos = WorkExperience::latest()->paginate(5);
  
        return view('worke.index',compact('datos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worke.create');
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
            'company' => 'required',
            //'detail' => 'required',
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('worke.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show(WorkExperience $workExperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkExperience $workExperience)
    {
         return view('worke.edit',compact('workExperience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
       $request->validate([
            'company' => 'company',
            'inicio' => 'inicio',
            'fin' => 'fin',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('worke.index')
                        ->with('success','Work Experience updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
		WorkExperience::find($id)->delete($id);
  
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
	
	
    }
}
