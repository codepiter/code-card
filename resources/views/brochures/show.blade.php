@extends('limpio')

@section('scripts')
	<link rel="stylesheet" href="{{ asset('css/afi/bootstrap.min.css') }}" />


  <script src="{{ asset('js/minimax/jquery.min.js') }}"></script>
  <script src="{{ asset('js/afi/popper.min.js') }}"></script>
  <script src="{{ asset('js/afi/bootstrap.min.js') }}"></script>
  

  <script src="{{ asset('js/printpdf/jspdf.min.js') }}"></script>
  <script src="{{ asset('js/printpdf/html2canvas.js') }}"></script>

  
  
  <script>
  function print() {
		const filename  = 'ThisIsYourPDFFilename.pdf';

		html2canvas(document.querySelector('#nodeToRenderAsPDF')).then(canvas => {
			
			/**let pdf = new jsPDF('p', 'mm', 'a4');
			pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
			pdf.save(filename);
			
			
			
var imgWidth = 210; 
var pageHeight = 295;  
var imgHeight = canvas.height * imgWidth / canvas.width;
var heightLeft = imgHeight;
var doc = new jsPDF('p', 'mm');
var position = 0;
doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;
while (heightLeft >= 0) {
     position = heightLeft - imgHeight;
     doc.addPage();
     doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
     heightLeft -= pageHeight;
}
doc.save( 'file.pdf');*/



		
		
		
		});
	}

// Variant
// This one lets you improve the PDF sharpness by scaling up the HTML node tree to render as an image before getting pasted on the PDF.
function print(quality = 1) {
		const filename  = 'ThisIsYourPDFFilename.pdf';

		html2canvas(document.querySelector('#nodeToRenderAsPDF'), 
								{scale: quality}
						 ).then(canvas => {
							 
		var imgData = canvas.toDataURL ('image / png');
			/**let pdf = new jsPDF('p', 'mm', 'a4');
			pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, 211, 298);
			pdf.save(filename);*/
			
var imgWidth = 210; 
var pageHeight = 295;  
var imgHeight = canvas.height * imgWidth / canvas.width;
var heightLeft = imgHeight;
var pdf = new jsPDF('p', 'mm');
var position = 0;

pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;

while (heightLeft >= 0) {
     position = heightLeft - imgHeight;
     pdf.addPage();
     pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
     heightLeft -= pageHeight;
}
pdf.save( 'filename');
		
		
		});
	}
  </script>
@stop
@section('main')




<div class="container-fluid border" style="background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)),url('{{ asset('storage'). '/'.$brochure->brochureImage->src_backgroundpc}}');">




<!---------------------------------------------------------------------------------------------------------------------------->
	<div class="row" style="margin-top: 90px;" >
		 

		 
		 
		 
		 @if($brochure->msj_inicial)
			 <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >	
			
			 <p style="margin-top: 25%; margin-bottom: 25%; padding: inherit;">{{ $brochure->msj_inicial }}	</p>
			 </div>
		 @endif
		 
	  @if($brochure->brochureImage->src_msj_inicial)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="background: burlywood;">
			<div class="src_msj_inicial" style="max-width: 100%; margin-left: auto; margin-right: auto;">
					<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_msj_inicial }}" class="img-fluid" alt="Msg Inicial" style="border-radius: 100%">
			</div>
		</div>
	  @endif
    </div>

 <!---------------------------------------------------------------------------------------------------------------------------->
 	<div class="row">
	  @if($brochure->brochureImage->src_msj_ppal)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			<div class="src_msj_ppal" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			 <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_msj_ppal }}" class="img-fluid" alt="Msg Ppal" style="border-radius: 100%">
			</div>
		</div>
       @endif
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
		<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;">{{ $brochure->msj_ppal }}</p>
		</div>

    </div>
 <!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		
		
			 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6" >
				<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;"> {{ $brochure->inf_empresa }}</p>
			 </div>
		
	@if($brochure->brochureImage->src_inf_empresa)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			<div class="src_inf_empresa" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			  <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_inf_empresa }}" class="img-fluid" alt="Inf Emp." style="border-radius: 100%">
			</div>
		</div>
	@endif
		
    </div>
 <!---------------------------------------------------------------------------------------------------------------------------->
 	<div class="row">
		  @if($brochure->brochureImage->src_pts_fuerts)
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			<div class="src_pts_fuerts" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			
			 <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_pts_fuerts }}" class="img-fluid" style="border-radius: 100%">
			</div>
			</div>
         @endif
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
		<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;">{{ $brochure->pts_fuerts}}</p>
		</div>

    </div>
 <!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6  " >
		         <p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;"> {{ $brochure->beneficios}}</p>
		</div>
		
		
	@if($brochure->brochureImage->src_beneficios)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			
			<div class="src_beneficios" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			  <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_beneficios }}"  class="img-fluid" style="border-radius: 100%">
			</div>
		</div>
	@endif
		
	</div>
<!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
     @if($brochure->brochureImage->src_adq_serv_prod)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
		<div class="src_adq_serv_prod" style="max-width: 100%; margin-left: auto; margin-right: auto;">
		
		<img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_adq_serv_prod }}" class="img-fluid" style="border-radius: 100%">
		</div>
		</div>
     @endif
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
		<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;">{{ $brochure->adq_serv_prod}}</p>
		</div>
		
    </div>

<!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		
	   <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
		<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;">{{ $brochure->serv_adic}}</p>
		</div>
      

	@if($brochure->brochureImage->src_serv_adic)
	    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			<div class="src_serv_adic" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			
			 <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_serv_adic }}" class="img-fluid" style="border-radius: 100%">
			</div>
		</div>
	@endif
	</div>

<!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
     @if($brochure->brochureImage->src_sociales)
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
			
			<div class="src_sociales" style="max-width: 100%; margin-left: auto; margin-right: auto;">
			  <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_sociales }}" class="img-fluid" style="border-radius: 100%">
			</div>
			
		</div>
	@endif

		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " > 
		<p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;">{{ $brochure->sociales}}</p>
		</div>
		
	</div>

<!----------------------------------------------------------------------------------------------------------------------------->
	<div class="row">
		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 " >
		               <p style="margin-top: 25%;margin-bottom: 25%; padding: inherit;"> {{ $brochure->contacto }}</p>
		</div>
		  
		  @if($brochure->brochureImage->src_contacto)
			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
					<div class="src_contacto" style="max-width: 100%; margin-left: auto; margin-right: auto;">
					 <img src="{{ asset('storage'). '/'.$brochure->brochureImage->src_contacto }}" class="img-fluid" style="border-radius: 100%">
					</div>
			</div>
		@endif
	</div>
<!----------------------------------------------------------------------------------------------------------------------------->

<input type="button"
onclick="print(1)"
value="PDF Print" class="btn btn-success">

 <a class="btn btn-success" href="" target="_blank">Brochure A4</a>
	


</div>
@endsection
