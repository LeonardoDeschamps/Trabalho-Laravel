<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout.principal');
});

Route::get('/funcionarios', 'FuncionarioController@lista');

Route::get('/funcionarios/alterar/{id?}', 'FuncionarioController@alterar')->where('id', '[0-9]+');

Route::get('/funcionarios/altera', 'FuncionarioController@altera');

Route::get('/funcionarios/excluir/{id?}', 'FuncionarioController@excluir')->where('id', '[0-9]+');

Route::get('/funcionarios/visualizar/{id?}', 'FuncionarioController@visualizar')->where('id', '[0-9]+');

Route::get('/funcionarios/novo', 'FuncionarioController@novo');

Route::get('/funcionarios/adiciona', 'FuncionarioController@adiciona');

Route::get('/regioes', 'RegiaoController@lista');

Route::get('/regioes/alterar/{id?}', 'RegiaoController@alterar')->where('id', '[0-9]+');

Route::get('/regioes/altera', 'RegiaoController@altera');

Route::get('/regioes/excluir/{id?}', 'RegiaoController@excluir')->where('id', '[0-9]+');

Route::get('/regioes/visualizar/{id?}', 'RegiaoController@visualizar')->where('id', '[0-9]+');

Route::get('/regioes/novo', 'RegiaoController@novo');

Route::get('/regioes/adiciona', 'RegiaoController@adiciona');

Route::get('/territorios', 'TerritorioController@lista');

Route::get('/territorios/alterar/{id?}', 'TerritorioController@alterar')->where('id', '[0-9]+');

Route::get('/territorios/altera', 'TerritorioController@altera');

Route::get('/territorios/excluir/{id?}', 'TerritorioController@excluir')->where('id', '[0-9]+');

Route::get('/territorios/visualizar/{id?}', 'TerritorioController@visualizar')->where('id', '[0-9]+');

Route::get('/territorios/novo', 'TerritorioController@novo');

Route::get('/territorios/adiciona', 'TerritorioController@adiciona');

Route::get('/funcionario-territorio', 'FuncionarioTerritorioController@lista');

Route::get('/funcionario-territorio/alterar/{id?}', 'FuncionarioTerritorioController@alterar')->where('id', '[0-9]+_[0-9]+');

Route::get('/funcionario-territorio/altera', 'FuncionarioTerritorioController@altera');

Route::get('/funcionario-territorio/excluir/{id?}', 'FuncionarioTerritorioController@excluir')->where('id', '[0-9]+_[0-9]+');

Route::get('/funcionario-territorio/visualizar/{id?}', 'FuncionarioTerritorioController@visualizar')->where('id', '[0-9]+_[0-9]+');

Route::get('/funcionario-territorio/novo', 'FuncionarioTerritorioController@novo');

Route::get('/funcionario-territorio/adiciona', 'FuncionarioTerritorioController@adiciona');