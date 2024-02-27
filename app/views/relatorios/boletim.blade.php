<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>BOLETIM DE NOTAS</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">BOLETIM</h2>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered mb-4">
                <tbody>
                    <tr>
                        <th scope="row" class="text-left">ALUNO: {{ $aluno->nome }}</th>
                        <td class="text-left">TURMA: {{ $aluno->turma_nome }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center mb-3">NOTAS</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">DISCIPLINAS</th>
                        @foreach ($diarios as $diario)
                            <th scope="col"> {{ $diario->periodo_nome }} </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Matéria 1</th>
                        <td>8.5</td>
                        <td>7.8</td>
                        <td>9.2</td>
                        <td>8.9</td>
                    </tr>
                    <tr>
                        <th scope="row">Matéria 2</th>
                        <td>7.2</td>
                        <td>8.0</td>
                        <td>7.5</td>
                        <td>7.0</td>
                    </tr>
                    <tr>
                        <th scope="row">Matéria 3</th>
                        <td>9.0</td>
                        <td>9.5</td>
                        <td>8.8</td>
                        <td>8.5</td>
                    </tr>
                    <tr>
                        <th scope="row">Matéria 4</th>
                        <td>6.8</td>
                        <td>7.2</td>
                        <td>8.0</td>
                        <td>7.8</td>
                    </tr>
                    <tr>
                        <th scope="row">Matéria 5</th>
                        <td>8.2</td>
                        <td>8.7</td>
                        <td>9.3</td>
                        <td>8.6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
