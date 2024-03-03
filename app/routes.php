<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/boletim', 'BoletimController@visualizarBoletim');
Route::get('/cadastro', 'PessoasController@visualizarFormulario');
Route::post('/cadastrar-pessoa', 'PessoasController@cadastrarPessoa');

Route::get('/formulario-excel', 'PessoasController@visualizarFormularioExcel');
Route::post('/upload-excel', 'PessoasController@inserirUsuariosDoArquivoExcel');