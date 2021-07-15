<?php

namespace App\Http\Controllers;

use App\Resume;
use App\Skill;
use App\Habilidad;
use Illuminate\Http\Request;

use App\Formation;
use App\Language;
use App\Idioma;
use App\Reference;
use App\User;
use App\Position;
use App\PersonalInformation;
use App\WorkExperience;
use PDF;
//use Carbon\Carbon;

class ResumeController extends Controller
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
		 
		if ($is_admin == 1){
			
			$resumes= Resume::paginate(6);	
			
			$personalInformation = PersonalInformation::where('user_id', $id)->first(); 
			$pers_id=$personalInformation->id;
				 if($personalInformation){
					$resum= Resume::where('personal_information_id', $pers_id)->first();
				 if(isset($resum)){
							 $id_a = "1";
						 }else{
							$id_a = "0"; //no definido
						 }		 
				 }
			
		}else{
						
		 $personalInformation = PersonalInformation::where('user_id', $id)->first(); 
			 if($personalInformation){
			 $pers_id=$personalInformation->id;
			 $resumes= Resume::where('personal_information_id', $pers_id)->orderBy('created_at','desc')->paginate(6);
			 
					 if(isset($resumes)){
						 $id_a = "1";
					 }else{
						$id_a = "0"; //no definido
					 }
			 }else{
				 return redirect()->route('personalInformation.create')->with('messageresu', 'Ud.no tiene un perfil creado por ello no puede acceder a la carga de su Curriculum');
				}
			 }
		
		  //return view('resumes.index', compact('resumes', 'id_a'));
		  return view('resumes.n-index', compact('resumes', 'id_a'));
		 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$datos = Skill::all();
		
		$id_user = auth()->id();
		
		$personalInformation = PersonalInformation::where('user_id', $id_user)->first(); 
		$pers_id=$personalInformation->id;
		 
		$res = Resume::where('personal_information_id', $pers_id)->first();
		 
	   if (empty($res))
		{
			return view('resumes.n-create', compact('datos'));
		}
		else{
		
			$res_id=$res->id;
		
        return redirect()->route('resumes.edit', array($res_id));

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
	$id_user = auth()->id();
	$user = PersonalInformation::where('user_id', $id_user)->first();
	$id_pers = $user->id;
	

	$resume = Resume::create([
		'personal_information_id' => $id_pers
	]);


	$resume_id= $resume->id;
	

	//array formations

	$instituto_name=$request->get('instituto_name');
	$culminado=$request->get('culminado');
	$titulo_obtenido=$request->get('titulo_obtenido');
	$inicio_formation=$request->get('inicio_formation');
	$fin_formation=$request->get('fin_formation');
	
	
		$cont2 = 0;
	$ins= count($instituto_name);
	
	while ($cont2 < $ins){
		
	$formation = new Formation([
		'resume_id' => $resume_id,
		'instituto_name' => $instituto_name[$cont2],
		'culminado' => $culminado[$cont2],
		'titulo_obtenido' => $titulo_obtenido[$cont2],
		'inicio' => $inicio_formation[$cont2]."-01",
		'fin' => $fin_formation[$cont2]."-01"
	]);
	$formation->save();	
	
	$cont2=$cont2+1;
	}
	
	
	//array work experience
	
	$company_work=$request->get('company');
	$inicio_work=$request->get('inicio_work');
	$fin_work=$request->get('fin_work');
	$actualidad_work=$request->get('actual_work');

	//array positions

	$position=$request->get('position');
	$description_p=$request->get('description_p');
	$inicio_p=$request->get('inicio_p');
	$fin_p=$request->get('fin_p');
	$actualidad_p=$request->get('actual_p');
	$position_num_desc=$request->get('num_desc');

	//------------//
	
	$work_n=$request->get('desc_num');

	
	
	$cont1 = 0;
	$comp= count($company_work);
	$pos= count($position);
	
	
	while ($cont1 < $comp){
		
		if($fin_work[$cont1]){
			$fin = $fin_work[$cont1]."-01";
		}else{
			$fin = NULL;
		};
		
		$work_exp = $resume->workExperience()->create([
			'resume_id'=> $resume_id,
			'company'=> $company_work[$cont1],
			'inicio'=> $inicio_work[$cont1]."-01",
			'fin'=> $fin,
			'actualidad'=> $actualidad_work[$cont1],
		]);
	
	
	$work_exp_id=$work_exp->id;
	
	$numero_work_e=$work_n[$cont1]; 
	
	$cont = 0;
		while ($cont < $pos){
			
		if($fin_p[$cont]){
			$fi = $fin_p[$cont]."-01";
		}else{
			$fi = NULL;
		};
			
		$d_n= $position_num_desc[$cont];
			if($numero_work_e === $d_n){
			$positionresume = new Position([
			'work_experience_id'=>$work_exp_id,
			'position_name'=>$position[$cont],
			'description'=>$description_p[$cont],
			'inicio'=>$inicio_p[$cont]."-01",
			'fin'=>$fi,
			'actualidad'=>$actualidad_p[$cont],
			]);
			$positionresume->save();
			}
			$cont=$cont+1;
		}
	$cont1=$cont1+1;
	}
	
		//array habilidades
		$skill_id=$request->get('skill_id');
		$medida=$request->get('medida');
		
		
		$cont3 = 0;
		$hab= count($skill_id);
		
		if($hab > 0){
		
			while ($cont3 < $hab){
		      
			$resume->habilidades()->create([
			'resume_id'=> $resume_id,
		    'skill_id'=>$skill_id[$cont3],
			'medida'=>$medida[$cont3],
			]);
	
			$cont3=$cont3+1;
			}
			
		}

		
		//array idiomas
		$language_id=$request->get('language_id');
		$level=$request->get('level');
		
		
		
		$cont4 = 0;
		$idio= count($language_id);

		if($idio > 0){
			while ($cont4 < $idio){
		      
				$resume->idiomas()->create([
				'language_id'=>$language_id[$cont4],
				'resume_id'=> $resume_id,
				'level'=>$level[$cont4],
				]);
		
				$cont4=$cont4+1;
			}
		}
			
		//array referencias
		
		$nombre_ref=$request->get('nombre_ref');
		$telefono_ref=$request->get('telefono_ref');
		
		$cont5 = 0;
		$ref= count($nombre_ref);

		if($ref > 0){
			while ($cont5 < $ref){
		      
				$resume->references()->create([
				'nombre'=>$nombre_ref[$cont5],
				'resume_id'=> $resume_id,
				'telefono'=>$telefono_ref[$cont5],
				]);
		
				$cont5=$cont5+1;
			}
		}
		
		
        //return redirect('/personalInformation')->with('success', ' Su Resumen curricular fue creado exitosamente.');
        return redirect('/resumes')->with('success', ' Su Resumen curricular fue creado exitosamente.');
         // return view('resumes.index')->with('success', ' Su Resumen curricular fue creado exitosamente.');;
   }
	
	
	public function edit(Resume $resume)
    {

		  $id = auth()->id();

		 $personalInformation = PersonalInformation::where('user_id', $id)->first(); 
		 if($personalInformation){
		 $pers_id=$personalInformation->id;
		 $resumes= Resume::where('personal_information_id', '=', $pers_id)->first();
			//$id_res = $resumes->id;

			// Asignando el id de resume y el registro completo
			$id_res = $resume->id;
			$resumes = $resume;


		$resume_habilidades = Resume::with('habilidades')->where('id', '=', $id_res)->get();
		$habs_persona = $resume_habilidades->first()->habilidades;


		$formations = Formation::where('resume_id', $id_res)->get(); 
		
		$work_exp = WorkExperience::where('resume_id', $id_res)->get(); 
		
		$idiomas = Idioma::where('resume_id', $id_res)->get(); 
		
		$referencias = Reference::where('resume_id', $id_res)->get(); 
		
		$work_exp_ids = WorkExperience::select('id')->where('resume_id', $id_res)->get();
		
		$ids=array();
		foreach ($work_exp_ids as $idw){
			$id_we = $idw->id;
			$posit = Position::whereIn('work_experience_id', array($id_we))->get();
			array_push($ids, $posit);
		}
		
		$position=$ids;
		
		
		/*para combos existentes*/
	
		$skills = Skill::all();
		$idio = Language::all();
	
		  return view('resumes.n-edit', compact('habs_persona', 'resumes', 'personalInformation', 'formations', 'work_exp', 'position', 'idiomas', 'referencias','skills','idio'));
		 }else{
			 
		 }

    }
    //public function update(Request $request, Resume $resume)
    public function update(Request $request, $id)
	{
		$res_id=$request->input('res_id');
		
		$pers_id=$request->input('pers_id');
		
		$formations = Formation::where('resume_id', $res_id)->get(); 
	   	
		
		//array formations existentes

	if($request->get('instituto_name')){
		
		$id_form=$request->get('id_form');
		$instituto_name=$request->get('instituto_name');
		$culminado=$request->get('culminado');
		$titulo_obtenido=$request->get('titulo_obtenido');
		$inicio_formation=$request->get('inicio_formation');
		$fin_formation=$request->get('fin_formation');
		
		$cont2 = 0;
		$ins= count($instituto_name);
		
		while ($cont2 < $ins){
			
		$id_f= $id_form[$cont2];
		
		
		$formation = Formation::where('id', $id_f)->first(); 
	
			$formation->update([
				'instituto_name' => $instituto_name[$cont2],
				'culminado' => $culminado[$cont2],
				'titulo_obtenido' => $titulo_obtenido[$cont2],
				'inicio' => $inicio_formation[$cont2]."-01",
				'fin' => $fin_formation[$cont2]."-01"
			]);
				
		$cont2=$cont2+1;
		}
	}
		
		//array formations NUEVOS
		
		if($request->get('instituto_name_n')){

			$instituto_name_n=$request->get('instituto_name_n');
			$culminado_n=$request->get('culminado_n');
			$titulo_obtenido_n=$request->get('titulo_obtenido_n');
			$inicio_formation_n=$request->get('inicio_formation_n');
			$fin_formation_n=$request->get('fin_formation_n');
			
			$cont8 = 0;
			$ins8= count($instituto_name_n);
			
			while ($cont8 < $ins8){
				
			$formatio = new Formation([
				'resume_id' => $id,
				'instituto_name' => $instituto_name_n[$cont8],
				'culminado' => $culminado_n[$cont8],
				'titulo_obtenido' => $titulo_obtenido_n[$cont8],
				'inicio' => $inicio_formation_n[$cont8]."-01",
				'fin' => $fin_formation_n[$cont8]."-01"
			]);
			$formatio->save();	
					
			$cont8=$cont8+1;
			}
		
		} 
	

	//array work experience existentes
	
	if($request->get('id_experience')){
	
	$id_experience=$request->get('id_experience');
	$company_work=$request->get('company');
	$inicio_work=$request->get('inicio_work');
	$fin_work=$request->get('fin_work');
	$actual_work=$request->get('actual_work');


	

	//actualizar work experience existentes
	$cont1 = 0;
	$exp= count($company_work);
	
		
	while ($cont1 < $exp){
		
		$id_we= $id_experience[$cont1];
		
		
		$expe = WorkExperience::where('id', $id_we)->first(); 
			
		if($fin_work[$cont1]){
			$fin = $fin_work[$cont1]."-01";
		}else{
			$fin = NULL;
		};
		
		$expe->update([
		'company'=> $company_work[$cont1],
		'inicio'=> $inicio_work[$cont1]."-01",
		'fin'=> $fin,
		'actualidad'=> $actual_work[$cont1],
		]);
					


		$cont1=$cont1+1;
	}

	
}
	
	
	//work experience NUEVOS y sus cargos
	
	if($request->get('company_n')){
			
		//array work experience nuevos
	$company_work_n=$request->get('company_n');
	$inicio_work_n=$request->get('inicio_work_n');
	$fin_work_n=$request->get('fin_work_n');
	$actual_work_n=$request->get('actual_work_n');

	$work_num_n=$request->get('desc_num');
	
	
		//array positions nuevos

	$position_n=$request->get('position_n');
	$description_p_n=$request->get('description_p_n');
	$inicio_p_n=$request->get('inicio_p_n');
	$fin_p_n=$request->get('fin_p_n');
	$actualidad_p_n=$request->get('actual_p_n');
	$position_num_desc_n=$request->get('num_desc');
	
	
	
	//agregar work experiences nuevos
	
	$cont7 = 0;
	$exp_n= count($company_work_n);
	$pos_n= count($position_n);
		
		while ($cont7 < $exp_n){
				
			if($fin_work_n[$cont7]){
				$fin = $fin_work_n[$cont7]."-01";
			}else{
				$fin = NULL;
			};

				$worke = new WorkExperience([
					'resume_id' => $id,
					'company'=> $company_work_n[$cont7],
					'inicio'=> $inicio_work_n[$cont7]."-01",
					'fin'=> $fin,
					'actualidad'=> $actual_work_n[$cont7],
				]);
				$worke->save();				

				/*bucle de cargos*/
				$work_exp_id=$worke->id;
				
				$numero_work_e_n=$work_num_n[$cont7]; 
				
				$cont4 = 0;
				while ($cont4 < $pos_n){
					
				if($fin_p_n[$cont4]){
					$fi_nn = $fin_p_n[$cont4]."-01";
				}else{
					$fi_nn = NULL;
				};
					
				$d_n_n= $position_num_desc_n[$cont4];
				
					if($numero_work_e_n === $d_n_n){
						
						$position_new = new Position([
							'work_experience_id'=>$work_exp_id,
							'position_name'=>$position_n[$cont4],
							'description'=>$description_p_n[$cont4],
							'inicio'=>$inicio_p_n[$cont4]."-01",
							'fin'=>$fi_nn,
							'actualidad'=>$actualidad_p_n[$cont4],
						]);
						
						$position_new->save();
					}
					$cont4=$cont4+1;
				}



			$cont7=$cont7+1;
		}
	}
	
	
	
		//actualizar cargos existentes

		if($request->get('id_position')){	

		$id_position=$request->get('id_position');
		$position=$request->get('position');
		$description_p=$request->get('description_p');
		$inicio_p=$request->get('inicio_p');
		$fin_p=$request->get('fin_p');
		$actual_p=$request->get('actual_p');
	
	
		$cont = 0;
		$post= count($position);
		
		
		while ($cont < $post){
			
			if($fin_p[$cont]){
				$fi = $fin_p[$cont]."-01";
			}else{
				$fi = NULL;
			};
				
			$id_posit=$id_position[$cont];
			
			$posi = Position::where('id', $id_posit)->first(); 
		
			$posi->update([
			'position_name'=>$position[$cont],
			'description'=>$description_p[$cont],
			'inicio'=>$inicio_p[$cont]."-01",
			'fin'=>$fi,
			'actualidad'=>$actual_p[$cont],
			]);
			
			$cont=$cont+1;
		}
	}

	//agregar cargos nuevos a work experience existentes
	if($request->get('position_ne')){

		$id_ex=$request->get('id_ex');
		$position_ne=$request->get('position_ne');
		$description_p_ne=$request->get('description_p_ne');
		$inicio_p_ne=$request->get('inicio_p_ne');
		$fin_p_ne=$request->get('fin_p_ne');
		$actual_p_ne=$request->get('actual_p_ne');
	
	
		$cont6 = 0;
		$post_ne= count($position_ne);
		
		
		while ($cont6 < $post_ne){
			
			if($fin_p_ne[$cont6]){
				$fi_ne = $fin_p_ne[$cont6]."-01";
			}else{
				$fi_ne = NULL;
			};
			
				$posi_ne = new Position([
					'work_experience_id' => $id_ex[$cont6],
					'position_name'=>$position_ne[$cont6],
					'description'=>$description_p_ne[$cont6],
					'inicio'=>$inicio_p_ne[$cont6]."-01",
					'fin'=>$fi_ne,
					'actualidad'=>$actual_p_ne[$cont6],
				]);
				$posi_ne->save();	
			
			$cont6=$cont6+1;
		}
	}
	
	
		
	//array habilidades existentes
	
	if($request->get('id_habilidad')){
			
		$id_ha=$request->get('id_habilidad');
		$skill_id=$request->get('skill_id');
		$medida=$request->get('medida');
		
		$conta = 0;
		$habl= count($skill_id);
		
		if($habl > 0){
		
			while ($conta < $habl){


			$habild = Habilidad::where('id', $id_ha)->first(); 
			
			$habild->update([
				'skill_id'=>$skill_id[$conta],
				'medida'=>$medida[$conta],			
			]);
		
	
			$conta=$conta+1;
			}
			
		}
	}	
	
	//array habilidades Nuevas
	
	if($request->get('skill_id_n')){
			
		$skill_id_n=$request->get('skill_id_n');
		$medida_n=$request->get('medida_n');
		
		$conta_n = 0;
		$habl_n= count($skill_id_n);
		
		if($habl_n > 0){
		
			while ($conta_n < $habl_n){


			$habild_n = new Habilidad([
				'resume_id' => $id,
				'skill_id'=>$skill_id_n[$conta_n],
				'medida'=>$medida_n[$conta_n],
			]);
			$habild_n->save();	

	
			$conta_n=$conta_n+1;
			}
			
		}
	}
	
		
	
	//array idiomas existentes
	
	if($request->get('id_idioma')){
			
		$id_idioma=$request->get('id_idioma');
		$language_id=$request->get('language_id');
		$level=$request->get('level');
		
		$conta_d = 0;
		$lan_d= count($language_id);
		
		if($lan_d > 0){
		
			while ($conta_d < $lan_d){

			$id_e = Idioma::where('id', $id_idioma)->first(); 
			
			$id_e->update([
				'language_id'=>$language_id[$conta_d],
				'level'=>$level[$conta_d],			
			]);
		
			$conta_d=$conta_d+1;
			}
			
		}
	}	
	
	//array idiomas Nuevos
	if($request->get('language_id_n')){
		
		$language_id_n=$request->get('language_id_n');
		$level_n=$request->get('level_n');
		
		$cont_in = 0;
		$idio_in= count($language_id_n);

		if($idio_in > 0){
			while ($cont_in < $idio_in){
		      
				$id_nv = new Idioma([
				'language_id'=>$language_id_n[$cont_in],
				'resume_id'=> $id,
				'level'=>$level_n[$cont_in],
				]);
				
				$id_nv->save();	
					
				$cont_in=$cont_in+1;
			}
		}
	}	
		
	//array referencias nuevas
	if($request->get('nombre_ref_n')){	
		$nombre_ref_n=$request->get('nombre_ref_n');
		$telefono_ref_n=$request->get('telefono_ref_n');
		
		$contr = 0;
		$ref_n= count($nombre_ref_n);

		if($ref_n > 0){
			while ($contr < $ref_n){
				
				$refe_n = new Reference([
					'nombre'=>$nombre_ref_n[$contr],
					'resume_id'=> $id,
					'telefono'=>$telefono_ref_n[$contr],	
				]);
				
				$refe_n->save();	

				$contr=$contr+1;
			}
		}
	}
	
	//array referencias existentes
	if($request->get('nombre_ref')){	
	
		$id_ref=$request->get('id_ref');
		$nombre_ref=$request->get('nombre_ref');
		$telefono_ref=$request->get('telefono_ref');
		
		$contre = 0;
		$refe= count($nombre_ref);

		if($refe > 0){
			while ($contre < $refe){
				
				$ref_ex = Reference::where('id', $id_ref)->first(); 
			
				$ref_ex->update([
					'nombre'=>$nombre_ref[$contre],
					'telefono'=>$telefono_ref[$contre],			
				]);
		
				$contre=$contre+1;
			}
		}
	}
	
	
	

	   return redirect('resumes')->with('success', 'Su resumen curricular fue modificado exitosamente');
    }
	

    /**
     * Display the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$personalInformation = PersonalInformation::where('id', $id)->first();
		$resume = Resume::where('personal_information_id', $id)->first();
		$id_res = $resume->id;
		echo $id_res;
		

		$id_form = $resume->formation_id;
		$formation = Formation::where('id', $id_form)->first();
		$work_exp = WorkExperience::where('resume_id', $id_res)->get();
		$work_exp_ids = WorkExperience::select('id')->where('resume_id', $id_res)->get();
		$ids=array();

		foreach ($work_exp_ids as $idw){
			$id_we = $idw->id;
			$posit = Position::whereIn('work_experience_id', array($id_we))->get();
			array_push($ids, $posit);
		}
		
		$position=$ids;
		
		
		
		//return view('resumes.show', compact('personalInformation','formation','work_exp','position'));
    
	
	
	
	
	 //$pdf = PDF::loadView('resumes.curricular', compact('personalInformation','formation','work_exp','position'));
     //return $pdf->download('resumes.pdf');
	}
	
	public function PDFgenerate($id)
    {
		
		
		$personalInformation = PersonalInformation::where('id', $id)->first();
		$id_user = $personalInformation->user_id;
		
		$user = User::where('id', $id_user)->first();

		$resume = Resume::where('personal_information_id', $id)->first(); // el campo personal_information_id debe ser unico en la tabla resumes

			
			
		if (empty($resume)) 
		{
			//echo 'Aun no carga curriculum: ';die;
			return redirect()->back()->with('creeCurri', 'Aun no he cargado el Curriculum');
		}
		else{
		$id_res = $resume->id;
		
		$id_form = $resume->formation_id;

		$formations = Formation::where('resume_id', $id_res)->get(); 
		
		$idiomas = Idioma::where('resume_id', $id_res)->get(); 
		
		$referencias = Reference::where('resume_id', $id_res)->get(); 
			
		$work_exp = WorkExperience::where('resume_id', $id_res)->get();
		
		$work_exp_ids = WorkExperience::select('id')->where('resume_id', $id_res)->get();
		
		$ids=array();
		foreach ($work_exp_ids as $idw){
			$id_we = $idw->id;
			$posit = Position::whereIn('work_experience_id', array($id_we))->get();
			array_push($ids, $posit);
		}
		
    $position=$ids;
    //https://stackoverflow.com/questions/21591384/how-do-i-get-all-of-the-results-from-a-hasmany-relationship-in-laravel



    $resume_habilidades = Resume::with('habilidades')->where('id', '=', $id_res)->get();  //trae un registro de la tabla resume (MAS +) los asociados en la tabla habilidades, este debe de ir de primero

	$habs_persona = $resume_habilidades->first()->habilidades;  //trae los datos ASOCIADOS a la tabla resume  //diria mejr q trae los datos de la tabla habilidades asociados a la tabla resumes
	//$segundo = $resume_habilidades->get(1)->habilidades;  //trae los registros en la segunda posicion
	//echo $habs_persona;die;
	

		
	
	/*$pdf = PDF::loadView('resumes.curricular', compact('personalInformation','formations','work_exp','position', 'user', 'habs_persona', 'idiomas'));
	//$pdf->setPaper('A4', 'landscape');
    return $pdf->download('resumes.pdf');
	*/


		//return view('resumes.show', compact('personalInformation','formations','work_exp','position', 'user', 'habs_persona', 'idiomas', 'referencias'));
		return view('resumes.n-show', compact('personalInformation','formations','work_exp','position', 'user', 'habs_persona', 'idiomas', 'referencias'));
	}
	

	
	
	}

	
	public function pdf()
    {
		return view('resumes.curricular');
    }



	public function getHabilidad(Request $request){

     $skill = Skill::all();
		$output ='<option value="0">Seleccione</option>';
      foreach($skill as $row)
      {  
		$output .='<option value="'.$row["id"].'">'.$row["habilidad"].'</option>';
		//echo $output;
	 }

      return $output;
   
   }
   
   
	public function getIdioma(Request $request){

     $idiom = Language::all();
		$output ='<option value="0">Seleccione</option>';
      foreach($idiom as $row)
      {  
		$output .='<option value="'.$row["id"].'">'.$row["name_language"].'</option>';
		//echo $output;
	 }

      return $output;
   
   }
   

   // public function destroy(Resume $resume)
    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
		Resume::destroy($id);	
		 return redirect('resumes');
    }
}
