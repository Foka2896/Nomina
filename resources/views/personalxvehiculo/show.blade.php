<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mostar Registro</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h4> Mostar Personal Por Vehiculo Vehiculo</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('personalxvehiculo.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ $fecha }}" required
                            maxlength="30" disabled>
                    </div>
                    <div class="form-group">
                        <label>Conductor</label>
                        <select class="form-select" aria-label="Default select example" name="nombreconductor"
                            disabled>
                            @foreach ($conductor as $conductors)
                                @if ($conductorId == $conductors->id)
                                    <option selected value="{{ $conductors->id }}">{{ $conductors->Nombre }}
                                        {{ $conductors->Apellido }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if ($conductorId2 != 0)
                        <div class="form-group" id="conductor">
                            <label>Conductor 2</label>
                            <select class="form-select" aria-label="Default select example" name="nombreconductor2"
                                id="nombreconductor2" disabled>
                                @foreach ($conductor as $conductors)
                                    @if ($conductorId2 == $conductors->id)
                                        <option selected value="{{ $conductors->id }}">{{ $conductors->Nombre }}
                                            {{ $conductors->Apellido }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Vendedor</label>
                        <select class="form-select" aria-label="Default select example" name="nombrevendedor"
                            disabled>
                            @foreach ($vendedor as $vendedors)
                                @if ($vendedorId == $vendedors->id)
                                    <option seleted value="{{ $vendedors->id }}">{{ $vendedors->Nombre }}
                                        {{ $vendedors->Apellido }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Auxiliar</label>
                        <select class="form-select" aria-label="Default select example" name="nombreauxiliar"
                            disabled>
                            @foreach ($auxiliar as $auxiliars)
                                @if ($auxiliarId == $auxiliars->id)
                                    <option selected value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}
                                        {{ $auxiliars->Apellido }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if ($auxiliarId2 != 0)
                        <div class="form-group" id="auxiliar">
                            <label>Auxiliar 2</label>
                            <select class="form-select" aria-label="Default select example" name="nombreauxiliar2"
                                id="nombreauxiliar2" disabled>
                                @foreach ($auxiliar as $auxiliars)
                                    @if ($auxiliarId2 == $auxiliars->id)
                                        <option selected value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}
                                            {{ $auxiliars->Apellido }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="placa">Vehiculo</label>
                        <select class="form-select" aria-label="Default select example" name="vehiculo" disabled>
                            @if ($transporte->id == $transporte->id)
                                <option selected value="{{ $transporte->id }}">Transporte:
                                    {{ $transporte->Codigo }},
                                    Placa: {{ $transporte->Placa }},Caja: {{ $transporte->Caja }}</option>
                            @endif
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="cantidad">Cantidad de cajas</label>
                        <input type="text" class="form-control" name="cantidad" disabled>
                    </div>

                    <div class="form-group my-2">
                        <a class="btn btn-danger" href="{{ route('personalxvehiculo.index') }}">Ir atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    function crear($indice, $estado) {
        if ($indice == 1 && $estado == 1) {
            document.getElementById("conductor").style.display = "block";
        } else if ($indice == 2 && $estado == 2) {
            document.getElementById("auxiliar").style.display = "block";
        }
    }

    function eliminar($indice, $estado) {
        if ($indice == 1 && $estado == 1) {
            document.getElementById("conductor").style.display = "none";
        } else if ($indice == 2 && $estado == 2) {
            document.getElementById("auxiliar").style.display = "none";
        }
    }
</script>

</html>
