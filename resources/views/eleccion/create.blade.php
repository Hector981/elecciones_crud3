@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper">
<h5 class="card-header info-color white-text text-center py-4">
        <strong>REGISTRAR ELECCION</strong>
    </h5>
    <div class="card-body">
        
        <form method="post" action="{{ route('eleccion.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="periodo">Periodo:</label>
                <input type="text" class="form-control" name="periodo" />
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="fecha">Fecha:</label><br>
                <input type="date" class="form-control" name="fecha"/>
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="fechaapertura">Fecha apertura:</label><br>
                <input type="date" class="form-control" name="fechaapertura"/>
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="horaapertura">Hora apertura:</label><br>
                <input type="time" class="form-control" name="horaapertura"/>
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="fechacierre">Fecha cierre:</label><br>
                <input type="date" class="form-control" name="fechacierre"/>
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="horacierre">Hora cierre:</label><br>
                <input type="time" class="form-control" name="horacierre"/>
                </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="observaciones">Observaciones:</label>
                <input type="text" class="form-control" name="observaciones" />
                </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">REGISTRAR</button>
        </form>
    </div>
</div>
<br>
@endsection