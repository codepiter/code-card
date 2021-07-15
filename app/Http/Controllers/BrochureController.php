<?php

namespace App\Http\Controllers;

use App\Brochure;
use App\BrochureImage;
use App\PersonalInformation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Codedge\Fpdf\Fpdf\Fpdf;

use App\PDF_TextBox;
use App\PDF_WriteTag;

use Auth;
use Image;


class BrochureController extends Controller
{
	
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
   // private $fpdf;
 

    public function createPDF($id)
    {

		$brochures = Brochure::where('personal_information_id', $id)->first();

		if($brochures){
		$titlea = $brochures->titlea;
		$msj_inicial = $brochures->msj_inicial;
		$titleb = $brochures->titleb;
		$msj_ppal = $brochures->msj_ppal;
		$titlec = $brochures->titlec;
		$inf_empresa = $brochures->inf_empresa;
		$titled = $brochures->titled;
		$pts_fuerts = $brochures->pts_fuerts;

		$beneficios = $brochures->beneficios;
		$adq_serv_prod = $brochures->adq_serv_prod;

		
		/*imagenes*/
	    $src_bgpdf1 = $brochures->brochureImage->src_bgpdf1;
		$src_msj_inicial = $brochures->brochureImage->src_msj_inicial; 
		$src_msj_ppal = $brochures->brochureImage->src_msj_ppal;
       /**/
		//$src_bgpdf2 = $brochures->brochureImage->src_bgpdf2;
		$src_bgpdf2 = $brochures->brochureImage->src_bgpdf2;
		$src_inf_empresa = $brochures->brochureImage->src_inf_empresa;
		$src_pts_fuerts = $brochures->brochureImage->src_pts_fuerts;
		$src_beneficios = $brochures->brochureImage->src_beneficios;

		/*Background Pag 1*/
		if($src_bgpdf1){
			$rc_bgpdf1 =storage_path('app\public\/'.$src_bgpdf1);
		}else{
			$rc_bgpdf1 = "";
		}
		/*Imagen Superior abarca 2 Columnas*/
		if($src_msj_inicial){
			$rc_msj_inicial =storage_path('app\public\/'.$src_msj_inicial);
		}else{
			$rc_msj_inicial = "";
		}
		/*Imagen de la tercera Columna I Pagina*/
		if($src_msj_ppal){
			$rc_msj_ppal =storage_path('app\public\/'.$src_msj_ppal);
		}else{
			$rc_msj_ppal = "";
		}

/*******************************************************************************/
       
	    if($src_bgpdf2){
			$rc_bgpdf2 =storage_path('app\public\/'.$src_bgpdf2);
		}else{
			$rc_bgpdf2 = "";
		}
		
		if($src_inf_empresa){
			$rc_inf_empresa =storage_path('app\public\/'.$src_inf_empresa);
		}else{
			$rc_inf_empresa = "";
		}
		if($src_pts_fuerts){
			$rc_pts_fuerts =storage_path('app\public\/'.$src_pts_fuerts);
		}else{
			$rc_pts_fuerts = "";
		}
		if($src_beneficios){
			$rc_beneficios =storage_path('app\public\/'.$src_beneficios);
		}else{
			$rc_beneficios = "";
		}
		
/*******************************************************************************/
		$pdf=new PDF_WriteTag('L','mm','A4');
		//$pdf->SetMargins(1,1,25);
		$pdf->SetAutoPageBreak(true,1);
		//$pdf->SetFont('courier','',12);

		$pdf->AddFont('DolatoStatoFont', '', 'DolatoStatoFont.php');
		$pdf->AddPage();
      //  $pdf->SetFont('DolatoStatoFont','',36);
/******* Imagenes en el papel 1 **************************************************************************************/
		if(file_exists($rc_bgpdf1)){
		$pdf->Image("$rc_bgpdf1",0,0,   297, 210);
	   }

	   if(file_exists($rc_msj_inicial)){
		$pdf->Image("$rc_msj_inicial",0,0,   198, 65);
	   }/**/
	   
	    if(file_exists($rc_msj_ppal)){
		$pdf->Image("$rc_msj_ppal",198,0,   99, 210);
	   }
/******* Fin  de imagenes en el papel 1******************************************************************************/
		// Stylesheet

		$pdf->SetStyle("bruW","DolatoStatoFont","",16,"255,255,255",6); //Manupular el movimiento vertical del titulo
		$pdf->SetStyle("bruB","DolatoStatoFont","",16,"0,0,0",6); //Manupular el movimiento vertical del titulo
		//$pdf->SetStyle("p","courier","",12,"10,100,250",15);
		$pdf->SetStyle("h1W","times","N",12,"255,255,255",0);
		$pdf->SetStyle("h1B","times","N",12,"0,0,0",0);

		$pdf->SetStyle("h2","times","",7,"102,0,102",0);
		$pdf->SetStyle("a","times","BU",9,"0,0,255");
		$pdf->SetStyle("pers","times","I",0,"255,0,0");
		$pdf->SetStyle("place","arial","U",0,"153,0,0");
		$pdf->SetStyle("vb","times","B",0,"102,153,153");


		$pdf->SetLeftMargin(7);        // Movimiento horizontal de todo el cuadro de derecha a izquierda.
		//$pdf->Ln(60);
		$pdf->SetXY(7, 75);

		$title1="<bruW>$titlea</bruW>";
		$txt2="<h1W>$msj_inicial</h1W>";

		/*1*/

		$pdf->SetLineWidth(1); //grosor del cuadro
		$pdf->SetFillColor(52,52,52); //color del fondo
		$pdf->SetDrawColor(0,0,0); //color del cuadro el marco
		$pdf->WriteTag(85,5,                utf8_decode("$title1 $txt2"),1,"J",1,'10,7,5,10');    // $pdf->WriteTag(85,4.5,$txt,1,"J",1,20); o el valor 20 de este comentario representa el padding, los 4 lados pero segun la documentacion pudiera ser una cadena de la forma "izquierda, arriba, abajo, derecha" con 2, 3 o 4 valores especificados (valor predeterminado: 0)

/*******2*/
        // $space = 14;
		// $pdf->Ln(59);
		
		$title2="<bruW>$titleb</bruW>";
		$txt4="<h1W>$msj_ppal</h1W>";



		$pdf->SetLeftMargin(17);
		$pdf->SetLineWidth(1); //grosor del cuadro
		$pdf->SetFillColor(52,52,52);
		$pdf->SetDrawColor(0,0,0); //color del cuadro el marco
		
		
//$pdf->SetLeftMargin(1);
$pdf->SetXY(7, 140);
		
		
		$pdf->WriteTag(85,5,               utf8_decode("$title2 $txt4"),1,"J",1,'10,7,5,10');
		/**/

/*******3*/

		$title3="<bruB>$titlec</bruB>";
		$txt6="<h1B>$inf_empresa</h1B>";
		//$pdf->Ln(-114);
		$pdf->SetLeftMargin(106);
		$pdf->SetLineWidth(1);  //grosor del cuadro
		$pdf->SetFillColor(52,52,52);
		$pdf->SetDrawColor(0,0,0); //color del cuadro el marco
$pdf->SetXY(107, 75);
		$pdf->WriteTag(85,5,        utf8_decode("$title3 $txt6")              ,1,"J",0,'10,7,5,10');
		
		/**/
		
/*******4*/

		$title4="<bruB>$titled</bruB>";
		$txt7="<h1B>$pts_fuerts</h1B>";
		//$pdf->Ln(15);
		$pdf->SetLeftMargin(106);
		$pdf->SetLineWidth(1); //grosor del cuadro
		$pdf->SetFillColor(52,52,52);
		$pdf->SetDrawColor(0,0,0); //color del cuadro el marco
$pdf->SetXY(107, 140);
		$pdf->WriteTag(85,5,        utf8_decode("$title4 $txt7")              ,1,"J",0,'10,7,5,10');

/******* Imagenes en el papel 2**********************************************************************************************/
        $pdf->AddPage();
		
		
		
		if(file_exists($rc_bgpdf2)){
		$pdf->Image("$rc_bgpdf2",0,0,   297, 210);
	   }
		
		
		

       /*Primera Columna*/
	   if(file_exists($rc_inf_empresa)){
		$pdf->Image("$rc_inf_empresa",0,0,   99, 210);
	   }
       /*Segunda Columna*/
	   if(file_exists($rc_pts_fuerts)){
		$pdf->Image("$rc_pts_fuerts",99,0,   99, 210);
	   }
	   /*Tercera Columna*/
	    if(file_exists($rc_beneficios)){
		$pdf->Image("$rc_beneficios",198,0,   99, 210);
	   }/**/

/******* Fin  de imagenes en el papel 2**************************************************************************************/
		$pdf->Output();
		 exit;
		}else{
			//echo "Brochure Sin Cargar";
			return redirect()->back()->with('creeBrochure', 'Aun no he cargado el Brochure');
		}


    }

















