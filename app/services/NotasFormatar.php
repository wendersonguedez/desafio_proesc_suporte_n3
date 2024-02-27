<?php

namespace App\Services;

Class NotasFormatar {
    public function formataNotasPeriodos($notas, $criterio_avaliativo)
    {
        if (!empty($notas)) {
            foreach ($notas as $nota) {
                $nota->valor_nota = $this->arredondaNota($nota->valor_nota, $criterio_avaliativo->arredondamento_id);
            }
        }

        return $notas;
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
}