@extends('layouts.panel')

@section('styles')
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Actualizar horario</h6>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible text-white fade show" role="alert">
                                <span class="alert-icon align-middle">
                                    <span class="material-icons text-md">
                                        warning
                                    </span>
                                </span>
                                <span class="alert-text"><strong>Por favor!!</strong> {{ $error }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @else
                    @endif
                    <form method="POST" action="{{ url('/horarios/'.$horario->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-control">
                            <div class="input-group input-group-dynamic mb-4">
                                <label for="nombre" class="form-label">NOMBRE</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre',$horario->nombre_horario) }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group input-group-dynamic mb-4">
                                <label for="hora" class="form-label">HORA</label>
                                <input type="time" name="hora" class="form-control" value="{{ old('hora',$horario->hora ) }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-control">
                            <div class="input-group input-group-dynamic mb-4">
                                <label for="descripcion" class="form-label">DESCRIPCION</label>
                                <input type="text" name="descripcion" class="form-control"
                                    value="{{ old('descripcion',$horario->descripcion) }}">
                            </div>
                        </div>
                        <!-- Opciones del select con estilos de Creative Tim y Bootstrap -->
                        <!-- Aplicar Chosen al elemento select -->
                        <div class="input-group input-group-static mb-4">
                            <label for="dispositivo_id">DISPOSITIVO:</label>
                            <select class="form-control " name="dispositivo_id" required>
                                @foreach ($dispositivos as $dispositivo)
                                    <option value="{{ $dispositivo->id }}" {{ $dispositivo->id == $horario->dispositivo_id ? 'selected' : '' }}>
                                        {{ $dispositivo->nombre_dispositivo }}: {{$dispositivo->descripcion}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-control">
                            <label for="dispositivo_id">DISPOSITIVO:</label>
                            <select class="selectpicker" name="{{$dispositivo->id}}">
                                @foreach ($dispositivos as $dispositivo)
                                    <option value="{{ $dispositivo->id }}">{{ $dispositivo->nombre_dispositivo }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="input-group input-group-static mb-4">
                            <label for="dispositivo_id">DISPOSITIVO:</label>
                            <select class="form-control selectpicker" name="dispositivo_id" data-live-search="true" required>
                                @foreach ($dispositivos as $dispositivo)
                                    <option value="{{ $dispositivo->id }}">{{ $dispositivo->nombre_dispositivo }}: {{$dispositivo->descripcion}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                        <a href="{{ url('/horarios') }}" type="button" class="btn btn-outline-success" title="Regresar"><i
                                class="material-icons">arrow_back</i></a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS and Bootstrap Select JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Bootstrap Select JS translation files -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> --}}
@endsection
