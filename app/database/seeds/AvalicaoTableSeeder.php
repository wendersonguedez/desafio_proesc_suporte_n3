<?php

class AvaLiacaoTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('avaliacoes')->delete();
 
        AvaLiacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 1
        ));

        AvaLiacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 1
        ));

        AvaLiacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 1
        ));

        AvaLiacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 1
        ));

        AvaLiacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 2
        ));

        AvaLiacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 2
        ));

        AvaLiacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 2
        ));

        AvaLiacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 2
        ));

        AvaLiacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 3
        ));

        AvaLiacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 3
        ));

        AvaLiacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 3
        ));

        AvaLiacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 3
        ));

        AvaLiacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 4
        ));

        AvaLiacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 4
        ));

        AvaLiacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 4
        ));

        AvaLiacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 4
        ));

        AvaLiacao::create(array(
            'nome' => 'AV1',
            'diario_id' => 1,
            'disciplina_id' => 5
        ));

        AvaLiacao::create(array(
            'nome' => 'AV2',
            'diario_id' => 2,
            'disciplina_id' => 5
        ));

        AvaLiacao::create(array(
            'nome' => 'AV3',
            'diario_id' => 3,
            'disciplina_id' => 5
        ));

        AvaLiacao::create(array(
            'nome' => 'AV4',
            'diario_id' => 4,
            'disciplina_id' => 5
        ));
    }
}