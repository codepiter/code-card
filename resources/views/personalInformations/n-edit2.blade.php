@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />
  <style>
    /* input[type="file"] {
      padding:0px !important;
      font-size: initial;
    }
    
    h3{
      font-size:large;
      text-align:center;
    }
    
    .btn-carou{
      text-align:center;
    }
    
    @media screen and (max-width: 980px){
      #page-wrapper {
        padding-top: 35px !important;
        padding-bottom: 35px !important;
      }
    }
    
    .modal-dialog{
      padding-top: 50px !important;
    }
  
    .modal-title {
        font-size: larger;
    } */
    /* body { */
      /* background-color: #070d19 !important; */ /* Color de fondo #070d19*/
    /* } */
    /* form {
      background-color: inherit !important; /* Color del fondo form es igual al tema padre */
    } */
  </style>



  <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
@endpush

@section('content')

{{--   @if ($message = Session::get('success')) --}}
    <div id="alert-succces-content" class="alert alert-success" style="display: none;">
        <p></p>
    </div>
{{--   @endif --}}

  <div id="alert-danger-content" class="alert alert-danger" style="display:none;">
    <p></p>
  </div>

  {{-- <div class="grid-margin stretch-card"> --}}
    <div class="card p-3">

      <div class="card-title pl-2">Edición de tarjeta</div>      

        <div class="row">
          <div class="col-12 col-md-4 pb-2 pb-md-0">
            <h4 class="text-center">Secciones de la tarjeta</h4>
            <ul class="list-group" id="listGroupIndice" style="cursor:pointer;">
              {{-- Opciones Personal --}}
              @if (!($template > 17 && $template < 29))
                <li class="list-group-item @if(!($template > 17 && $template < 29)) active @endif" 
                id="listGroupIndiceOp1" onclick="changeContentFromListIndice(this, 'optionContent1')">Información General</li>
                <li class="list-group-item" id="listGroupIndiceOp2" onclick="changeContentFromListIndice(this, 'optionContent2')">Información General 2</li>                  
                {{-- Fin de Opciones Personal --}}
              @else
              {{-- Opciones Empresarial --}}
                <li class="list-group-item @if($template > 17 && $template < 29) active @endif" 
                id="listGroupIndiceOp3" onclick="changeContentFromListIndice(this,'optionContent7')">Información de la empresa</li>
                <li class="list-group-item" id="listGroupIndiceOp4" onclick="changeContentFromListIndice(this, 'optionContent8')">Imagenes o presentaciones</li>
                <li class="list-group-item" id="listGroupIndiceOp9" onclick="changeContentFromListIndice(this, 'optionContent9')">Productos/Servicios</li>
              @endif
              {{-- Fin de Opciones Empresarial --}}
              <li class="list-group-item" id="listGroupIndiceOp5" onclick="changeContentFromListIndice(this, 'optionContent3')">Redes Sociales</li>
              <li class="list-group-item" id="listGroupIndiceOp6" onclick="changeContentFromListIndice(this, 'optionContent5')">Información de Contacto</li>
              <li class="list-group-item" id="listGroupIndiceOp7" onclick="changeContentFromListIndice(this, 'optionContent4')">Metodos de Pago</li>
              <li class="list-group-item" id="listGroupIndiceOp8" onclick="changeContentFromListIndice(this, 'optionContent6')">Plantillas</li>
            </ul>
          </div>      


            <div class="col-12 col-md-8 py-2 border" style="/* background-color: grey; */">
              
              <h4>Datos Generales</h4>

              @if ( !($template > 17 && $template < 29) )  {{-- Condicional para mostrar los formularios, true Empresa, false Personal --}}

              {{-- Formularios para una tarjeta particular/personal --}}
              {{-- Información General --}}
              <form id="optionContent1" class="optionContent" @if(!($template > 17 && $template < 29)) style="display:block;" @else style="display:none;" @endif> {{-- Primer Formulario --}}
                
                <div class="my-4 row ">
                  
                  <div class="col-12 col-md-6">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $personalInformation->first_name }}">
                  </div>
                
                  <div class="col-12 col-md-6 mt-1">
                    <label for="" class="form-label">Apellido</label>
                    <input type="text" name="last_name" class="form-control" value="{{ $personalInformation->last_name }}">
                  </div>
                
                </div>
      
                <div class="my-4 row">
                  
                  <div class="col-12 col-md-6">
                    <label for="" class="form-label">Empresa</label>
                    <input type="text" name="company" class="form-control" value="{{ $personalInformation->company }}">
                  </div>
                
                  <div class="col-12 col-md-6 mt-1">
                    <label for="" class="form-label">Cargo o Puesto</label>
                    <input type="text" name="position" class="form-control" value="{{ $personalInformation->position }}">
                  </div>
                
                </div>
                
                <div class="my-4">
                  <label for="" class="form-label">Presentación de la empresa</label>
                  <textarea name="" id="" name="presentation" cols="30" rows="10" class="form-control" style="max-height: 100px;">
                    {{ $personalInformation->presentation }}
                  </textarea>
                </div>
      
      
                <div class="row my-4">
      
                  <div class="col-12 mb-3 text-center"><h5>Imagenes</h5></div>
      
                  <div class="col-6 d-flex flex-column align-items-center">
                    {{-- <ul class="list-group">
                      <li class="list-group-item">Principal</li>
                      <li class="list-group-item">Logo</li>
                    </ul> --}}
                    <label>Principal</label>
                    <input type="file" name="photo" id="" style="display: none;">
                    <div style="max-height:250px;">
                      @if ($personalInformation->photo)
                        <img src="{{ asset('storage'). '/'.$personalInformation->photo}}" alt="" style="max-height: inherit;">                          
                      @else
                        <div class="rounded-circle text-center my-2 d-flex align-items-center justify-content-center" 
                          style="hover:cursor; height: 120px; width: 120px; background-color:blue;">IMG 1</div>                          
                      @endif

                    </div>
                    
                  </div>
      
                  <div class="col-6 d-flex flex-column align-items-center">
                    <label>Logo</label>
                    <input type="file" name="logo" id="" style="display:none;">
                    <div style="max-height:250px;">
                      @if ($personalInformation->logo)
                      <img src="{{ asset('storage'). '/'.$personalInformation->logo}}" alt=""  style="max-width: 250px;">
                      @else
                        <div class="rounded-circle text-center my-2 d-flex align-items-center justify-content-center" 
                          style="hover:cursor; height: 120px; width: 120px; background-color:purple;">IMG 2</div>                          
                      @endif
                    </div>
                  </div>

                  <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent1')">Actualizar</button>
                  </div>
      
                </div>

              </form>


              {{-- Información General 2 --}}
              <form id="optionContent2" class="my-2 optionContent" style="display:none;"> {{-- Segundo Formulario --}}

                <div class="form-group row">
                  <label class="form-label col-12 col-md-6" for="">Mostrar opción para descargar Curriculum</label>
                  <div class="col-12 col-md-5 form-check-inline">
                    <div class="form-group">
                      <div class="col-6 form-check form-check-inline">
                        <label for="statusCardRadio1" class="form-check-label">
                          <input id="statusCardRadio1" class="form-check-input" type="radio" name="cv" value="1"
                          @if ($cv == 1) checked @endif>
                          Si
                        </label>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-6 form-check form-check-inline">
                        <label for="statusCardRadio2" class="form-check-label">
                          <input id="statusCardRadio2" class="form-check-input col-4" type="radio" name="cv" value="2"
                          @if ($cv == 2) checked @endif>
                          No
                        </label>
                      </div>                
                    </div>

                  </div>
                  
                </div>

                <div class="form-group row">
                  <label class="col-12 col-md-4 form-label" for="">Estatus Laboral</label>
                  <div class="col-12 col-md">
                    <div class="form-check form-check-inline">
                      <label for="status_lab1" class="form-check-label">
                        <input class="form-check-input" type="radio" name="status_lab" id="status_lab1" value="0"
                        @if ($status_lab == 0) checked @endif>
                        Disponible
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label for="status_lab2" class="form-check-label">
                        <input class="form-check-input" type="radio" name="status_lab" id="status_lab2" value="1"
                        @if ($status_lab == 1) checked @endif>
                        No Disponible
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-12 col-md-5 form-label" for="">Indique su proposito:</label>
                  
                  <div class="col-12 col-md">
                    <div class="form-check form-check-inline">
                      <label for="serv_prod1" class="form-check-label">
                        <input class="form-check-input" type="radio" name="serv_prod" id="serv_prod1" value="Mis Productos"
                        @if ($personalInformation->serv_prod == "Mis Productos") checked @endif>
                        Productos
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label for="serv_prod2" class="form-check-label">
                        <input class="form-check-input" type="radio" name="serv_prod" id="serv_prod2" value="Mis Servicios"
                        @if ($personalInformation->serv_prod == "Mis Servicios") checked @endif>
                        Servicios
                      </label>
                    </div>

                  </div>
                </div>


                <div class="form-group">
                  <label class="form-label" for="">Ingrese sus productos/servicios</label>
                  <textarea name="services" id="" cols="30" rows="10" style="height:100px;" class="form-control">
                    {{ $personalInformation->services }}
                  </textarea>
                </div>

                <div class="form-group">
                  <label class="form-label" for="">Información sobre usted</label>
                  <textarea name="we" id="" cols="30" rows="10" style="height:100px;" class="form-control">
                    {{ $personalInformation->we }}
                  </textarea>
                </div>

                <div class="form-group text-center">
                  <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent2')">Actualizar</button>
                </div>

              </form>
             

            @else    


              {{-- Formularios para una tarjeta empresarial --}}

              <form id="optionContent7" class="my-2 optionContent" @if($template > 17 && $template < 29) style="display:block;" @else style="display:none;" @endif> {{-- Primero Formulario --}}

                <h4 class="text-center mb-3">Información de la empresa</h4>
                <div class="form-row">

                  <div class="col-12 row mb-5">
                    <div class="col-sm-4">
                      <label for="" class="mb-2">Logo de la empresa</label>
                      {{-- <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="headerRounded" id="headerRounded1">
                        <label for="headerRounded1">Imagen Circular</label>
                      </div> --}}
                    </div>
                    <div class="col-sm-8 d-flex justify-content-center">
                      <img src="{{ asset('storage'). '/'.$personalInformation->header}}" alt="" style="max-height: 135px;">
                      {{-- <div class="rounded bg-dark" style="height: 120px; width:120px; max-width:120px; color:white;">Logo</div> --}}
                      <input type="file" name="header" id="" style="display: none;">
                    </div>
                  </div>


                  <div class="col-12 mb-5">

                    <label for="">Presentación de la empresa</label>
                    <textarea name="presentation" id="" cols="30" rows="10" class="form-control" style="height:120px;" maxlength="650">
                      {{ $personalInformation->presentation }}
                    </textarea>

                  </div>


                  <div class="col-12 col-md-6 mb-5">
                    <label for="">Razón Social de la Empresa</label>
                    <input type="text" name="first_name" id="" class="form-control" value="{{ $personalInformation->first_name }}">
                  </div>
                  
                  <div class="col-12 col-md-6 mb-5">
                    <label for="">Cargo o puesto que ocupa</label>
                    <input type="text" name="puesto" id="" class="form-control" value="{{ $personalInformation->puesto }}">
                  </div>

                  <div class="col-12 {{-- col-md-6 --}} mb-5">
                    <label for="">Info sobre nosotros</label>
                    <textarea name="we" id="" cols="30" rows="10" class="form-control" style="height:120px;">
                      {{ $personalInformation->we }}
                    </textarea>
                  </div>

                  <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent7')">Actualizar</button>
                  </div>

                </div>

              </form>



              <form id="optionContent9" class="my-2 optionContent" style="display:none;"> {{-- Tercer Formulario --}}


                <h4 class="text-center mb-3">Productos/Servicios</h4>

                <div class="form-row">

                  <div class="col-12 col-md-6 mb-5">
                    <label for="">Opción para descargar Brochure</label><br>
                    <div class="form-check form-check-inline">
                      <label for="" class="form-check-label">
                        <input class="form-check-input" type="radio" name="cv" id="" value="1" @if($personalInformation->cv == "1")checked @endif>
                        Si
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label for="" class="form-check-label">
                        <input class="form-check-input" type="radio" name="cv" id="" value="2" @if($personalInformation->cv == "2")checked @endif>
                        No
                      </label>
                    </div>
                  </div>

                  <div class="col-12 col-md-6">
                    <label for="">Opción para descargar Brochure</label><br>
                    <div class="form-check form-check-inline">
                      <label for="" class="form-check-label">
                        <input class="form-check-input" type="radio" name="serv_prod" id="" value="Mis Productos" @if($personalInformation->serv_prod == "Mis Productos")checked @endif>
                        Productos
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label for="" class="form-check-label">
                        <input class="form-check-input" type="radio" name="serv_prod" id="" value="Mis Servicios" @if($personalInformation->serv_prod == "Mis Servicios")checked @endif>
                        Servicios
                      </label>
                    </div>
                  </div>


                  <div class="col-12 mb-3">
                    <label for="">Los servicios o productos que ofrece</label>
                    <textarea name="services" id="" cols="30" rows="10" class="form-control" style="height:120px;">
                      {{ $personalInformation->services }}
                    </textarea>
                  </div>

                  <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent9')">Actualizar</button>
                  </div>
                  
                </div>


              </form>




              <form id="optionContent8" class="my-2 optionContent" style="display:none;"> {{-- Segundo Formulario --}}

                {{-- <h4 class="text-center mb-3">Imagenes</h4> --}}
                <div class="mb-5 form-row">
                  <div class="col-12 text-center"><h4>Logos o presentaciones</h4></div>
                  <div class="col-12 col-md-3">
                    <ul class="list-group">
                      <li class="list-group-item">Imagen 1</li>
                      <li class="list-group-item">Imagen 2</li>
                      <li class="list-group-item">Imagen 3</li>
                    </ul>
                    <label class="text-center">Max. 3 Imagenes</label>
                  </div>
                  
                  <div class="col-12 col-md-9">
                    
                    <div class="owl-carousel mb-2">
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->photo}}" alt="" style="max-height: 150px;"> </div>
                      {{-- <div> <img src="{{ asset('storage'). '/'.$personalInformation->header}}" alt="" style="max-height: 135px;"> </div> --}}
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->photo2}}" alt="" style="max-height: 150px;"> </div>
                      <img src="{{ asset('storage'). '/'.$personalInformation->photo3}}" alt="" style="max-height: 150px;">
                    </div>

                    <div class="text-center my-3">
                      <button type="button" class="btn btn-primary">Agregar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>




                <div class="mb-5 form-row">
                  <div class="col-12 mb-2 text-center"><h4>Presentación o de la empresa</h4></div>
                  <div class="col-12 col-md-3">
                    <ul class="list-group">
                      <li class="list-group-item">Imagen 1</li>
                      <li class="list-group-item">Imagen 2</li>
                      <li class="list-group-item">Imagen 3</li>
                      <li class="list-group-item">Imagen 4</li>
                      <li class="list-group-item">Imagen 5</li>
                      <li class="list-group-item">Imagen 6</li>
                    </ul>
                    <label class="text-center">Max. 6 Imagenes</label>
                  </div>
                  
                  <div class="col-12 col-md-9">
                    
                    <div class="owl-carousel mb-2">
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr1}}" alt="" style="max-height: 350px;"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr2}}" alt="" style="max-height: 150px;"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr3}}" alt="" style="max-height: 150px;"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr4}}" alt="" style="max-height: 150px;"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr5}}" alt="" style="max-height: 150px;"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->carr6}}" alt="" style="max-height: 150px;"> </div>
                    </div>

                    <div class="text-center my-3">
                      <input type="file" class="form-control-file" name="carr5" id="carr5" value="" accept="image/png, .jpeg, .jpg" style="display: none;">
                      <button type="button" class="btn btn-primary">Agregar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>




                <div class="mb-5 form-row">
                  <div class="col-12 text-center"><h4>Productos o Servicios</h4></div>
                  <div class="col-12 col-md-3">
                    <ul class="list-group">
                      <li class="list-group-item">Imagen 1</li>
                      <li class="list-group-item">Imagen 2</li>
                      <li class="list-group-item">Imagen 3</li>
                      <li class="list-group-item">Imagen 4</li>
                      <li class="list-group-item">Imagen 5</li>
                      <li class="list-group-item">Imagen 6</li>
                    </ul>
                    <label class="text-center">Max. 6 Imagenes</label>
                  </div>
                  
                  <div class="col-12 col-md-9">
                    
                    <div class="owl-carousel mb-2 pt-2">
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo}}" alt=""  style="max-height: 150px; width:auto"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo2}}" alt=""  style="max-height: 150px; width:auto"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo3}}" alt=""  style="max-height: 150px; width:auto"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo4}}" alt=""  style="max-height: 150px; width:auto"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo5}}" alt=""  style="max-height: 150px; width:auto"> </div>
                      <div> <img src="{{ asset('storage'). '/'.$personalInformation->logo6}}" alt=""  style="max-height: 150px; width:auto"> </div>
                    </div>

                    <div class="text-center my-3">
                      <input type="file" class="form-control-file" name="logo" id="logo" value="" style="max-inline-size: fit-content; display: none;" accept="image/png, .jpeg, .jpg">
                      <button type="button" class="btn btn-primary">Agregar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>


              </form>

          @endif    



               {{-- Redes Sociales --}}
              <form id="optionContent3" class="my-2 optionContent" style="display:none;"> {{-- Tercer Formulario --}}

                <h4 class="text-center mb-3">Redes Sociales</h4>
                
                <div class="form-row">
                  
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="mdi mdi-facebook"></i> </div>
                      </div>
                      <input type="text" class="form-control" id="" name="facebook" placeholder="Facebook" value="{{ $personalInformation->facebook }}">
                    </div>
                  </div>
      
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="mdi mdi-linkedin"></i> </div>
                      </div>
                      <input type="text" class="form-control" name="linkedin" id="" placeholder="Linkedin" value="{{ $personalInformation->linkedin }}">
                    </div>
                  </div>

                </div>


                <div class="form-row">
                  
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="mdi mdi-instagram"></i> </div>
                      </div>
                      <input type="text" class="form-control" id="" name="instagram" placeholder="Instagram" value="{{ $personalInformation->instagram }}">
                    </div>
                  </div>
      
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="mdi mdi-twitter"></i> </div>
                      </div>
                      <input type="text" class="form-control" id="" name="twitter" placeholder="Twitter" value="{{ $personalInformation->twitter }}">
                    </div>
                  </div>

                </div>

                <div class="form-row">
                  
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <i class="mdi mdi-whatsapp"></i> </div>
                      </div>
                      <input type="text" class="form-control" id="" name="whatsapp" placeholder="Whatsapp" value="{{ $personalInformation->whatsapp }}">
                    </div>
                  </div>
      
                  <div class="col-6 form-group">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> 
                          <i class="mdi mdi-youtube"></i>
                          <input type="checkbox" aria-label="Checkbox for following text input">
                        </div>
                      </div>
                      <input type="text" class="form-control" id="" name="youtube" placeholder="Youtube" value="{{ $personalInformation->youtube }}">
                    </div>
                  </div>

                </div>

                <div class="col-12 text-center">
                  <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent3')">Actualizar</button>
                </div>
              
              </form>

              
              {{-- Metodos de Pago --}}
              <form id="optionContent4" class="my-2 optionContent" style="display:none;"> {{-- Cuarto Formulario --}}

                <h4 class="text-center mb-3">Opciones de pago</h4>

                <div class="form-row">
                  
                  <div class="col-12 col-md-6 mb-5 mb-md-0 form-group d-flex flex-column align-items-center">
                    @if ($personalInformation->qr)
                      <img src="{{ asset('storage'). '/'.$personalInformation->qr}}" alt=""  style="max-height: 150px; width:auto">
                    @else
                      {{-- <div class="bg-dark border text-center" style="height:120px; width:120px;">IMG</div> --}}
                      <div class="bg-light border rounded d-flex align-items-center justify-content-center mb-2" style="height:120px; width:120px; color:black;">Sin QR</div> 
                    @endif
                    

                    {{-- <label for="" class="">URL Paypal.me</label> --}}
                    <input type="file" name="qr" id="" style="display: none;">
                    <input type="text" name="" id="" name="paypalme" class="form-control mt-2" placeholder="URL Paypal.me" value="{{ $personalInformation->paypalme }}">
                  </div>
                  
                  <div class="col-12 col-md-6 mb-5 mb-md-0 form-group d-flex flex-column align-items-center">
                    @if ($personalInformation->qr2)
                      <div style="height: 152px;">
                        <img src="{{ asset('storage'). '/'.$personalInformation->qr2}}" alt=""  style="max-height: 150px; width:auto">
                      </div>
                    @else
                      <div class="bg-light border rounded d-flex align-items-center justify-content-center mb-2" style="height:120px; width:120px; color:black;">Sin QR</div>                        
                    @endif

                    {{-- <label for="" class="">URL Paypal.me</label> --}}
                    <input type="file" name="qr2" id="" style="display: none;">
                    <input type="text" class="form-control my-2" name="np2" placeholder="Nombre del metodo de pago" value="{{ $personalInformation->np2 }}">
                    <input type="text" name="pasarela2" id="" class="form-control mt-2" placeholder="URL Pago alternativo" value="{{ $personalInformation->pasarela2 }}">
                  </div>

                  <div class="col-12 mt-3 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent4')">Actualizar</button>
                  </div>

                </div>


              </form>


              {{-- Información de Contacto --}}
              <form id="optionContent5" class="my-2 optionContent" style="display:none;"> {{-- Quinto Formulario --}}


                <h4 class="text-center mb-3">Información de contacto</h4>

                <div class="form-row">

                  <div class="col-12 col-md-6 form-group">
                    <label>E-Mail</label>  
                    <input type="text" class="form-control mb-3" name="correo" placeholder="E-Mail" value="{{ $personalInformation->correo }}">

                    <label>Dirección</label>  
                    <input type="text" class="form-control mb-3" name="address" placeholder="Dirección" value="{{ $personalInformation->address }}">

                    <label>Sitio Web</label>  
                    <input type="text" class="form-control" name="website" placeholder="URL Sitio Web" value="{{ $personalInformation->website }}">
                  </div>

                  <div class="col-12 col-md-6 form-group">
                    <label>Telefono</label>  
                    <input type="text" class="form-control mb-3" name="telephone" placeholder="Numero de telefono" value="{{ $personalInformation->telephone }}" value="">

                    <label>País</label>  
                    <input type="text" class="form-control mb-3" name="pais" placeholder="Nombre del pais" value="{{ $personalInformation->pais }}">

                    <label>Google Map</label>  
                    <input type="text" class="form-control" name="url_map" placeholder="URL Goggle Map" value="{{ $personalInformation->url_map }}">
                  </div>

                  <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent5')">Actualizar</button>
                  </div>

                </div>


              </form>


              {{-- Plantillas --}}
              <form id="optionContent6" class="my-2 optionContent" style="display:none;"> {{-- Sexto Formulario --}}


                <h4 class="text-center">Plantillas</h4>

                <div class="form-row d-flex justify-content-center">

                  <div class="col-12 col-md-4 m-3 px-1 bg-light rounded d-flex justify-content-center" style="height: 180px; color: black;">
                    <h5 class="align-self-center">Templete 1</h5>
                  </div>

                  <div class="col-12 col-md-4 m-3 px-1 bg-light rounded" style="height: 180px; color: black;">
                    <h5>Templete 2</h5>
                  </div>

                  <div class="col-12 col-md-4 m-3 px-1 bg-light rounded" style="height: 180px; color: black;">
                    <h5>Templete 3</h5>
                  </div>

                  <div class="col-12 col-md-4 m-3 px-1 bg-light rounded" style="height: 180px; color: black;">
                    <h5>Templete 4</h5>
                  </div>

                  <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" onclick="getFormContent('optionContent6')">Actualizar</button>
                  </div>

                </div>


              </form>



          </div>
        </div>

    </div>
  {{-- </div> --}}

