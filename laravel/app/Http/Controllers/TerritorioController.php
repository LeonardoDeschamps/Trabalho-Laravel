<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class TerritorioController extends Controller {

    public function lista() {
        $territorios = DB::select('select IDTerritorio, DescricaoTerritorio, DescricaoRegiao from territorios join regiao using(IDRegiao)');
        return view('territorio.listagem')->withTerritorios($territorios);
    }

    public function excluir($id) {
        $territorio = DB::select('select DescricaoTerritorio from territorios where IDTerritorio = ?', [$id]);
        DB::table('territorios')->where('IDTerritorio', '=', $id)->delete();
        return view('territorio.excluido')->with('t', $territorio[0]);
    }

    public function visualizar($id) {
        $resposta = DB::select('select IDTerritorio, DescricaoTerritorio, DescricaoRegiao from territorios join regiao using(IDRegiao) where IDTerritorio = ?', [$id]);
        $return = !empty($resposta) ? view('territorio.detalhes')->with('t', $resposta[0]) : "Este território não existe";
        return $return;
    }

    public function novo() {
        $regioes = DB::select('select IDRegiao, DescricaoRegiao from regiao');
        return view('territorio.formulario')->withRegioes($regioes);
    }
    
    public function alterar($id) {
        $territorio = DB::select('select IDTerritorio, DescricaoTerritorio, IDRegiao from territorios where IDTerritorio = ?', [$id]);
        $regioes = DB::select('select IDRegiao, DescricaoRegiao from regiao');
        return view('territorio.formulario')->with('t', $territorio[0])->withRegioes($regioes);
    }

    public function adiciona() {
        $territorio = new \stdClass();
        $territorio->descricao = Request::input('descricao');
        $territorio->regiao = Request::input('regiao');
        DB::table('territorios')->insert([
            'IDTerritorio' => DB::select('select 1 + max(IDTerritorio) as id from territorios')[0]->id,
            'DescricaoTerritorio' => $territorio->descricao,
            'IDRegiao' => $territorio->regiao
        ]);
        return view('territorio.adicionado')->with('t', $territorio);
    }
    
    public function altera() {
        $id = Request::input('id');
        $territorio = new \stdClass();
        $territorio->descricao = Request::input('descricao');
        $territorio->regiao = Request::input('regiao');
        DB::table('territorios')->where('IDTerritorio', '=', $id)->update([
            'DescricaoTerritorio' => $territorio->descricao,
            'IDRegiao' => $territorio->regiao
        ]);
        return view('territorio.alterado')->with('t', $territorio);
    }

}