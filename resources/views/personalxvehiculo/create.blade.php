<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <form action="{{route('personalxvehiculo.store')}}" method="POST">
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
                            <option value="{{ $conductors->id }}">{{ $conductors->Nombre }} {{ $conductors->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="conductor" style="display:none">
                        <label>Conductor 2</label>
                        <select class="form-select" aria-label="Default select example" name="nombreconductor2" id="nombreconductor2">
                            <option selected>Selecione un conductor</option>
                            @foreach ($conductor as $conductors)
                            <option value="{{ $conductors->id }}">{{ $conductors->Nombre }}  {{ $conductors->Apellido }}</option>
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
                            <option value="{{ $vendedors->id }}">{{ $vendedors->Nombre }}  {{ $vendedors->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Auxiliar</label>
                        <select class="form-select" aria-label="Default select example" name="nombreauxiliar">
                            <option selected>Selecione un auxiliar</option>
                            @foreach ($auxiliar as $auxiliars)
                            <option value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}  {{ $auxiliars->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="auxiliar" style="display: none;">
                        <label>Auxiliar 2</label>
                        <select class="form-select" aria-label="Default select example" name="nombreauxiliar2" id="nombreauxiliar2">
                            <option selected>Selecione un auxiliar</option>
                            @foreach ($auxiliar as $auxiliars)
                            <option value="{{ $auxiliars->id }}">{{ $auxiliars->Nombre }}  {{ $auxiliars->Apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="crear(2,2)">Crear</button>
                    <button type="button" class="btn btn-danger" onclick="eliminar(2,2)">Eliminar</button>
                    <div class="form-group">
                        <label for="placa">Vehiculo</label>
                        <select class="form-select" aria-label="Default select example" name="vehiculo">
                            <option selected>Selecione un Transporte</option>
                            @foreach ($transporte as $transportes)
                            <option value="{{ $transportes->id }}">Transporte: {{ $transportes->Codigo }}, Placa: {{ $transportes->Placa }},Caja: {{ $transportes->Caja }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad de cajas</label>
                        <input type="text" class="form-control" name="cantidad" require maxlength="4">
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-dark" value="Cancelar">
                        <a class="btn btn-danger" href="{{route('personalxvehiculo.index')}}">Ir atrás</a>
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
