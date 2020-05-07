@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO FUNCIONARIO {{$funcionario->id}}</strong>
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
        <form class="text-center" style="color: #757575;" method="post"  action="{{ route('funcionario.update', $funcionario->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                        <input type="text" id="materialRegistrarUbicacion" class="form-control" name="nombrecompleto" value="{{$funcionario->nombrecompleto}}">
                        <label for="nombrecompleto">Nombre Completo</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                <label for="sexo">Selecione El Sexo Del Funcionario</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="sexo" class="form-group" name="sexo">
                            <option value="" disabled selected value="">Sexo {{$funcionario->sexo}}</option>
                            <option value="M" for="sexo" class="form-group" name="sexo">(M) Masculino</option>
                            <option value="F" for="sexo" class="form-group" name="sexo">(F) Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">REGISTRAR</button>
        </form>
    </div>
</div>
@endsection