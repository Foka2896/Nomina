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
        <h4> Creación de personal</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('personal.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" name="nombre" required maxlength="30">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" require maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <select class="form-select" aria-label="Default select example" name="cargo">
                            <option selected>Seleccione un cargo</option>
                            <option value="Conductor">Conductor</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Auxiliar">Auxiliar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cd">Cd</label>
                        <input type="text" class="form-control" name="cd" require maxlength="50" required>
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-dark" value="Cancelar">
                        <a class="btn btn-danger" href="{{route('personal.index')}}">Ir atrás</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
