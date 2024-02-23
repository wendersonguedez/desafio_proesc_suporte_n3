<?php

class ArredondamentoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('arredondamentos')->delete();

        Arredondamento::create(array(
            'nome' => 'FRAÇÕES MAIORES QUE 0,5 SÃO ARREDONDADAS PARA CIMA'
        ));

        Arredondamento::create(array(
            'nome' => 'FRAÇÕES MAIORES QUE 0,7 SÃO ARREDONDADAS PARA CIMA'
        ));
    }
}