@endsection


@push('plugin-scripts')
<script src="{{asset('assets/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
@endpush

@push('custom-scripts')
<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel();
  });
  function changeContentFromListIndice(listOption, contentOption){
    //id="optionContent1" class="my-2 optionContent" 
    // #listGroupIndice
    $("#listGroupIndice li.active").removeClass('active');
    jQuery(listOption).addClass('active');
    $(".optionContent").hide();
    $("#"+contentOption).fadeIn();
  }
  function getImageForm(){
  }
  function getFormContent(divContent){
    /* let content = []; */
    var datosFormas = new FormData(document.getElementById(divContent));
    //let url = "{{ route('update2PersonalInformation', $personalInformation->id ) }}";
    let url = "{{ route('personalInformation.update', $personalInformation->id ) }}";
    //url = url+'?_token=' + '{{ csrf_token() }}';
    datosFormas.append('_token', '{{ csrf_token() }}');
    datosFormas.append('_method', 'PUT');
    datosFormas.append('form', divContent);
    //datosFormas.append('presentation', $('#'+divContent+' textarea[name="presentation"]').val());
    /* if(divContent == 'optionContent7'){
      content['form'] = divContent;
      content['presentation'] = $('#'+divContent+' textarea[name="presentation"]').val();
      content['first_name'] = $('#'+divContent+' input[name=first_name]').val().trim();
      content['puesto'] = $('#'+divContent+' input[name="puesto"]').val();
      content['we'] = $('#'+divContent+' textarea[name="we"]').val().trim();
    } */
    console.log(/* content, */ datosFormas, datosFormas.get('form'), datosFormas.get('first_name'));
    /* submitFormAjax(content, url); */
    submitFormAjax(datosFormas, url);
  }
  function submitFormAjax(data, url){
    $("#alert-succces-content p").text(''); $("#alert-succces-content").hide();
    $("#alert-danger-content p").text(''); $("#alert-danger-content").hide();
    /* let csrf = "{{ csrf_token() }}";
    data["_token"] = csrf; */
    $.ajax({
        method: "POST",
        url: url,
        data: data,
        processData: false,
        contentType: false,
        success:function(response) {
          //alert-succces-content
          $("#alert-succces-content p").text(response.success);
          $("#alert-succces-content").show();
          console.log(response);
        },
        error:function (response) {
          //alert-danger-content
          //$("#alert-danger-content p").text();
          let msgError = '';
          for (const property in response.responseJSON.errors) {
            //console.log(`${property}: ${response.responseJSON.errors[property]}`);
            msgError = msgError + response.responseJSON.errors[property] +"";
            $("#alert-danger-content").append("<p> - "+ response.responseJSON.errors[property] +"</p>");
          }          
          //$("#alert-danger-content p").text(msgError);
          $("#alert-danger-content").show();
          /* $('#nameError').text(response.responseJSON.errors.name);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#subjectError').text(response.responseJSON.errors.subject);
          $('#mobileNumberError').text(response.responseJSON.errors.mobile_number);
          $('#messageError').text(response.responseJSON.errors.message); */
        }
        })/* .done(function( msg ) {
          console.log('Respuesta: '+msg);
        if(msg.error == 0){
            //$('.sucess-status-update').html(msg.message);
            alert(msg.message);
        }else{
            alert(msg.message);
            //$('.error-favourite-message').html(msg.message);
        }
    }) */;
  }
</script>
@endpush