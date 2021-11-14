<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Nomina</title>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <h4>
            Nomina
        </h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('personalxvehiculo.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-2">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-2">
                            <a href="{{route('personalxvehiculo.create')}}" class="btn btn-success">Crear Registo</a> <a href="/" class="btn btn-dark">Volver</a>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lx-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Codigo</th>
                                <th>Placa</th>
                                <th>Cantidad</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($personalxvehiculos) == null)
                            <tr>
                                <td colspan="6">No hay resultado</td>
                            </tr>
                            @else

                            @foreach ($personalxvehiculos as $personalxvehiculo)

                            <tr>
                                <td>{{$personalxvehiculo-> id}}</td>
                                <td>{{$personalxvehiculo-> fecha_diaria}}</td>
                                <td>{{$personalxvehiculo-> Codigo}}</td>
                                <td>{{$personalxvehiculo-> Placa}}</td>
                                <td>{{$personalxvehiculo-> Caja}}</td>
                                <td>
                                    <a href="{{route('personalxvehiculo.edit',$personalxvehiculo->transportes_Id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{route('personalxvehiculo.show',$personalxvehiculo->transportes_Id)}}" class="btn btn-secondary btn-sm">Ver</a>
                                    <form action="{{route('personalxvehiculo.destroy', $personalxvehiculo->id)}}" onclick="return eliminarAlumno('Esta segura de eliminar este registro')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                            </tr>
                        </form>
                            @endforeach
                            @endif
                        </tbody>
                        {{$personalxvehiculos->links()}}
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    function eliminarAlumno(value) {
        action = confirm(value) ? true : event.preventDefault()
    }
</script>
</html>
