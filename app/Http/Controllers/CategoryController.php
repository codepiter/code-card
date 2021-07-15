<?php

namespace App\Http\Controllers;

use App\Category;
use App\PersonalInformation;

use Illuminate\Http\Request;
use Auth;


class CategoryController extends Controller
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
		
		
		$categories = Category::where('personal_information_id', $pi)->paginate(6);		
		
        return view('categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
		}else{
		$messagecat = "Oh, parece que aun no tiene su perfil interactivo creado, creelo a continuación para que pueda ingresar categorias a los Menus";
		return redirect()->route('personalInformation.create')
                        ->with(compact('messagecat'));

		}	
			 
			 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('categories.create');
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
			'categ_name'=>'required'

        ]);
		$categories = Category::create([
			'personal_information_id' => Auth::user()->personalInformation->id,
			'categ_name'=> $request->get('categ_name'),
		]);
		
        return redirect()->route('categories.index')
                        ->with('success','Cliente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
         return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
			'categ_name'=>'required',
        ]);
		
		$category->update([
		'categ_name' => $request->get('categ_name'),
        ]);
		
		return redirect('categories')->with('success', 'Su registro se ha actualizado Satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Category $category)
    public function destroy($id)
    {
      //$category = Category::findOrFail($id);
	    Category::find($id)->delete($id);
		return redirect()->back()->with('delete', 'La Categoría fué eliminada del sistema');
    }
}
