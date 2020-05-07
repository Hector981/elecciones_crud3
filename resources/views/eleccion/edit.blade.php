@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper ">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO ELECCION {{$eleccion->id}}</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">

        <form class="text-center" method="post"  action="{{ route('eleccion.update', $eleccion->id) }}"  enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="periodo">Periodo:</label>
                    <input type="text"
                    value="{{$eleccion->periodo}}"
                    class="form-control"
                    name="periodo" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="fecha">Fecha:</label>
                    <input type="date"
                    value="{{$eleccion->fecha}}"
                    class="form-control"
                    name="fecha" />
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="fechaapertura">Fecha apertura:</label>
                    <input type="date"
                    value="{{$eleccion->fechaapertura}}"
                    class="form-control"
                    name="fechaapertura" />
                    </div>
                </div>
            </div>

                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="horaapertura">Hora apertura:</label><br>
                    <input type="time"
                    value="{{$eleccion->horaapertura}}"
                    class="form-control"
                    name="horaapertura" />
                    </div>
                </div>
            </div>

                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="fechacierre">Fecha cierre:</label>
                    <input type="date"
                    value="{{$eleccion->fechacierre}}"
                    class="form-control"
                    name="fechacierre" />
                    </div>
                </div>
            </div>

                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="horacierre">Hora cierre:</label><br>
                    <input type="time"
                    value="{{$eleccion->horacierre}}"
                    class="form-control"
                    name="horacierre" />
                    </div>
                </div>
            </div>

                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="observaciones">Observaciones:</label>
                    <input type="text"
                    value="{{$eleccion->observaciones}}"
                    class="form-control"
                    name="observaciones" />
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">GUARDAR</button>
        </form>
    </div>
</div>
<br>
@endsection
