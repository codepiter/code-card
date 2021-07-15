
@extends('layouts.mm2')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top: 8px;">
            <div class="pull-left">
                <h2> Datos Basicos del Comprador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pagos.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre: </strong>
                {{ $pi->first_name }} {{ $pi->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono: </strong>
                {{ $pi->telephone }}
            </div>
        </div>
    </div>
@endsection
