<?php

use App\Services\NotasFormatar;

class BoletimController extends BaseController {
 
    public function visualizarBoletim()
    {
        $dados_aluno = Pessoa::select('pessoas.nome as nome', 'turmas.id as turma_id', 'turmas.nome as turma_nome', 'turmas.criterio_avaliativo_id as criterio_avaliativo_id')
            ->join('matriculas', 'pessoas.id', '=', 'matriculas.pessoa_id')
            ->join('turmas', 'matriculas.turma_id', '=', 'turmas.id')
            ->where('matriculas.id', 1)
            ->first();

        $notas_periodos = Nota::select(
            'criterios_avaliativos.arredondamento_id as arredondamento_id',
            'criterios_avaliativos.calculo_id as calculo_id',
            'notas.nota as valor_nota',
            'avaliacoes.nome as avaliacao_nome',
            'disciplinas_bases.nome as disciplina_base_nome',
            'periodos.nome as periodo_nome'
            )
            ->join('matriculas', 'notas.matricula_id', '=', 'matriculas.id')
            ->join('avaliacoes', 'notas.avaliacao_id', '=', 'avaliacoes.id')
            ->join('diarios', 'avaliacoes.diario_id', '=', 'diarios.id')
            ->join('periodos', 'diarios.periodo_id', '=', 'periodos.id')
            ->join('disciplinas', 'avaliacoes.disciplina_id', '=', 'disciplinas.id')
            ->join('disciplinas_bases', 'disciplinas.disciplina_base_id', '=', 'disciplinas_bases.id')
            ->join('turmas', 'matriculas.turma_id', '=', 'turmas.id')
            ->join('criterios_avaliativos', 'turmas.criterio_avaliativo_id', '=', 'criterios_avaliativos.id')
            ->join('calculos', 'criterios_avaliativos.calculo_id', '=', 'calculos.id')
            ->join('arredondamentos', 'criterios_avaliativos.arredondamento_id', '=', 'arredondamentos.id')
            ->where('matriculas.id', '=', 1)
            ->groupBy('notas.nota', 'avaliacoes.nome', 'disciplinas_bases.nome', 'periodos.nome', 'criterios_avaliativos.arredondamento_id', 'criterios_avaliativos.calculo_id')
            ->orderBy('disciplinas_bases.nome')
            ->orderBy('periodos.nome')
            ->get();

        $disciplinas = Disciplina::select(
            'disciplinas.id as disciplina_id',
            'disciplinas_bases.nome as disciplina_nome',
            'pessoas.nome as docente_nome'
        )
        ->join('disciplinas_bases', 'disciplinas.disciplina_base_id', '=', 'disciplinas_bases.id')
        ->join('docentes', 'disciplinas.docente_id', '=', 'docentes.id')
        ->join('pessoas', 'docentes.pessoa_id', '=', 'pessoas.id')
        ->where('disciplinas.turma_id', '=', $dados_aluno->turma_id)
        ->get();

        $criterio_avaliativo = CriterioAvaliativo::find($dados_aluno->criterio_avaliativo_id);

        $diarios = Diario::select('diarios.id as diario_id', 'periodos.id as periodo_id', 'periodos.nome as periodo_nome')
            ->join('periodos', 'diarios.periodo_id', '=', 'periodos.id')
            ->where('diarios.turma_id', $dados_aluno->turma_id)
            ->get();

        if  (!empty($notas_periodos)) {
            $notas_formatar = new NotasFormatar();
            $notas_periodos_formatadas = $notas_formatar->formataNotasPeriodos($notas_periodos, $criterio_avaliativo);


            return View::make('relatorios.boletim')->with([
                'notas' => $notas_periodos_formatadas,
                'aluno' => $dados_aluno,
                'diarios' => $diarios
            ]);


            // de($notas_periodos_formatadas->toArray());
        }

    }

}