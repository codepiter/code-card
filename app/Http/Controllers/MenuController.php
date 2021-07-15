<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Category;
use App\TabbedMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;
use Illuminate\Support\Str;

class MenuController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $menus = Menu::latest()->paginate(5);
  
        /* return view('menus.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5); */
        return view('menus.n-index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categorias = Category::where('personal_information_id', Auth::user()->personalInformation->id)->get(); 
			
        return view('menus.n-create',compact('categorias'));
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
			'restaurant'=>'required',
			 'logo' =>  'mimes:png,jpg,jpeg|max:8000',
			 'fondo'   => 'mimes:png,jpg,jpeg|max:8000',
        ]);
		
		if ($request->file('logo')== null) {
				 $logo="";
				}else{
				
						$log = Image::make($request->file('logo')->getRealPath());
						$log->orientate();
					
						$file_name1 = "logo" . time() . "." . $request->file('logo')->extension();
						//$log->save(storage_path("app\public\uploads\\" . $file_name1));
						$log->save(storage_path('/app/public/uploads/' . $file_name1));
						
						$logo= $datosPersonals['logo']= "uploads/".$file_name1;
				}
				
		if ($request->file('fondo')== null) {
				 $fondo="";
				}else{
				
						$fond = Image::make($request->file('fondo')->getRealPath());
						$fond->orientate();
					
						$file_name2 = "fondo" . time() . "." . $request->file('fondo')->extension();
						//$fond->save(storage_path("app\public\uploads\\" . $file_name2));
						$fond->save(storage_path('/app/public/uploads/' . $file_name2));
						
						$fondo= $datosPersonals['fondo']= "uploads/".$file_name2;
				}
				
				
			$nom_rest = $request->get('restaurant');
			$slug = Str :: slug ($nom_rest);
			
			
			$menus = Menu::create([
		    'personal_information_id' => Auth::user()->personalInformation->id,
			    
			     
				 'slug' => $slug,
				 'logo' => $logo,
				 'fondo' => $fondo,
				 'restaurant' => $request->get('restaurant'),	
				 'address' => $request->get('address'),
				 'sze_font_rest' => $request->get('sze_font_rest'),
				 'sze_font_add' => $request->get('sze_font_add'),
				 'color_font_rest' => $request->get('color_font_rest'),
				 'color_font_add' => $request->get('color_font_add'),
				 'letra_font_rest' => $request->get('letra_font_rest'),
				 'letra_font_add' => $request->get('letra_font_add'),
				 'size_font_title' => $request->get('size_font_title'),
				 'size_font_descr' => $request->get('size_font_descr'),
				 'size_font_price' => $request->get('size_font_price'),
				 'color_font_title' => $request->get('color_font_title'),
				 'color_font_descr' => $request->get('color_font_descr'),
				 'color_font_price' => $request->get('color_font_price'),
				 'letra_title' => $request->get('letra_title'),
				 'letra_descr' => $request->get('letra_descr'),
				 'letra_price' => $request->get('letra_price'),
	
        ]);
			

		    $menu_id = $menus->id;
		    $status_id = 1;
			
			//array de platos
			
			$title = $request->get('title');
			$description = $request->get('description');
			$category_id = $request->get('category_id');
			$price = $request->get('price');
			$photo_1 = $request->file('photo1');
			$photo_2 = $request->file('photo2');
			$photo_3 = $request->file('photo3');
			$photo_4 = $request->file('photo4');
			$photo_5 = $request->file('photo5');
			$photo_6 = $request->file('photo6');


			$cont2 = 0;
			$plt= count($title);
			
			
			while ($cont2 < $plt){
				
				$rand=rand();
				
				/*imagen 1*/
				$img1=$photo_1[$cont2];
				
				if ($img1== null) {
				 $photo1="";
				}else{
					$photoa = Image::make($img1->getRealPath());
					$photoa->orientate();
				
					$file_name1 = "photo1" . $rand . "." . $img1->extension();
					//$photoa->save(storage_path("app\public\uploads\\" . $file_name1));
					$photoa->save(storage_path('/app/public/uploads/' . $file_name1));
					$photo1= "uploads/".$file_name1;
				}
				/*fin imagen 1*/
				
				
				
				
				$photo2="";
				$photo3="";
				$photo4="";
				$photo5="";
                $photo6="";
				
			$platillo = new TabbedMenu([
				'menu_id' => $menu_id,
				'title' => $title[$cont2],
				'description' => $description[$cont2],
				'category_id' => $category_id[$cont2],
				'price' => $price[$cont2],
				'photo1' => $photo1,
				'photo2' => $photo2,
				'photo3' => $photo3,
				'photo4' => $photo4,
				'photo5' => $photo5,
				'photo6' => $photo6
			]);                    
			$platillo->save();	
			
			$cont2=$cont2+1;
			}
		
		
		
		return redirect('menus')->with('success', 'Su registro se ha realizado Satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
		$platos = TabbedMenu::where('menu_id', $menu->id)->where('status_id', 1)->get();
		
		$categorias = Category::where('personal_information_id', Auth::user()->personalInformation->id)->get(); 
		
        return view ('menus.show', compact('menu','platos','categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
		$platos = TabbedMenu::where('menu_id', $menu->id)->get(); 
		$categorias = Category::where('personal_information_id', Auth::user()->personalInformation->id)->get(); 
			
         return view('menus.n-edit',compact('menu','platos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
		
		$request->validate([
			'restaurant'=>'required',
			 'logo' =>  'mimes:png,jpg,jpeg|max:8000',
			 'fondo'   => 'mimes:png,jpg,jpeg|max:8000',
        ]);
		
		if ($request->file('logo')== null) {
				 $logo=$menu->logo;
				}else{
				
						$log = Image::make($request->file('logo')->getRealPath());
						$log->orientate();
					
						$file_name1 = "logo" . time() . "." . $request->file('logo')->extension();
						//$log->save(storage_path("app\public\uploads\\" . $file_name1));
						$log->save(storage_path('/app/public/uploads/' . $file_name1));
						$logo= $datosPersonals['logo']= "uploads/".$file_name1;
				}
				
		if ($request->file('fondo')== null) {
				 $fondo=$menu->fondo;
				}else{
				
						$fond = Image::make($request->file('fondo')->getRealPath());
						$fond->orientate();
					
						$file_name2 = "fondo" . time() . "." . $request->file('fondo')->extension();
						//$fond->save(storage_path("app\public\uploads\\" . $file_name2));
						$fond->save(storage_path('/app/public/uploads/' . $file_name2));
						$fondo= $datosPersonals['fondo']= "uploads/".$file_name2;
				}
				
				
			$nom_rest = $request->get('restaurant');
			$slug = Str :: slug ($nom_rest);
			
			$menu->update([
		    'user_id' => Auth::user()->id,
		    
			     'slug' => $slug,
				 'logo' => $logo,
				 'fondo' => $fondo,
				 'restaurant' => $request->get('restaurant'),	
				 'address' => $request->get('address'),
				 'sze_font_rest' => $request->get('sze_font_rest'),
				 'sze_font_add' => $request->get('sze_font_add'),
				 'color_font_rest' => $request->get('color_font_rest'),
				 'color_font_add' => $request->get('color_font_add'),
				 'letra_font_rest' => $request->get('letra_font_rest'),
				 'letra_font_add' => $request->get('letra_font_add'),
				 'size_font_title' => $request->get('size_font_title'),
				 'size_font_descr' => $request->get('size_font_descr'),
				 'size_font_price' => $request->get('size_font_price'),
				 'color_font_title' => $request->get('color_font_title'),
				 'color_font_descr' => $request->get('color_font_descr'),
				 'color_font_price' => $request->get('color_font_price'),
				 'letra_title' => $request->get('letra_title'),
				 'letra_descr' => $request->get('letra_descr'),
				 'letra_price' => $request->get('letra_price'),
	
        ]);
			

		    $menu_id = $menu->id;
			
		//array de platos nuevos
		if($request->get('title')){
		
			$title = $request->get('title');
			$category_id = $request->get('category_id');
			$description = $request->get('description');
			$price = $request->get('price');
			$status_id = $request->get('status_id');
			$photo_1 = $request->file('photo1');

			$cont2 = 0;
			$plt= count($title);
			
			
			while ($cont2 < $plt){
				
				$rand=rand();
				
				/*imagen 1*/
				$img1=$photo_1[$cont2];
				
				if ($img1== null) {
				 $photo1="";
				}else{
					$photoa = Image::make($img1->getRealPath());
					$photoa->orientate();
				
					$file_name1 = "photo1" . $rand . "." . $img1->extension();
					//$photoa->save(storage_path("app\public\uploads\\" . $file_name1));
					$photoa->save(storage_path('/app/public/uploads/' . $file_name1));
					$photo1= "uploads/".$file_name1;
				}
				/*fin imagen 1*/
				
				$photo2="";
				$photo3="";
				$photo4="";
				$photo5="";
                $photo6="";
				
			 $platillo = new TabbedMenu([
				'menu_id' => $menu_id,
				'title' => $title[$cont2],
				'category_id' => $category_id[$cont2],
				'description' => $description[$cont2],
				'price' => $price[$cont2],
				'status_id' => $status_id[$cont2],
				'photo1' => $photo1,
				'photo2' => $photo2,
				'photo3' => $photo3,
				'photo4' => $photo4,
				'photo5' => $photo5,
				'photo6' => $photo6
			]);                    
			$platillo->save();	
			
			$cont2=$cont2+1;
			}
		}
		
		//array de platos existentes
		if($request->get('title_ex')){	
		
			$plato_id = $request->get('id_plato');
			$category_id_ex = $request->get('category_id_ex');
			$title_ex = $request->get('title_ex');
			$description_ex = $request->get('description_ex');
			$price_ex = $request->get('price_ex');
			$status_id_ex = $request->get('status_id_ex');
			$photo_1_ex = $request->file('photo1_ex');

			$cont1 = 0;
			$plts= count($title_ex);
			
			while ($cont1 < $plts){
				
				$randn=rand();
											
				$id_p= $plato_id[$cont1];
		
				$plato = TabbedMenu::where('id', $id_p)->first(); 
				
					$img=$plato->photo1;
				/*imagen 1*/
				$img1=$photo_1_ex[$cont1];
				
				if ($img1== null) {
				 $photo1_ex=$img;
				}else{
					
				Storage::delete('public/'.$plato->photo1);
		
		
					$photoa = Image::make($img1->getRealPath());
					$photoa->orientate();
				
					$file_name1 = "photo1" . $randn . "." . $img1->extension();
					//$photoa->save(storage_path("app\public\uploads\\" . $file_name1));
					$photoa->save(storage_path('/app/public/uploads/' . $file_name1));
					$photo1_ex= "uploads/".$file_name1;
				}
				/*fin imagen 1*/
				
				$photo2="";
				$photo3="";
				$photo4="";
				$photo5="";
                $photo6="";
                  
			$plato->update([
				'title' => $title_ex[$cont1],
				'category_id' => $category_id_ex[$cont1],
				'description' => $description_ex[$cont1],
				'price' => $price_ex[$cont1],
				'status_id' => $status_id_ex[$cont1],
				'photo1' => $photo1_ex,
				'photo2' => $photo2,
				'photo3' => $photo3,
				'photo4' => $photo4,
				'photo5' => $photo5,
				'photo6' => $photo6
			]);
			
			$cont1=$cont1+1;
			}
			
		}
		
		
		return redirect('menus')->with('success', 'Su registro se ha actualizado Satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Menu $menu)
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
	
	    if($menu->logo != ""){
		 Storage::delete('public/'.$menu->logo);
		}
		if($menu->fondo != ""){
		 Storage::delete('public/'.$menu->fondo);
		}
		
        $registros_m   = TabbedMenu::where('menu_id',$id)->get();
		//Mientras no uses "get" seguiras trabajando en la query, y con el "get" en los resultados de la query
			foreach ($registros_m as $reg) {
				
			  if ($reg->photo1) {
					Storage::delete('public/'.$reg->photo1);
			   }
			  if ($reg->photo2) {
					Storage::delete('public/'.$reg->photo2);
			   }
			   if ($reg->photo3) {
					Storage::delete('public/'.$reg->photo3);
			   }
			   if ($reg->photo4) {
					Storage::delete('public/'.$reg->photo4);
			   }
			   if ($reg->photo5) {
					Storage::delete('public/'.$reg->photo5);
			   }
			   if ($reg->photo6) {
					Storage::delete('public/'.$reg->photo6);
			   }
			  $reg->delete();
			  
			  }
		
		

		
        Menu::find($id)->delete($id);
		
			return redirect()->back()->with('delete', 'El menú fué eliminado del sistema');
			
			/*return response()->json([
			'success' => 'Record deleted successfully!'
		]);*/
    }
	
	
	
	public function getCategory(Request $request){

		 $cat = Category::where('personal_information_id', Auth::user()->personalInformation->id)->get(); 
		 
			$output ='';
		  foreach($cat as $row)
		  {  
			$output .='<option value="'.$row["id"].'">'.$row["categ_name"].'</option>';
		 }

		  return $output;
   
    }
   
   
}

