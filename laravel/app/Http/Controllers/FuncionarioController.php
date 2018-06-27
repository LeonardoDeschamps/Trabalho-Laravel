<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class FuncionarioController extends Controller {

    public function lista() {
        $funcionarios = DB::select('select IDFuncionario, Nome, Sobrenome from funcionarios');
        return view('funcionario.listagem')->withFuncionarios($funcionarios);
    }

    public function excluir($id) {
        $funcionario = DB::select('select Nome, Sobrenome from funcionarios where IDFuncionario = ?', [$id]);
        DB::table('funcionarios')->where('IDFuncionario', '=', $id)->delete();
        return view('funcionario.excluido')->with('f', $funcionario[0]);
    }

    public function visualizar($id) {
        $resposta = DB::select('select IDFuncionario, Nome, Sobrenome from funcionarios where IDFuncionario = ?', [$id]);
        $return = !empty($resposta) ? view('funcionario.detalhes')->with('f', $resposta[0]) : "Este funcionário não existe";
        return $return;
    }

    public function novo() {
        return view('funcionario.formulario');
    }
    
    public function alterar($id) {
        $funcionario = DB::select('select IDFuncionario, Nome, Sobrenome from funcionarios where IDFuncionario = ?', [$id]);
        return view('funcionario.formulario')->with('f', $funcionario[0]);
    }

    public function adiciona() {
        $funcionario = new \stdClass();
        $funcionario->nome = Request::input('nome');
        $funcionario->sobrenome = Request::input('sobrenome');
        DB::table('funcionarios')->insert([
            'IDFuncionario' => DB::select('select 1 + max(IDFuncionario) as id from funcionarios')[0]->id,
            'Nome' => $funcionario->nome,
            'Sobrenome' => $funcionario->sobrenome
        ]);
        return view('funcionario.adicionado')->with('f', $funcionario);
    }
    
    public function altera() {
        $id = Request::input('id');
        $funcionario = new \stdClass();
        $funcionario->nome = Request::input('nome');
        $funcionario->sobrenome = Request::input('sobrenome');
        DB::table('funcionarios')->where('IDFuncionario', '=', $id)->update([
            'Nome' => $funcionario->nome,
            'Sobrenome' => $funcionario->sobrenome
        ]);
        return view('funcionario.alterado')->with('f', $funcionario);
    }

}