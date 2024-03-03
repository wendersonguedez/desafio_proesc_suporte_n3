<?php

use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File;

class PessoasController extends BaseController
{

    public function visualizarFormulario()
    {
        return View::make('formularios.cadastro');
    }

    public function cadastrarPessoa()
    {
        $rules = array(
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|unique:pessoas',
            'telefone' => 'required|max:20'
        );

        $messages = array(
            'nome.required' => 'O campo Nome é obrigatório.',
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'O CPF já está em uso.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
        );

        $validator = Validator::make(Input::all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $pessoa = new Pessoa;
            $pessoa->nome = Input::get('nome');
            $pessoa->email = Input::get('email');
            $pessoa->cpf = Input::get('cpf');
            $pessoa->telefone = Input::get('telefone');
            $pessoa->grupo_id = 2;
            $pessoa->save();
        }

        return Redirect::to('/cadastro')->with('success', 'Cadastro realizado com sucesso!');
    }

    public function visualizarFormularioExcel()
    {
        return View::make('formularios.cadastro-excel');
    }

    public function inserirUsuariosDoArquivoExcel()
    {
        $firstLine = true;

        $grupos = [
            "RESPONSAVEL" => 1,
            "ESTUDANTE" => 2,
            "DOCENTE" => 3
        ];

        $file = $_FILES['excel'];

        $dataFile = fopen($file['tmp_name'], 'r');

        while ($row = fgetcsv($dataFile, 1000, ",")) {
            if (!empty($row)) {

                if ($firstLine) {
                    $firstLine = false;
                    continue;
                }

                $nome = trim($row[0]);
                $email = trim($row[1]);
                $cpf = trim($row[2]);
                $telefone = trim($row[3]);
                $grupo_tipo = trim($row[4]);

                // Substituir o valor do tipo de grupo pelo ID correspondente usando array de mapeamento
                if (isset($grupos[$grupo_tipo])) {
                    $grupo_id = $grupos[$grupo_tipo];
                } else {
                    return;
                }

                $query = Pessoa::insert(
                    array(
                        'nome' => $nome,
                        'email' => $email,
                        'cpf' => $cpf,
                        'telefone' => $telefone,
                        'grupo_id' => $grupo_id
                    )
                );
            }
            return Redirect::back()->with('success', 'Cadastro realizado com sucesso!');
        }
    }
}