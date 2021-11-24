<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edición personal</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h4> Edición Datos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('personal.update',$personal->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" name="Nombre" required maxlength="30" value="{{old('Nombre',$personal->Nombre)}}">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" name="apellido" require maxlength="50" value="{{$personal->Apellido}}">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" name="cargo" required maxlength="30" value="{{$personal->Cargo}}">
                    </div>
                    <div class="form-group">
                        <label for="cargo">CD</label>
                        <input type="text" class="form-control" name="cd" required maxlength="30" value="{{$personal->cd}}">
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
</body>

</html>
