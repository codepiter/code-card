@extends('theme.layout.n-master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet" />

  <style>
    .modal-dialog{
        padding-top: 50px !important;
      }
    input[type="file"]{
      font-size:smaller;
          padding: 4px 0px !important;
    }
  </style>

@endpush

@section('content')

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


<div class="grid-margin stretch-card">
  <div class="card">
    <div class="card-title px-4 pt-4 row">
      <div class="col">
        <h3>Crear Menu</h3>
      </div>
      
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ route('menus.index') }}">Regresar</a>
      </div>
    </div>


    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body">



      <div class="container" id="banner">
      
      
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
                  
                    <h5>Informacion Constante de su Restaurant <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modpag1" style="padding: 2px 8px;"><i class="{{-- fa fa-info-circle --}} mdi mdi-information "></i></button></h5> 
                        <!-- The Modal -->
                          <div class="modal" id="modpag1">
                            <div class="modal-dialog">
                            <div class="modal-content">
            
                              <!-- Modal Header -->
                              <div class="modal-header" >
                              <h4 class="modal-title">Distribución del Contenido</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
            
                              <!-- Modal body -->
                              <div class="modal-body" style="text-align:center">
                          En esta area debe ingresar informacion constante de su menu, como direccion, simbolo o embrema de su empresa, y los estilos, colores y fuentes.
                              </div>
                            </div>
                            </div>
                          </div>
                </div>
            </div>
                
                
                
            
                
                
                
                <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
                      <div style="font-size: large; text-align:center;">Ingrese Logo <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#modcar1" style="padding: 2px 8px;"><i class="{{-- fa fa-info-circle --}} mdi mdi-information "></i></button></div>
                      <!-- The Modal -->
                          <div class="modal" id="modcar1">
                            <div class="modal-dialog">
                            <div class="modal-content">
            
                              <!-- Modal Header -->
                              <div class="modal-header" >
                              <h4 class="modal-title">Imagen representativa del Restaurant</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
            
                              <!-- Modal body -->
                              <div class="modal-body" style="text-align:center">
                              En esta area recomendamos que ingrese el logo de su Restaurante o Negocio.
                              </div>
                            </div>
                            </div>
                          </div>
                      <div class="form-group">
                        <input type="file" name="logo" class="form-control" >
                        </div>
                    </div>
            
            
                    <div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:auto; margin-right:auto;">
                    <div style="font-size: large; text-align:center;">Ingrese el Fondo de su Menú <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#mod2" style="padding: 2px 8px;"><i class="{{-- fa fa-info-circle --}} mdi mdi-information "></i></button></div>
                      <!-- The Modal -->
                          <div class="modal" id="mod2">
                            <div class="modal-dialog">
                            <div class="modal-content">
            
                              <!-- Modal Header -->
                              <div class="modal-header" >
                              <h4 class="modal-title">Use dimenciones Rectangulares Posicionada verticalmente</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
            
                              <!-- Modal body -->
                              <div class="modal-body" style="text-align:center">
                              La imagen que seleccione acá sera el fondo de su menu, recomendamos utilice imagenes rectangulares posicionadas verticalmente
                              </div>
                            </div>
                            </div>
                          </div>
                      <div class="form-group">
                        
                        <input type="file" name="fondo" class="form-control" >
                      </div>
                    </div>
            
              </div>
            
            
              <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Nombre del Restaurant:</strong>
                        <input type="text" maxlength="218" name="restaurant" class="form-control" >
                      </div>
                    </div>
                      
                      
                      
                      
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <strong>Tamaño de Fuente Nombre del Restaurant</strong>
                      <select class="form-control" name="sze_font_rest" id="sze_font_rest">
                    
                      <option value="calc(0.7rem + 1vw)">Pequeño</option>
                      <option value="calc(1rem + 1vw)">Mediano</option>
                      <option value="calc(1.5rem + 2vw)">Grande</option>
                      <option value="calc(2.5rem + 3vw)">Enorme</option>
                      
                      </select>
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <strong>Color de Fuente Titulo/Restaurant</strong>
                      <input type="color" name="color_font_rest" class="form-control">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                          <strong>Fuente Titulo/Restaurant</strong>
                        <select class="form-control" name="letra_font_rest" id="letra_font_rest">
                          <option value="Sofia" style="font-family:Sofia">Sofia</option>
                          <option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
                          <option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
                          <option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
                          <option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
                          <option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
                          <option value="Carter One" style="font-family:Carter One">Carter One</option>
                          <option value="Courgette" style="font-family:Courgette">Courgette</option>
                          <option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
                          <option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
                          <option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
                          <option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
                          <option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
                          <option value="Handlee" style="font-family:Handlee">Handlee</option>
                          <option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
                          <option value="Flavors" style="font-family:Flavors">Flavors</option>
                          <option value="Ultra" style="font-family:Ultra">Ultra</option>
                          <option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
                          <option value="Allura" style="font-family:Allura">Allura</option>
                        </select>
                      </div>
                    </div>
              </div>
            
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Dirección y Teléfono:</strong>
                  <textarea class="form-control" name="address" rows="3"></textarea>
                  </div>
                </div>
              </div>		
              
              
            
              
              <div class="row">
            
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <strong>Tamaño de Fuente de Dirección:</strong>
                      <select class="form-control" name="sze_font_add" id="sze_font_add">
                      <option value="calc(0.7rem + 1vw)">Pequeño</option>
                      <option value="calc(1rem + 1vw)">Mediano</option>
                      <option value="calc(1.5rem + 2vw)">Grande</option>
                      <option value="calc(2.5rem + 3vw)">Enorme</option>
                      </select>
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      <div class="form-group">
                        <strong>Color de Fuente de Dirección:</strong>
                      <input type="color" name="color_font_add" class="form-control">
                      </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-4">
                      
                      <div class="form-group">
                        <strong>Fuente de la Dirección:</strong>
                      <select class="form-control" name="letra_font_add" id="letra_font_add">
                      <option value="Sofia" style="font-family:Sofia">Sofia</option>
                          <option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
                          <option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
                          <option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
                          <option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
                          <option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
                          <option value="Carter One" style="font-family:Carter One">Carter One</option>
                          <option value="Courgette" style="font-family:Courgette">Courgette</option>
                          <option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
                          <option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
                          <option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
                          <option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
                          <option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
                          <option value="Handlee" style="font-family:Handlee">Handlee</option>
                          <option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
                          <option value="Flavors" style="font-family:Flavors">Flavors</option>
                          <option value="Ultra" style="font-family:Ultra">Ultra</option>
                          <option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
                          <option value="Allura" style="font-family:Allura">Allura</option>
                      </select>
                      </div>
                    </div>
                    
              </div>
              
            
            
            
            <div class="row" style="padding-bottom: 45px; padding-top: 45px;">
              <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
              <h4>Estilos, colores y tamaños de las fuentes de los Platos. <button type="button" class="btn btn-primary ayuda" data-toggle="modal" data-target="#plato" style="padding: 2px 8px;"><i class="{{-- fa fa-info-circle --}} mdi mdi-information "></i></button></h4>
              </div>
                        <!-- The Modal -->
                          <div class="modal" id="plato">
                            <div class="modal-dialog">
                            <div class="modal-content">
            
                              <!-- Modal Header -->
                              <div class="modal-header" >
                              <h4 class="modal-title">Contenido del Plato</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
            
                              <!-- Modal body -->
                              <div class="modal-body" style="text-align:center">
                              En esta área usted podrá editar los estilos de las fuentes del contenido del plato, tales como color, tamaño y tipo de fuente separando el titulo del plato, precio, y resumen del mismo. 
                              </div>
                            </div>
                            </div>
                          </div>
            </div>
            
                <div class="row">
                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tamaño de letra del nombre del plato:</strong>
                    
                      <select class="form-control" name="size_font_title" id="size_font_title">
                      <option value="calc(0.7rem + 1vw)">Pequeño</option>
                      <option value="calc(1rem + 1vw)">Mediano</option>
                      <option value="calc(1.5rem + 2vw)">Grande</option>
                      <option value="calc(2.5rem + 3vw)">Enorme</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tamaño de letra de la descripción:</strong>
                      <select class="form-control" name="size_font_descr" id="size_font_descr">
                      <option value="calc(0.7rem + 1vw)">Pequeño</option>
                      <option value="calc(1rem + 1vw)">Mediano</option>
                      <option value="calc(1.5rem + 2vw)">Grande</option>
                      <option value="calc(2.5rem + 3vw)">Enorme</option>
                      </select>
                    </div>
                    
                  </div>
                
                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tamaño de letra del precio:</strong>
                    
                    <select class="form-control" name="size_font_price" id="size_font_price">
                      <option value="calc(0.7rem + 1vw)">Pequeño</option>
                      <option value="calc(1rem + 1vw)">Mediano</option>
                      <option value="calc(1.5rem + 2vw)">Grande</option>
                      <option value="calc(2.5rem + 3vw)">Enorme</option>
                    
                      </select>
                    </div>
                    
                  </div>
                
                
                </div>
                
                
                
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Color de letra del Nombre del Plato:</strong>
                      <input type="color" name="color_font_title" class="form-control">
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Color de letras descripción:</strong>
                      <input type="color" name="color_font_descr" class="form-control">
                    </div>
                    
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Color de fuente del Precio:</strong>
                      <input type="color" name="color_font_price" class="form-control">
                    </div>
                  </div>
                </div>
                
            
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tipo de Letra del Nombre Plato:</strong>
                      
                      <select class="form-control" name="letra_title">
                          <option value="Sofia" style="font-family:Sofia">Sofia</option>
                        <option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
                        <option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
                        <option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
                        <option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
                        <option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
                        <option value="Carter One" style="font-family:Carter One">Carter One</option>
                        <option value="Courgette" style="font-family:Courgette">Courgette</option>
                        <option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
                        <option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
                        <option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
                        <option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
                        <option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
                        <option value="Handlee" style="font-family:Handlee">Handlee</option>
                        <option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
                        <option value="Flavors" style="font-family:Flavors">Flavors</option>
                        <option value="Ultra" style="font-family:Ultra">Ultra</option>
                        <option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
                        <option value="Allura" style="font-family:Allura">Allura</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tipo de letra de la descripción:</strong>
                      
                      <select class="form-control" name="letra_descr" >
                          <option value="Sofia" style="font-family:Sofia">Sofia</option>
                        <option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
                        <option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
                        <option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
                        <option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
                        <option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
                        <option value="Carter One" style="font-family:Carter One">Carter One</option>
                        <option value="Courgette" style="font-family:Courgette">Courgette</option>
                        <option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
                        <option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
                        <option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
                        <option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
                        <option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
                        <option value="Handlee" style="font-family:Handlee">Handlee</option>
                        <option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
                        <option value="Flavors" style="font-family:Flavors">Flavors</option>
                        <option value="Ultra" style="font-family:Ultra">Ultra</option>
                        <option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
                        <option value="Allura" style="font-family:Allura">Allura</option>
                      </select>
                      
                    </div>
                    
                  </div>
                  
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group">
                    <strong>Tipo de fuente del precio:</strong>
                      <select class="form-control" name="letra_price" >
                          <option value="Sofia" style="font-family:Sofia">Sofia</option>
                        <option value="Dancing Script" style="font-family:Dancing Script">Dancing Script</option>
                        <option value="Pacifico" style="font-family:Pacifico">Pacifico</option>
                        <option value="Shadows Into Light" style="font-family:Shadows Into Light">Shadows Into Light</option>
                        <option value="Satisfy" style="font-family:Satisfy">Satisfy</option>
                        <option value="Reighteous" style="font-family:Reighteous">Reighteous</option>
                        <option value="Carter One" style="font-family:Carter One">Carter One</option>
                        <option value="Courgette" style="font-family:Courgette">Courgette</option>
                        <option value="Sansita Swashed" style="font-family:Sansita Swashed">Sansita Swashed</option>
                        <option value="Great Vibes" style="font-family:Great Vibes">Great Vibes</option>
                        <option value="Orbitron" style="font-family:Orbitron">Orbitron</option>
                        <option value="Yellowtail" style="font-family:Yellowtail">Yellowtail</option>
                        <option value="Gloria Hallelujah" style="font-family:Gloria Hallelujah">Gloria Hallelujah</option>
                        <option value="Handlee" style="font-family:Handlee">Handlee</option>
                        <option value="Marck Script" style="font-family:Marck Script">Marck Script</option>
                        <option value="Flavors" style="font-family:Flavors">Flavors</option>
                        <option value="Ultra" style="font-family:Ultra">Ultra</option>
                        <option value="Tangerine" style="font-family:Tangerine">Tangerine</option>
                        <option value="Allura" style="font-family:Allura">Allura</option>
                      </select>
                      
                    </div>
                    
                  </div>
                  
                </div>
                
              <div class="row" style="padding-bottom: 45px; padding-top: 45px;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-center">
                  <h4>Ingrese los platillos ofrecidos en su Restaurant</h4>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <button type="button" name="add-plato" id="add-plato" class="btn btn-success">Agregar Plato</button>
                </div>
              </div>
              
              
              <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                  <strong>Título:</strong>
                    <input type="text" name="title[]" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                  <strong>Categoría:</strong>
                      <select class="form-control" name="category_id[]">
                        @foreach($categorias as $categoria)
                          <option value="{{ $categoria->id }}">
                            {{ $categoria->categ_name }}
                          </option>
                        @endforeach
                      </select>
                  </div>
                  
                </div>		
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                  <strong>Descripción:</strong>
                    <textarea  name="description[]" class="form-control" maxlength="256"></textarea>
                  </div>
                  
                </div>
            
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                  <strong>Precio:</strong>
                    <input type="text" name="price[]" class="form-control">
                  </div>
                </div>	
                
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="form-group">
                          <strong>Foto:</strong>
                    <input type="file" name="photo1[]" class="form-control" >
                  </div>
                </div>
                
            
                <div class="col-12 col-sm-12 col-md-12">
                  <div class="form-group">
                  <div id="div-platos"></div>
                  </div>
                </div>
              
              
              
              </div>
              
            
            
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary button">Guardar</button>
              </div>
        </form>
      
      
      
       </div><!--banner-->



    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dragula/dragula.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dragula.js') }}"></script>

  <script src="{{ asset('js/tab.js') }}" defer></script>
  <script>
    $('document').ready(function(){
      
      $('select').on('change', function() {
        $(this).css('font-family', this.value );
      });
    });
  </script>

@endpush