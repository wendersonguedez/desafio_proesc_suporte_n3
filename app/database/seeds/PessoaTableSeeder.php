<?php

class PessoaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('pessoas')->delete();
 
        Pessoa::create(array(
            'nome' => '1A'
        ));
    }
}