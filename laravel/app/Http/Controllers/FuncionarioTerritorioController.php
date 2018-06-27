<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class FuncionarioTerritorioController extends Controller {

    public function lista() {
        $funcionariosTerritorios = DB::select('select IDFuncionario, IDTerritorio, DescricaoTerritorio, CONCAT(Nome, \' \', Sobrenome) AS funcionario from funcionarios_territorios join territorios using(IDTerritorio) join funcionarios using(IDFuncionario)');
        return view('funcionario-territorio.listagem')->withFuncionariosterritorios($funcionariosTerritorios);
    }

    public function excluir($id) {
        $arrayId = explode("_", $id);
        $funcionarioTerritorio = DB::select('select IDFuncionario, IDTerritorio, DescricaoTerritorio, CONCAT(Nome, \' \', Sobrenome) AS funcionario from funcionarios_territorios join territorios using(IDTerritorio) join funcionarios using(IDFuncionario) where IDFuncionario = ? AND IDTerritorio = ?', [$arrayId[0], $arrayId[1]]);
        DB::table('funcionarios_territorios')->where([['IDFuncionario', '=', $arrayId[0]], ['IDTerritorio', '=', $arrayId[1]]])->delete();
        return view('funcionario-territorio.excluido')->with('ft', $funcionarioTerritorio[0]);
    }

    public function visualizar($id) {
        $arrayId = explode("_", $id);
        $resposta = DB::select('select IDFuncionario, IDTerritorio, DescricaoTerritorio, CONCAT(Nome, \' \', Sobrenome) AS funcionario, DescricaoRegiao from funcionarios_territorios join territorios using(IDTerritorio) join funcionarios using(IDFuncionario) join regiao using(IDRegiao) where IDFuncionario = ? AND IDTerritorio = ?', [$arrayId[0], $arrayId[1]]);
        $return = !empty($resposta) ? view('funcionario-territorio.detalhes')->with('ft', $resposta[0]) : "Este território não existe";
        return $return;
    }

    public function novo() {
        $funcionarios = DB::select('select IDFuncionario, CONCAT(Nome, \' \', Sobrenome) AS funcionario from funcionarios');
        $territorios = DB::select('select IDTerritorio, DescricaoTerritorio from territorios');
        return view('funcionario-territorio.formulario')->withFuncionarios($funcionarios)->withTerritorios($territorios);
    }
    
    public function alterar($id) {
        $arrayId = explode("_", $id);
        $funcionarioTerritorio = DB::select('select IDFuncionario, IDTerritorio from funcionarios_territorios where IDFuncionario = ? AND IDTerritorio = ?', [$arrayId[0], $arrayId[1]]);
        $funcionarios = DB::select('select IDFuncionario, CONCAT(Nome, \' \', Sobrenome) AS funcionario from funcionarios');
        $territorios = DB::select('select IDTerritorio, DescricaoTerritorio from territorios');
        return view('funcionario-territorio.formulario')->with('ft', $funcionarioTerritorio[0])->withFuncionarios($funcionarios)->withTerritorios($territorios);
    }

    public function adiciona() {
        $funcionario = Request::input('funcionario');
        $territorio = Request::input('territorio');
        DB::table('funcionarios_territorios')->insert([
            'IDFuncionario' => $funcionario,
            'IDTerritorio' => $territorio
        ]);
        return view('funcionario-territorio.adicionado');
    }
    
    public function altera() {
        $arrayId = explode("_", Request::input('id'));
        $funcionario = Request::input('funcionario');
        $territorio = Request::input('territorio');
        DB::table('funcionarios_territorios')->where([['IDFuncionario', '=', $arrayId[0]], ['IDTerritorio', '=', $arrayId[1]]])->update([
            'IDFuncionario' => $funcionario,
            'IDTerritorio' => $territorio
        ]);
        return view('funcionario-territorio.alterado');
    }

}