<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crear Registro</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h4> Creación de Vehiculo</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('personalxvehiculo.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="fecha" required maxlength="30">
                    </div>
                    <div class="form-group">
                        <label>Conductor</label>
                        <select class="form-select" aria-label="Default select example" name="nombreconductor">
                            <option selected>Selecione un conductor</option>
                            @foreach ($conductor as $conductors)
                                <option value="{{ $conductors->id }}">{{ $conductors->Nombre }}
                                    {{ $conductors->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="conductor" style="display:none">
                        <label>Conductor 2</label>
                        <select class="form-select" aria-label="Default select example" name="nombreconductor2"
                            id="nombreconductor2">
                            <option selected>Selecione un conductor</option>
                            @foreach ($conductor as $conductors)
                                <option value="{{ $conductors->id }}">{{ $conductors->Nombre }}
                                    {{ $conductors->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="crear(1,1)">Crear</button>
                    <button type="button" class="btn btn-danger" onclick="eliminar(1,1)">Eliminar</button>
                    <div class="form-group">
                        <label>Vendedor</label>
                        <select class="form-select" aria-label="Default select example" name="nombrevendedor">
                            <option selected>Selecione un vendedor</option>
                            @foreach ($vendedor as $vendedors)
                                <option value="{{ $vendedors->id }}">{{ $vendedors->Nombre }}
                                    {{ $vendedors->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Auxiliar</label>
                        <select class="form-select" aria-label="Default select example" name="nombreauxiliar">
                            <option selected>Selecione un auxiliar</option>
                            @foreach ($auxiliar as $auxiliars)
                                <option value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}
                                    {{ $auxiliars->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="auxiliar" style="display: none;">
                        <label>Auxiliar 2</label>
                        <select class="form-select" aria-label="Default select example" name="nombreauxiliar2"
                            id="nombreauxiliar2">
                            <option selected>Selecione un auxiliar</option>
                            @foreach ($auxiliar as $auxiliars)
                                <option value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}
                                    {{ $auxiliars->Apellido }}</option>
                            @endforeach
                        </select>

                    </div>
                    <button type="button" class="btn btn-primary" onclick="crear(2,2)">Crear</button>
                    <button type="button" class="btn btn-danger" onclick="eliminar(2,2)">Eliminar</button>
                    <div class="form-group">
                        <label for="placa">Referencia CAMOV</label>
                        <select class="form-select" aria-label="Default select example" name="vehiculo">
                            <option selected>Selecione un Transporte</option>
                            @foreach ($transporte as $transportes)
                                <option value="{{ $transportes->id }}"> Transporte: {{ $transportes->Codigo }},
                                    Placa: {{ $transportes->Placa }},Caja: {{ $transportes->Caja }} </option>
                            @endforeach
                        </select>
                    </div>
                    <br>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Selecione vehiculo y cajas manual
                    </button>

                    <br>
                    <br>
                    <a class="btn btn-outline-secondary" href="{{ route('personal.create') }}">Creación de personal</a>
                    <input type="submit" class="btn btn-primary" value="Guardar">
                    <input type="reset" class="btn btn-dark" value="Cancelar">
                    <a class="btn btn-danger" href="{{ route('personalxvehiculo.index') }}">Ir atrás</a>
            </div>
            </form>
        </div>
        <div>
            <!-- Modal -->
            <form action="{{ route('personalxvehiculo.temp') }}" method="POST">
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nombre">Vehiculo</label>
                                    <select class="form-select" aria-label="Default select example" name="vehiculo">
                                        <option selected>Selecione una placa</option>
                                        @foreach ($vehiculo as $vehiculos)
                                            <option value="{{ $vehiculos->id }}"> Placa:
                                                {{ $vehiculos->placa }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="caja">Cajas</label>
                                    <input type="text" class="form-control" name="caja" require maxlength="50">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

    $('#myModal').modal({
        keyboard: false
    })
</script>

</html>
