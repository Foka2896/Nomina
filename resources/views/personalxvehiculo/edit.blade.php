<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Registro</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h4> Edicion Personal Por Vehiculo Vehiculo</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('personalxvehiculo.update', $id ) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="{{ $fecha }}" required maxlength="30">
                    </div>

                    @foreach ($personalitem as $key=>$value)

                    <div class="form-group">
                        <label>Personal {{ $key+1 }}</label>
                        <select class="form-select" aria-label="Default select example" name="nomper{{ $key+1 }}">
                            <option value="0">Seleccione un personal</option>
                            @foreach ($personal as $personals)
                            <option @if ($value==$personals->id) selected @endif value="{{ $personals->id }}">
                                {{ $personals->Nombre }}
                                {{ $personals->Apellido }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    @endforeach

                    <div class="form-group">
                        <label for="placa">Vehiculo</label>
                        <select class="form-select" aria-label="Default select example" name="vehiculo">
                        <option value="0">Seleccione un Vehiculo</option>
                            @foreach ($transporte as $transportes)
                            <option @if ($transporteId==$transportes->id) selected @endif value="{{ $transportes->id }}">
                                {{ $transportes->Codigo }}
                                {{ $transportes->Placa }}
                                {{ $transportes->Caja }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-primary" value="Editar">
                        <input type="reset" class="btn btn-dark" value="Cancelar">
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