<?php

class NotaTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('notas')->delete();
 
        Nota::create(array(
            'nome' => '1A'
        ));
    }
}