   public function index()
    {
		 $id = auth()->id();
		 $personalInformation = PersonalInformation::where('user_id', $id)->first(); 
		 if($personalInformation){
				 $brochures = Brochure::latest()->paginate(5);

			$personalInformation = PersonalInformation::where('user_id', $id)->first(); 
			$pers_id=$personalInformation->id;
				 if($personalInformation){
					$broch= Brochure::where('personal_information_id', $pers_id)->first();
				 if(isset($broch)){
							 $id_a = "1";
						 }else{
							$id_a = "0"; //no definido
						 }
				 }
				return view('brochures.index',compact('brochures', 'id_a'))
					->with('i', (request()->input('page', 1) - 1) * 5);
		}else{
			 return redirect()->route('personalInformation.create')->with('messageresu', 'Ud.no tiene un perfil creado por ello no puede acceder a la carga de su Brochures');
		 }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brochures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/****************************************************************************************************************/
        if ($request->file('src_msj_inicial')== null) {
				 $src_msj_inicial="";
				}else{
						$a = Image::make($request->file('src_msj_inicial')->getRealPath());
						$a->orientate();
						$a->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name1 = "msj_inicial" . time() . "." . $request->file('src_msj_inicial')->extension();
						$a->save(storage_path('/app/public/uploads/' . $file_name1));
						$src_msj_inicial= $brochure_image['src_msj_inicial']= "uploads/".$file_name1;
				}
/****************************************************************************************************************/
		if ($request->file('src_msj_ppal')== null) {
				 $src_msj_ppal="";
				}else{
						$b = Image::make($request->file('src_msj_ppal')->getRealPath());
						$b->orientate();
						$b->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name2 = "msj_ppal" . time() . "." . $request->file('src_msj_ppal')->extension();
						$b->save(storage_path('/app/public/uploads/' . $file_name2));
						$src_msj_ppal= $brochure_image['src_msj_ppal']= "uploads/".$file_name2;
				}
/****************************************************************************************************************/
		if ($request->file('src_inf_empresa')== null) {
				 $src_inf_empresa="";
				}else{
						$c = Image::make($request->file('src_inf_empresa')->getRealPath());
						$c->orientate();
						$c->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name3 = "inf_empresa" . time() . "." . $request->file('src_inf_empresa')->extension();
						$c->save(storage_path('/app/public/uploads/' . $file_name3));
						$src_inf_empresa= $brochure_image['src_inf_empresa']= "uploads/".$file_name3;
				}
/****************************************************************************************************************/
		if ($request->file('src_pts_fuerts')== null) {
				 $src_pts_fuerts="";
				}else{
						$d = Image::make($request->file('src_pts_fuerts')->getRealPath());
						$d->orientate();
						$d->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name4 = "pts_fuerts" . time() . "." . $request->file('src_pts_fuerts')->extension();
						$d->save(storage_path('/app/public/uploads/' . $file_name4));
						$src_pts_fuerts= $brochure_image['src_pts_fuerts']= "uploads/".$file_name4;
				}
/****************************************************************************************************************/
		if ($request->file('src_beneficios')== null) {
				 $src_beneficios="";
				}else{
						$e = Image::make($request->file('src_beneficios')->getRealPath());
						$e->orientate();
						$e->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name5 = "beneficios" . time() . "." . $request->file('src_beneficios')->extension();
						$e->save(storage_path('/app/public/uploads/' . $file_name5));
						$src_beneficios= $brochure_image['src_beneficios']= "uploads/".$file_name5;
				}
/****************************************************************************************************************/
		if ($request->file('src_adq_serv_prod')== null) {
				 $src_adq_serv_prod="";
				}else{
						$f = Image::make($request->file('src_adq_serv_prod')->getRealPath());
						$f->orientate();
						$f->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

					$file_name6 = "adq_serv_prod" . time() . "." . $request->file('src_adq_serv_prod')->extension();
						$f->save(storage_path('/app/public/uploads/' . $file_name6));
						$src_adq_serv_prod= $brochure_image['src_adq_serv_prod']= "uploads/".$file_name6;
				}
/****************************************************************************************************************/
		if ($request->file('src_serv_adic')== null) {
				 $src_serv_adic="";
				}else{
						$g = Image::make($request->file('src_serv_adic')->getRealPath());
						$g->orientate();
						$g->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name7 = "serv_adic" . time() . "." . $request->file('src_serv_adic')->extension();
						$g->save(storage_path('/app/public/uploads/' . $file_name7));
						$src_serv_adic= $brochure_image['src_serv_adic']= "uploads/".$file_name7;
				}
/****************************************************************************************************************/
		if ($request->file('src_sociales')== null) {
				 $src_sociales="";
				}else{
						$h = Image::make($request->file('src_sociales')->getRealPath());
						$h->orientate();
						$h->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name8 = "sociales" . time() . "." . $request->file('src_sociales')->extension();
						$h->save(storage_path('/app/public/uploads/' . $file_name8));
						$src_sociales= $brochure_image['src_sociales']= "uploads/".$file_name8;
				}
/****************************************************************************************************************/
		if ($request->file('src_contacto')== null) {
				 $src_contacto="";
				}else{
						$i = Image::make($request->file('src_contacto')->getRealPath());
						$i->orientate();
						$i->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name9 = "contacto" . time() . "." . $request->file('src_contacto')->extension();
						$i->save(storage_path('/app/public/uploads/' . $file_name9));
						$src_contacto= $brochure_image['src_contacto']= "uploads/".$file_name9;
				}
/****************************************************************************************************************/
		if ($request->file('src_backgroundpc')== null) {
				 $src_backgroundpc="";
				}else{
						$j = Image::make($request->file('src_backgroundpc')->getRealPath());
						$j->orientate();
						$j->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

					$file_name10 = "backgroundpc" . time() . "." . $request->file('src_backgroundpc')->extension();
						$j->save(storage_path('/app/public/uploads/' . $file_name10));
						$src_backgroundpc= $brochure_image['src_backgroundpc']= "uploads/".$file_name10;
				}
/****************************************************************************************************************/
				if ($request->file('src_backgroundpho')== null) {
				 $src_backgroundpho="";
				}else{
						$k = Image::make($request->file('src_backgroundpho')->getRealPath());
						$k->orientate();
						$k->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name11 = "backgroundpho" . time() . "." . $request->file('src_backgroundpho')->extension();
						$k->save(storage_path('/app/public/uploads/' . $file_name11));
						$src_backgroundpho= $brochure_image['src_backgroundpho']= "uploads/".$file_name11;
				}
/****************************************************************************************************************/
if ($request->file('src_bgpdf1')== null) {
				 $src_bgpdf1="";
				}else{
						$l = Image::make($request->file('src_bgpdf1')->getRealPath());
						$l->orientate();
						$l->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name12 = "bgpdf1" . time() . "." . $request->file('src_bgpdf1')->extension();
						$l->save(storage_path('/app/public/uploads/' . $file_name12));
						$src_bgpdf1= $brochure_image['src_bgpdf1']= "uploads/".$file_name12;
				}
/****************************************************************************************************************/
if ($request->file('src_bgpdf2')== null) {
				 $src_bgpdf2="";
				}else{
						$m = Image::make($request->file('src_bgpdf2')->getRealPath());
						$m->orientate();
						$m->resize(null, 700, function($constraint) {
							 $constraint->aspectRatio();
							 $constraint->upsize();
						});

						$file_name13 = "bgpdf2" . time() . "." . $request->file('src_bgpdf2')->extension();
						$m->save(storage_path('/app/public/uploads/' . $file_name13));
						$src_bgpdf2= $brochure_image['src_bgpdf2']= "uploads/".$file_name13;
				}
/****************************************************************************************************************/

		$brochure = Brochure::create([

		    'personal_information_id' => Auth::user()->personalInformation->id,
            'titlea' => $request->get('titlea'),
		    'msj_inicial' => $request->get('msj_inicial'),
            'titleb' => $request->get('titleb'),
			'msj_ppal' => $request->get('msj_ppal'),
            'titlec' => $request->get('titlec'),
			'inf_empresa' => $request->get('inf_empresa'),
            'titled' => $request->get('titled'),
			'pts_fuerts' => $request->get('pts_fuerts'),
            'beneficios' => $request->get('beneficios'),
            'adq_serv_prod' => $request->get('adq_serv_prod')
            // 'serv_adic' => $request->get('serv_adic'),
            // 'sociales' => $request->get('sociales'),
            // 'contacto' => $request->get('contacto'),
            // 'template' => $request->get('template')
        ]);

		$brochure->brochureImage()->create([
		  
		
		    'src_msj_inicial'=> $src_msj_inicial,
			'src_msj_ppal'=> $src_msj_ppal,
			'src_inf_empresa'=> $src_inf_empresa,
			'src_pts_fuerts'=> $src_pts_fuerts,
			'src_beneficios'=> $src_beneficios,
			'src_adq_serv_prod'=> $src_adq_serv_prod,
			// 'src_serv_adic'=> $src_serv_adic,
			// 'src_sociales'=> $src_sociales,
			// 'src_contacto'=> $src_contacto,
			// 'src_backgroundpc'=> $src_backgroundpc,
			// 'src_backgroundpho'=> $src_backgroundpho,
			'src_bgpdf1'=> $src_bgpdf1,
			'src_bgpdf2'=> $src_bgpdf2,

		]);
         return redirect('/brochures')->with('success', 'Su registro se ha realizado Satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brochure  $brochure
     * @return \Illuminate\Http\Response
     */
    public function show(Brochure $brochure)
    {
        return view ('brochures.show', compact('brochure')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brochure  $brochure
     * @return \Illuminate\Http\Response
     */
    public function edit(Brochure $brochure)
    {
        return view('brochures.edit',compact('brochure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brochure  $brochure
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Brochure $brochure)
	 public function update(Request $request, $id)
    {
        $request->validate([
       // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
		'src_msj_inicial'=>'image',
		'src_msj_ppal'=>'image',
		'src_inf_empresa'=>'image',
		'src_pts_fuerts'=>'image',
		'src_beneficios'=>'image',
		'src_adq_serv_prod'=>'image',
		// 'src_serv_adic'=>'image',
		// 'src_sociales'=>'image',
		// 'src_contacto'=>'image',
		// 'src_backgroundpc'=>'image',
		// 'src_backgroundpho'=>'image',
		'src_bgpdf1'=>'image',
		'src_bgpdf2'=>'image'
		]);
		
	$datos = request()->except(['_token','_method',
								'src_msj_inicial',
								'src_msj_ppal',
								'src_inf_empresa',
								'src_pts_fuerts',
								'src_beneficios',
								'src_adq_serv_prod',
								// 'src_serv_adic',
								// 'src_sociales',
								// 'src_contacto',
								// 'src_backgroundpc',
								// 'src_backgroundpho',
								'src_bgpdf1',
								'src_bgpdf2'
								]);
								
	$datosImage = request()->except(['_token', '_method',
										'personal_information_id',
										'titlea',
										'msj_inicial',
										'titleb',
										'msj_ppal',
										'titlec',
										'inf_empresa',
										'titled',
										'pts_fuerts',
										'beneficios',
										'adq_serv_prod',
										'serv_adic',
										'sociales',
										'contacto',
										'template'
	]);
/******************************************************************************************************************/
if($request->hasFile('src_msj_inicial')){
		$brochureImage = Brochure::find($id);
		
	
		
		// $carDetail = Car::where('id', $id)
		Storage::delete('public/'.$brochureImage->brochureImage->src_msj_inicial);
		
		
		
		$foto = Image::make($request->file('src_msj_inicial')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name1 = "msj_inicial" . time() . "." . $request->file('src_msj_inicial')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name1));
		$src_msj_inicial= $datosImage['src_msj_inicial']= "uploads/".$file_name1;
		$datosImage['src_msj_inicial']= "uploads/".$file_name1;
	}
/******************************************************************************************************************/
if($request->hasFile('src_msj_ppal')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_msj_ppal);
		
		$foto = Image::make($request->file('src_msj_ppal')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name2 = "msj_ppal" . time() . "." . $request->file('src_msj_ppal')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name2));
		$src_msj_ppal= $datosImage['src_msj_ppal']= "uploads/".$file_name2;
		$datosImage['src_msj_ppal']= "uploads/".$file_name2;
	}
/******************************************************************************************************************/
if($request->hasFile('src_inf_empresa')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_inf_empresa);
		
		$foto = Image::make($request->file('src_inf_empresa')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name3 = "inf_empresa" . time() . "." . $request->file('src_inf_empresa')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name3));
		$src_inf_empresa= $datosImage['src_inf_empresa']= "uploads/".$file_name3;
		$datosImage['src_inf_empresa']= "uploads/".$file_name3;
	}

/******************************************************************************************************************/
if($request->hasFile('src_pts_fuerts')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_pts_fuerts);
		
		$foto = Image::make($request->file('src_pts_fuerts')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name4 = "pts_fuerts" . time() . "." . $request->file('src_pts_fuerts')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name4));
		$src_pts_fuerts= $datosImage['src_pts_fuerts']= "uploads/".$file_name4;
		$datosImage['src_pts_fuerts']= "uploads/".$file_name4;
	}
/******************************************************************************************************************/
if($request->hasFile('src_beneficios')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_beneficios);
		
