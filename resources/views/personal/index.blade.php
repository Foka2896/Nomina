<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Personal</title>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <h4>
            Creación de personal
        </h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('personal.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-2">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-2">
                            <a href="{{route('personal.create')}}" class="btn btn-success">Crear Registo</a> 
                            <a href="/" class="btn btn-dark">Volver</a>
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cargo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count ($personales)<=0) <tr>
                                <td colspan="5">No hay resultado</td>
                                </tr>
                                @else

                                @foreach ($personales as $personal)

                                <tr>
                                    <td>{{$personal-> id}}</td>
                                    <td>{{$personal-> Nombre}}</td>
                                    <td>{{$personal-> Apellido}}</td>
                                    <td>{{$personal-> Cargo}}</td>
                                    <td><a href="{{route('personal.edit',$personal->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{route('personal.destroy', $personal->id)}}" onclick="return eliminarAlumno('Esta segura de eliminar esta persona')" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                </tr>
                                </form>
                                @endforeach
                                @endif
                        </tbody>
                        {{$personales->links()}}
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