<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <h4>Registro Camov</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{url('camov/importdata')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="texto" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-2">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-2">
                            <a href="{{route('camov.create')}}" class="btn btn-success">Crear Registo</a>
                            <a href="/" class="btn btn-dark">Volver</a>
                            <a href="" class="btn btn-outline-success">
                                <i class="fas fa-file-excel">&nbsp;&nbsp;</i>Generar Excel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <form action="{{route('camov.importExcel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (Session::has('message'))
            <p>{{ Session::get('message')}}</p>
            @endif
            <input type="file" name="file">
            <button type="submit" class="btn btn-outline-secondary">Importar Camov</button>
        </form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Codigo</th>
                        <th scope="col">Placa</th>
                        <th scope="col">Cajas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($codigoTransporte as $codigoTransportes)
                    <tr>
                        <th scope="row">{{ $codigoTransportes->id }}</th>
                        
                        <td>{{ $codigoTransportes->Codigo }}</th>
                        <td>{{ $codigoTransportes->Placa }}</th>
                        <td>{{ $codigoTransportes->Caja }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $codigoTransporte->links() !!}
            </div>
        </div>
</body>

</html>
