<?php

namespace App\Http\Controllers;

use App\TabbedMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TabbedMenuController extends Controller
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
     * @param  \App\Models\TabbedMenu  $tabbedMenu
     * @return \Illuminate\Http\Response
     */
    public function show(TabbedMenu $tabbedMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TabbedMenu  $tabbedMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(TabbedMenu $tabbedMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TabbedMenu  $tabbedMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TabbedMenu $tabbedMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TabbedMenu  $tabbedMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		
		$plato= TabbedMenu::find($id);
		
		if($plato->photo1 != ""){
		 Storage::delete('public/'.$plato->photo1);
		}
        TabbedMenu::find($id)->delete($id);
		
		
  
		return response()->json([
			'success' => 'Record deleted successfully!'
		]);
    }
}