		$foto = Image::make($request->file('src_beneficios')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name5 = "beneficios" . time() . "." . $request->file('src_beneficios')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name5));
		$src_beneficios= $datosImage['src_beneficios']= "uploads/".$file_name5;
		$datosImage['src_beneficios']= "uploads/".$file_name5;
	}
/******************************************************************************************************************/
if($request->hasFile('src_adq_serv_prod')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_adq_serv_prod);
		
		$foto = Image::make($request->file('src_adq_serv_prod')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name6 = "adq_serv_prod" . time() . "." . $request->file('src_adq_serv_prod')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name6));
		$src_adq_serv_prod= $datosImage['src_adq_serv_prod']= "uploads/".$file_name6;
		$datosImage['src_adq_serv_prod']= "uploads/".$file_name6;
	}
/******************************************************************************************************************/
if($request->hasFile('src_serv_adic')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_serv_adic);
		
		$foto = Image::make($request->file('src_serv_adic')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name7 = "adq_serv_prod" . time() . "." . $request->file('src_serv_adic')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name7));
		$src_serv_adic= $datosImage['src_serv_adic']= "uploads/".$file_name7;
		$datosImage['src_serv_adic']= "uploads/".$file_name7;
	}
/******************************************************************************************************************/
if($request->hasFile('src_sociales')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_sociales);
		
		$foto = Image::make($request->file('src_sociales')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name8 = "sociales" . time() . "." . $request->file('src_sociales')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name8));
		$src_sociales= $datosImage['src_sociales']= "uploads/".$file_name8;
		$datosImage['src_sociales']= "uploads/".$file_name8;
	}
