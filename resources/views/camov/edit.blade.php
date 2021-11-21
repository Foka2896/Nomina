<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Camov</title>
</head>

<body>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        &nbsp;
        &nbsp;
        <h4>Editar Datos</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{ route('CodigoTransporte.update', $camov->id) }}" method="POST">
                    <div class="form-row">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="fecha">Fecha {{ $camov->Fecha }}</label>
                            <input type="date" class="form-control" name="fecha" required maxlength="30"
                                value="{{ old('fecha', $camov->Fecha) }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" name="codigo" required maxlength="30"
                                value="{{ old('fecha', $camov->Codigo) }}">
                        </div>
                        <div class="form-group">
                            <label for="text">Placa</label>
                            <input type="text" class="form-control" name="placa" required maxlength="30"
                                value="{{ old('fecha', $camov->Placa) }}">
                        </div>
                        <div class="form-group">
                            <label for="number">Caja</label>
                            <input type="number" class="form-control" name="caja" required maxlength="30"
                                value="{{ old('fecha', $camov->Caja) }}">
                        </div>
                    </div>

                    <div class="col-auto my-2">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <a href={{ url()->previous() }} class="btn btn-dark">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        </form>

</body>

</html>
