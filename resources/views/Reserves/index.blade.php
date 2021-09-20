<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva de Apartamentos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body style="background-color:snow;">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Reservas de Apartamento</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </nav>
          <a href="{{ route ('apIndex')}}" class="btn btn-info ">Apartamentos</a><br><br><br><br><br>


        <table class="table dark table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Data da Reserva</th>
                <th scope="col">Apartamento</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($reserves as $reserve)
              <tr>
                <td>{{ $reserve->description }}</td>
                <td>{{ \Carbon\Carbon::parse($reserve->reserve_date)->format('d/m/Y') }}</td>
                <td>{{ $reserve->apartment->name }}</td>
                <td>{{ $reserve->apartment->address_complete.', '.
                    $reserve->apartment->address_city.'-'.$reserve->apartment->address_state }}
                </td>
                <td>
                    <a href="{{ route ('reserveEdit', $reserve->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route ('reserveDestroy', $reserve->id)}}" class="btn btn-danger">Excluir</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
      </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
