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
            <a href="{{ route ('reserveIndex')}}" class="btn btn-primary ">Voltar</a>
          </nav> <br><br><br><br><br>

          @if (Session()->get('notificationMessage'))
            @php
                echo "<div class='alert alert-warning in'>";
                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                echo Session()->get('notificationMessage');
                echo "</div>";
                \App\Util\Notification::setNotification();
            @endphp
          @endif

          <form role="form" method="POST" action="{{ route('reserveUpdate') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputEmail1">Apartamento</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reserve->apartment->name }}" disabled>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Endereço</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reserve->apartment->address_complete.', '.
                $reserve->apartment->address_city.'-'.$reserve->apartment->address_state }}" disabled>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="reserve_id" name="reserve_id" value="{{ $reserve->id }}" hidden>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Descrição da Reserva</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ $reserve->description }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Data da reserva</label>
                <input type="date" class="form-control" value="{{ $reserve->reserve_date }}"
                id="reserve_date" name="reserve_date"/>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
            </div><br><br><br>


            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('reserveIndex') }}" type="submit" class="btn btn-danger ">Cancelar</a>
            </div>
          </form>
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif

      </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>
<script>
 $('reserve_date').datepicker({format: "dd/mm/yyyy"});
</script>
</body>
</html>