/******************************************************************************************************************/
if($request->hasFile('src_contacto')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_contacto);
		
		$foto = Image::make($request->file('src_contacto')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name9 = "contacto" . time() . "." . $request->file('src_contacto')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name9));
		$src_contacto= $datosImage['src_contacto']= "uploads/".$file_name9;
		$datosImage['src_contacto']= "uploads/".$file_name9;
	}
/******************************************************************************************************************/
if($request->hasFile('src_backgroundpc')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_backgroundpc);
		
		$foto = Image::make($request->file('src_backgroundpc')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name10 = "backgroundpc" . time() . "." . $request->file('src_backgroundpc')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name10));
		$src_backgroundpc= $datosImage['src_backgroundpc']= "uploads/".$file_name10;
		$datosImage['src_backgroundpc']= "uploads/".$file_name10;
	}
/******************************************************************************************************************/
if($request->hasFile('src_backgroundpho')){
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_backgroundpho);
		
		$foto = Image::make($request->file('src_backgroundpho')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name11 = "backgroundpho" . time() . "." . $request->file('src_backgroundpho')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name11));
		$src_backgroundpho= $datosImage['src_backgroundpho']= "uploads/".$file_name11;
		$datosImage['src_backgroundpho']= "uploads/".$file_name11;
	}
