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
                            <th scope="col"> {{ 'NOTA FINAL' }} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disciplinas as $disciplina)
                        <tr>
                            <th scope="row"> {{$disciplina->disciplina_nome}} </th>
                                @foreach ($avaliacoes as $avaliacao)
                                    @if ($avaliacao->disciplina_id == $disciplina->disciplina_id)
                                        @foreach ($notas_periodos as $nota_periodo)
                                            @if ($nota_periodo->avaliacao_id == $avaliacao->avaliacao_id && $nota_periodo->disciplina_id == $avaliacao->disciplina_id)
                                                <td> {{ $nota_periodo->valor_nota }} </td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                @foreach ($notas_finais as $nota_final)
                                    @if ($nota_final['disciplina_id'] == $disciplina->disciplina_id)
                                        <td> {{$nota_final['valor_nota']}} </td>
                                    @endif
                                @endforeach
                        </tr>
                    @endforeach
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
