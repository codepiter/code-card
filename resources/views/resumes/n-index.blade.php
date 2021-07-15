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
        <h3>Curriculum</h3><br>
        <a class="btn btn-primary" href="{{ url('resumes/create') }}">Cargar Curriculum</a>
      </div>
      
      <div class="d-inline float-right pr-2">
        <a class="btn btn-success" href="{{ url('/personalInformation') }}">Atras</a>
      </div>
    </div>

    @if( Session::has('success')) {{
      Session::get('success')
      }}
    @endif


    <div class="px-4">
      <hr style="background-color: #262f43; size:2px;">
    </div>
    
    <div class="card-body">
      {{-- <h6 class="card-title">Hoverable Table</h6>
      <p class="card-description">Add class <code>.table-hover</code></p> --}}
      <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empresa</th>
                <th width="280px" style="text-align: center;">Opciones</th>
              </tr>
            </thead>
            <tbody>

              @foreach($resumes as $item)
	
                <tr>
                  <td><img src="{{ asset('storage'). '/'.$item->personalInformation->photo}}" alt="" width="50"></td>
                  <td>{{$item->personalInformation->first_name}}</td>
                  <td>{{$item->personalInformation->last_name}}</td>
                  <td>{{$item->personalInformation->company}}</td>                
                  
                  <!--action-->
                  <td style="text-align: center;">
                    <form action="{{ route('resumes.destroy',$item->id) }}" method="POST" class="d-flex justify-content-around">
                        
                      <a class="btn btn-outline-info" href="{{ route('pdf.PDFgenerate',$item->personalInformation->id) }}">
                        {{-- <img src="{{URL::asset('/img/logo/view.png')}}" alt="show" height="15" width="auto" height="20"> --}}
                        <i class="mdi mdi-eye"></i>
                      </a>
              
                      <a class="btn btn-outline-primary" href="{{ route('resumes.edit',$item->id) }}">
                        {{-- <img src="{{URL::asset('/img/logo/edit.png')}}" alt="PDF" height="15" width="auto" height="20"> --}}
                        <i class="mdi mdi-border-color"></i>
                      </a>
                    
                      @csrf
                      @method('DELETE')
          
                      {{-- <!-- <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Seguro?')"><img src="{{URL::asset('/img/logo/delete.png')}}" alt="Delete" height="15" width="auto" height="20"></button>--> --}}
                    </form>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {{$resumes->links()}}
          </div>
          
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
@endpush