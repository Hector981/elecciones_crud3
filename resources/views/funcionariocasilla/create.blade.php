@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper">
<h5 class="card-header info-color white-text text-center py-4">
        <strong>REGISTRAR EL FUNCIONARIO DE LA CASILLA</strong>
    </h5>
    <div class="card-body">
        
        <form method="post" action="{{ route('funcionariocasilla.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-row">
                <div class="col">
                <label for="funcionario_id">Selecione El Funcionario:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="funcionario_id" class="form-group" name="funcionario_id">
                            <option value="" disabled selected>Funcionario</option>
                            @foreach($funcionarios as $funcionario)
                            <option for="funcionario_id"  class="form-group"  name="funcionario_id"  label="{{$funcionario->nombrecompleto}}">{{$funcionario->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col">
                <label for="casilla_id">Selecione La Casilla:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="casilla_id" class="form-group" name="casilla_id">
                            <option value="" disabled selected>Casilla</option>
                            @foreach($casillas as $casilla)
                            <option for="casilla_id"  class="form-group"  name="casilla_id"  label="{{$casilla->ubicacion}}">{{$casilla->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
           
            <div class="form-row">
                <div class="col">
                <label for="rol_id">Selecione El Rol:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="rol_id" class="form-group" name="rol_id">
                            <option value="" disabled selected>Rol</option>
                            @foreach($roles as $rol)
                            <option for="rol_id"  class="form-group"  name="rol_id"  label="{{$rol->descripcion}}">{{$rol->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                <label for="eleccion_id">Selecione El Periodo De La Eleccion:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="eleccion_id" class="form-group" name="eleccion_id">
                            <option value="" disabled selected>Periodo</option>
                            @foreach($elecciones as $eleccion)
                            <option for="eleccion_id"  class="form-group"  name="eleccion_id"  label="{{$eleccion->periodo}}">{{$eleccion->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">REGISTRAR</button>
        </form>
    </div>
</div>
@endsection
