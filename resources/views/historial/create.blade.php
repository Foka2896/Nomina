<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Generar Informe</title>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h4>Generar Informe</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('historial.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="fInicial">Fecha Inicial</label>
                        <input type="date" class="form-control" name="fInicial" required>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="fFinal">Fecha Final</label>
                        <input type="date" class="form-control" name="fFinal" required>
                    </div>
                    <div class="form-group my-2">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-dark" value="Cancelar">
                        <a href="/" class="btn btn-dark">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>