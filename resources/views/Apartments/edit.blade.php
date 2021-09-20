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
            <a href="{{ route ('apIndex')}}" class="btn btn-primary ">Voltar</a>
          </nav> <br><br><br><br><br>

          <form role="form" method="POST" action="{{ route ('apUpdate') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nome do Apartamento</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Penthouse Cobertura" value="{{ $apartment->name }}">
            </div>

            <input value="{{ $apartment->id }}" name="id" id="id"  hidden>

            <div class="form-group">
                <label for="exampleInputEmail1">Quantidade de Cômodos</label>
                <input type="number" class="form-control" id="rooms" name="rooms" value="{{ $apartment->rooms }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Endereço Completo</label>
                <input type="text" class="form-control" id="address_complete" name="address_complete" placeholder="Rua Centenaria 112" value="{{ $apartment->address_complete }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Cidade</label>
                <input type="text" class="form-control" id="address_city" name="address_city" placeholder="Curitiba" value="{{ $apartment->address_city }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Estado</label>
                <select id="address_state" name="address_state" class="form-control">
                    <option selected value="{{ $apartment->name }}">{{ $apartment->address_state }}</option>
                    <option value="PR">PR</option>
                </select>
            </div>

            <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('apIndex') }}" type="submit" class="btn btn-danger ">Cancelar</a>
            </div>
          </form>

      </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
