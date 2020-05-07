@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO COMITE {{$eleccioncomite->id}}</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form class="text-center" style="color: #757575;" method="post" action="{{ route('eleccioncomite.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
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
            <div class="form-row">
                <div class="col">
                <label  for="funcionario_id">Selecione Al Funcionario</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="funcionario_id" class="form-group" name="funcionario_id">
                            <option value="" disabled selected>Funcionario</option>
                            @foreach($funcionarios as $funcionario)
                            <option for="funcionario_id" class="form-group" name="funcionario_id" label="{{$funcionario->nombrecompleto}}" >{{$funcionario->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                <label for="rol_id">Selecione El Rol</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="rol_id" class="form-group" name="rol_id">
                            <option value="" disabled selected>Rol</option>
                            @foreach($roles as $rol)
                            <option for="rol_id" class="form-group" name="rol_id" label="{{$rol->descripcion}}">{{$rol->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">REGISTRAR</button>
        </form>
    </div>
</div>
<BR></BR>
@endsection