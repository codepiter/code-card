<?php

namespace App\Http\Controllers;

use App\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show(Idioma $idioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function edit(Idioma $idioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Idioma $idioma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Idioma::find($id)->delete($id);
  
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
