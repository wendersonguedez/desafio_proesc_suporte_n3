<?php

class MatriculaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('matriculas')->delete();
 
        Turma::create(array(
            'nome' => '1A'
        ));
    }
}