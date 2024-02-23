<?php

class TurmaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('turmas')->delete();
 
        Turma::create(array(
            'nome' => '7A',
            'criterio_avalliativo_id' => 2
        ));
    }
}