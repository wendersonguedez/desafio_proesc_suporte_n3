<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">CADASTRO</h2>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem'))
                            <div class="alert alert-success">{{ Session::get('mensagem') }}</div>
                        @endif

                        <form method="post" action="{{ url('/formulario') }}" class="form-horizontal">
                            {{-- {{ csrf_field() }} --}}

                            <div class="form-group">
                                <label for="nome" class="col-sm-4 control-label">Nome:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email:</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cpf" class="col-sm-4 control-label">CPF:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telefone" class="col-sm-4 control-label">Telefone:</label>
                                <div class="col-sm-8">
                                    <input type="tel" class="form-control" id="telefone" name="telefone" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
