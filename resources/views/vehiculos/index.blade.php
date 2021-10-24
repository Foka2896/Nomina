<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vehiculo</title>
</head>
<body>
    <br>
    <br>
    <div class="container">
    <h4>
        Creación de Vehiculo
    </h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('vehiculo.index')}}" method="get">
                <div class="form-row">
                    <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto" value="{{$texto}}">
                    </div>
                    <div class="col-auto my-2">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </div>
                    <div class="col-auto my-2">
                        <a href="{{route('vehiculo.create')}}" class="btn btn-success">Crear Registo</a> <a href="/" class="btn btn-dark">Volver</a>
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
                            <th>Placa</th> 
                            <th>Opciones</th> 
                         </tr>
                    </thead>
                    <tbody>
                        @if (count ($vehiculos)<=0)
                            <tr>
                                <td colspan="5">No hay resultado</td>
                            </tr>
                            @else
                        
                        @foreach ($vehiculos as $vehiculo)

                        <tr>
                            <td>{{$vehiculo-> id}}</td>
                            <td>{{$vehiculo-> placa}}</td>
                            <td><a href="{{route('vehiculo.edit',$vehiculo->id)}}" class="btn btn-warning btn-sm">Editar</a> 
                            <form action="{{route('vehiculo.edit', $vehiculo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                           <br>
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                        </tr>              
                        </form>             
                        @endforeach
                        @endif
                    </tbody>
                    {{$vehiculos->links()}}
                </table>
            </div>
        </div>
        
    </div>
    </div>
</body>
</html>