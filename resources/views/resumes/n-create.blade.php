@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Éxito!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4 row">
      <div class="col">
        <h3>Formación</h3>
      </div>
      
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ url('/resumes') }}">Atras</a>
      </div>
    </div>


    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body">


      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
        <div class="row">
          <div class="col-lg-12 margin-tb">
    
                  <!--
                  <div class="pull-right">
                    <a class="btn btn-primary" href=""> Back</a>
                  </div>-->
                  
                </div>
              </div>
          
            @if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
          
          
            <form id="myForm" action="{{url('/resumes')}}" method="post" enctype="multipart/form-data" >
                  {{ csrf_field() }}
          
          
          <!---formation-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12"><h3><strong>Formación</strong></h3>
                      </div> 		
              </div>
              <div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
                <button type="button" name="add-form" id="add-form" class="btn btn-success">Agregar Formación</button>			
                  </div> 
                      <div class="col-md-12">
                          <strong>Instituto:</strong>
                          <input type="text"  name="instituto_name[]" class="form-control" placeholder="Instituto" required>
                      </div> 
          
          
                <div class="row" style="padding-left:15px; padding-right:15px">
                          <div class="col-md-5">
                      <strong>Culminado:</strong>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="culminado[]">
                    <option selected>Seleccione...</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>		
                  </div>
          
          
                  <div class="col-md-7">
                    <strong>Título Obtenido:</strong>
                    <input type="text"  name="titulo_obtenido[]" class="form-control" placeholder="" required>
                  <br>		
                  </div>
                      </div>
                <div class="row" style="padding-left:15px; padding-right:15px">
                  <div class="col-md-6">
                    <strong>Fecha Inicio:</strong>
                    <input type="month"  name="inicio_formation[]" class="form-control" placeholder="" required>
                  <br>		
                  </div>
                  <div class="col-md-6">
                    <strong>Fecha Fin:</strong>
                    <input type="month"  name="fin_formation[]" class="form-control" placeholder="" required>
                  <br>		
                  </div>
                      </div>
          
              </div>
            <div id="div-form"></div>
          <!---fin formation-->
          
          
          <!---work exprience/positions -->
            <div class="col-md-12 exp1">
            <br>
                <div class="col-md-12"><h3><strong>Experiencia Laboral</strong></h3>
                      </div> 		
                <div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
                <button type="button" name="add-desc" id="add-desc" class="btn btn-success">Agregar Experiencia</button>			
                      </div> 
              
                      <div class="col-md-12">
                          <strong>Empresa:</strong>
                          <input type="text"  name="company[]" class="form-control" placeholder="Empresa" required><input type="hidden" name="desc_num[]" value="0" class="form-control"/>
                <br>		
                      </div> 
                <div class="row" style="padding-left:15px; padding-right:15px">			
                  <div class="col-md-5">
                    <strong>Inicio:</strong>
                    <input type="month"  name="inicio_work[]" class="form-control" placeholder="" required>
                  <br>		
                  </div>            
                  <div class="col-md-5">
                    <strong>Fin:</strong>
                    <input type="month"  name="fin_work[]" class="form-control" placeholder="Description" required>
                      
                  </div>
                  <div class="col-md-2" style="display: flex; align-items: center;">
                    <input type="text"  name="actual_work[]" value="2" class="form-control d-none" >
                    <input class="form-check-input actual_we" type="checkbox" value="2" id="act_w" style="-webkit-appearance:checkbox;" name="actual_wor[]">
                    <label class="form-check-label" for="act_w">
                    Actualidad
                    </label>	
                  </div><br>
                      </div>
                
          
              </div>
            
            <br>
              <div class="col-md-12">	
              
              <div class="col-md-12"><h3><strong>Cargo</strong></h3>
                      </div> 		
                <div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;">
                <button type="button" name="add-cargo" id="add-cargo" class="btn btn-success">Agregar Cargo</button>			
                      </div> 
              
                      <div class="col-md-12">
                          <strong>Nombre del Cargo:</strong>
                  <input type="hidden" name="num_desc[]"   value="0" class="form-control"/>
                          <input type="text"  name="position[]" class="form-control" required>			
                <br>		
                      </div> 
                <div class="row carg1" style="padding-left:15px; padding-right:15px">			
                  <div class="col-md-5">
                    <strong>Desde:</strong>
                    <input type="month"  name="inicio_p[]" class="form-control" required>
                  <br>		
                  </div>            
                  <div class="col-md-5">
                    <strong>Hasta:</strong>
                    <input type="month"  name="fin_p[]" class="form-control" required>
                      
                  </div>
                  <div class="col-md-2" style="display: flex; align-items: center;">
                    <input type="text"  name="actual_p[]" value="2" class="form-control d-none" >
                    <input class="form-check-input actual_ca" type="checkbox"  id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]">
                    <label class="form-check-label" for="act_p">
                    Actualidad
                    </label>	
                  </div><br>
                      </div>
                <div class="col-md-12">
                          <strong>Descripción del Cargo:</strong>
                          <input type="text"  name="description_p[]" class="form-control" required>
                <br>		
                      </div> 
          
                    
                <div class="div-cargo"></div>
                    
          
          
              </div>
            <div id="div-desc"></div>
            
          
          
            <div class="col-md-12">			
              <div class="col-md-12"><h3><strong>Habilidades</strong></h3></div> 							
            </div>
            <div id="div-habil"></div>
          
            <br>
            <div class="col-md-12">			
              <div class="col-md-12"><h3><strong>Idiomas</strong></h3></div> 							
            </div>
            <div id="div-idioma"></div>	
            
            <div class="col-md-12">		
              <br>
              <div class="col-md-12"><h3><strong>Referencias Personales</strong></h3></div> 							
            </div>
            <div id="div-refer"></div>
          
          
          
          <div class="col-md-12" style="margin-top:15px; text-align:center">
              <button type="submit" class="btn btn-primary" >Enviar</button>
                
          
                
          </div>		  
                
                
            </form>
    
      </div>


    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dragula.js') }}"></script>

  <script src="{{ asset('js/tabular/tab.js') }}" ></script>


  <script>
    var tmrReady = setInterval(isPageFullyLoaded, 100);
      
    function isPageFullyLoaded() {
      if (document.readyState == "loaded" || document.readyState == "complete") {
        subclassForms();
        clearInterval(tmrReady);
      }
    }
      
    function submitDisabled(_form, currSubmit) {
      return function () {
          var mustSubmit = true;
          if (currSubmit != null)
              mustSubmit = currSubmit();
    
          var els = _form.elements;
          for (var i = 0; i < els.length; i++) {
              if (els[i].type == "submit")
                  if (mustSubmit)
                      els[i].disabled = true;
          }
          return mustSubmit;
      }
    }
      
    function subclassForms() {
      for (var f = 0; f < document.forms.length; f++) {
          var frm = document.forms[f];
          frm.onsubmit = submitDisabled(frm, frm.onsubmit);
      }
    }
	</script>
@endpush