/******************************************************************************************************************/
if($request->hasFile('src_bgpdf1')){ 
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_bgpdf1);
		
		$foto = Image::make($request->file('src_bgpdf1')->getRealPath());
		$foto->orientate();
		/*$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});*/
		
		$file_name12 = "bgpdf1" . time() . "." . $request->file('src_bgpdf1')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name12));
		$src_bgpdf1= $datosImage['src_bgpdf1']= "uploads/".$file_name12;
		$datosImage['src_bgpdf1']= "uploads/".$file_name12;
	}
/******************************************************************************************************************/
if($request->hasFile('src_bgpdf2')){ 
		$brochure = Brochure::findOrFail($id);
		Storage::delete('public/'.$brochure->src_bgpdf2);
		
		$foto = Image::make($request->file('src_bgpdf2')->getRealPath());
		$foto->orientate();
		$foto->resize(null, 700, function($constraint) {
			 $constraint->aspectRatio();
			 $constraint->upsize();
		});
		
		$file_name13 = "bgpdf2" . time() . "." . $request->file('src_bgpdf2')->extension();

		$foto->save(storage_path('/app/public/uploads/' . $file_name13));
		$src_bgpdf2= $datosImage['src_bgpdf2']= "uploads/".$file_name13;
		$datosImage['src_bgpdf2']= "uploads/".$file_name13;
	}
/******************************************************************************************************************/


	Brochure::where('id','=',$id)->update($datos);
	BrochureImage::where('brochure_id','=',$id)->update($datosImage);
	
		
		
	$brochure = Brochure::findOrFail($id);
    return redirect('brochures')->with('success', 'Brochure Modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brochure  $brochure
     * @return \Illuminate\Http\Response
     */
   // public function destroy(Brochure $brochure)
    public function destroy($id)
    {
        $brochure = Brochure::findOrFail($id);
		Brochure::destroy($id);	
		 return redirect('brochures');
    }


	

}
