<?php

namespace App\Services;

class NotasFormatar
{
    public function formataNotasPeriodos($notas, $criterio_avaliativo)
    {
        if (!empty($notas) && !empty($criterio_avaliativo)) {
            foreach ($notas as $nota) {
                $nota->valor_nota = $this->arredondaNota($nota->valor_nota, $criterio_avaliativo->arredondamento_id);
            }
        }

        return $notas;
    }

    /*public function calculaNotaFinal($notas, $disciplinas, $criterio_avaliativo)
    {
        if (!empty($notas) && !empty($disciplinas) && !empty($criterio_avaliativo)) {
            $array_notas = [];

            foreach ($disciplinas as $disciplina) {
                foreach ($notas as $nota) {
                    if ($nota->disciplina_id == $disciplina->disciplina_id) {
                        $array_notas[] = [
                            'valor_nota' => $nota->valor_nota,
                            'disciplina_id' => $nota->disciplina_id
                        ];
                    }
                }
            }

            return $this->{"calculo$criterio_avaliativo->calculo_id"}($array_notas, $criterio_avaliativo->arredondamento_id);
        }
    }*/

    public function calculaNotaFinal($notas, $disciplinas, $criterio_avaliativo)
    {
        if (!empty($notas) && !empty($disciplinas) && !empty($criterio_avaliativo)) {
            $array_notas = [];

            foreach ($disciplinas as $disciplina) {
                $nota_1bim = 0;
                $nota_2bim = 0;
                $nota_3bim = 0;
                $nota_4bim = 0;

                foreach ($notas as $nota) {
                    if ($nota->disciplina_id == $disciplina->disciplina_id) {
                        switch ($nota->periodo_id) {
                            case 1:
                                $nota_1bim = $nota->valor_nota;
                                break;
                            case 2:
                                $nota_2bim = $nota->valor_nota;
                                break;
                            case 3:
                                $nota_3bim = $nota->valor_nota;
                                break;
                            case 4:
                                $nota_4bim = $nota->valor_nota;
                                break;
                        }
                    }
                }

                // Calcula a nota final para a disciplina atual
                $nota_final = ($nota_1bim + $nota_2bim + ($nota_3bim * 2) + ($nota_4bim * 2)) / 6;

                $notaFinalArredondada = $this->arredondamento($nota_final);

                $array_notas[] = [
                    'valor_nota' => $notaFinalArredondada,
                    'disciplina_id' => $disciplina->disciplina_id
                ];
            }

            return $array_notas;
        }
    }

    public function arredondamento($nota)
    {
        $fracao = explode('.', $nota);
        $decimal = isset($fracao[1]) ? $fracao[1][0] : '';

        if ($decimal >= 7) {
            $notaArredondada = round($nota, 1);
        } else {
            $notaArredondada = $nota;
        }

        return number_format($notaArredondada, 2);
    }


    function calculo1($array_notas, $arredondamento_id)
    {
        $array_notas_finais = [];

        foreach ($array_notas as $nota) {
            $disciplina_id = $nota['disciplina_id'];

            if (!isset($array_notas_finais[$disciplina_id])) {
                $array_notas_finais[$disciplina_id] = [
                    'disciplina_id' => $disciplina_id,
                    'soma' => 0,
                    'contagem' => 0
                ];
            }

            $array_notas_finais[$disciplina_id]['soma'] += $nota['valor_nota'];
            $array_notas_finais[$disciplina_id]['contagem']++;
        }

        foreach ($array_notas_finais as &$nota_final) {
            $nota_final['valor_nota'] = $this->arredondaNota($nota_final['soma'] / $nota_final['contagem'], $arredondamento_id);
        }

        return $array_notas_finais;
    }

    function calculo2($array_notas, $arredondamento_id)
    {
        $array_notas_finais = [];

        foreach ($array_notas as $nota) {
            $disciplina_id = $nota['disciplina_id'];

            if (!isset($array_notas_finais[$disciplina_id])) {
                $array_notas_finais[$disciplina_id] = [
                    'disciplina_id' => $disciplina_id,
                    'soma' => 0
                ];
            }

            $array_notas_finais[$disciplina_id]['soma'] += $nota['valor_nota'];
        }

        foreach ($array_notas_finais as &$nota_final) {
            $nota_final['valor_nota'] = $this->arredondaNota($nota_final['soma'], $arredondamento_id);
        }

        return $array_notas_finais;
    }

    protected function arredondaNota($nota, $arredondamento_id)
    {
        if (!is_null($arredondamento_id) && !is_null($nota)) {
            return $this->{"arredondamento$arredondamento_id"}($nota);
        }

        return $nota;
    }

    protected function arredondamento1($valor_nota)
    {
        $valor_nota_arredondada = ceil($valor_nota);

        return $valor_nota_arredondada;
    }

    protected function arredondamento2($valor_nota)
    {
        $valor_nota_arredondada = floor($valor_nota);

        return $valor_nota_arredondada;
    }

    public function novoCalculoNotaFinal($notas)
    {
        if (!empty($notas)) {
            $notas_finais = [];

            foreach ($notas as $nota) {
                if ($nota->periodo_id = 1) {
                    $notas_finais[] = $nota->valor_nota;
                }
            }
        }
        return $notas;
    }

}