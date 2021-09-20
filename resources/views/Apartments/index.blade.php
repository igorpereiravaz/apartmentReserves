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
          <a href="{{ route ('apCreate')}}" class="btn btn-primary ">Cadastrar Apartamento</a>
          <a href="{{ route ('reserveIndex')}}" class="btn btn-info ">Ver Reservas</a><br><br><br><br><br>

          @if (Session()->get('notificationMessage'))
            @php
                echo "<div class='alert alert-danger in'>";
                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo Session()->get('notificationMessage');
                echo "</div>";
                \App\Util\Notification::setNotification();
            @endphp
          @endif

        <table class="table dark table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cômodos</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ação</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
              <tr>
                <td>{{ $apartment->name }}</td>
                <td>{{ $apartment->rooms }}</td>
                <td>{{ $apartment->address_complete.', '.
                    $apartment->address_city.'-'.$apartment->address_state }}
                </td>
                <td>
                    <a href="{{ route ('apEdit', $apartment->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route ('apDestroy', $apartment->id)}}" class="btn btn-danger">Excluir</a>
                    <a href="{{ route ('reserveCreate', $apartment->id)}}" class="btn btn-success">Reservar</a>
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
