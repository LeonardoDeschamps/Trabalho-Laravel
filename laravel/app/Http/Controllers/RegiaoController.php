<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class RegiaoController extends Controller {

    public function lista() {
        $regioes = DB::select('select IDRegiao, DescricaoRegiao from regiao');
        return view('regiao.listagem')->withRegioes($regioes);
    }

    public function excluir($id) {
        $regiao = DB::select('select DescricaoRegiao from regiao where IDRegiao = ?', [$id]);
        DB::table('regiao')->where('IDRegiao', '=', $id)->delete();
        return view('regiao.excluido')->with('r', $regiao[0]);
    }

    public function visualizar($id) {
        $resposta = DB::select('select IDRegiao, DescricaoRegiao from regiao where IDRegiao = ?', [$id]);
        $return = !empty($resposta) ? view('regiao.detalhes')->with('r', $resposta[0]) : "Esta região não existe";
        return $return;
    }

    public function novo() {
        return view('regiao.formulario');
    }
    
    public function alterar($id) {
        $regiao = DB::select('select IDRegiao, DescricaoRegiao from regiao where IDRegiao = ?', [$id]);
        return view('regiao.formulario')->with('r', $regiao[0]);
    }

    public function adiciona() {
        $regiao = new \stdClass();
        $regiao->descricao = Request::input('descricao');
        DB::table('regiao')->insert([
            'IDRegiao' => DB::select('select 1 + max(IDRegiao) as id from regiao')[0]->id,
            'DescricaoRegiao' => $regiao->descricao
        ]);
        return view('regiao.adicionado')->with('r', $regiao);
    }
    
    public function altera() {
        $id = Request::input('id');
        $regiao = new \stdClass();
        $regiao->descricao = Request::input('descricao');
        DB::table('regiao')->where('IDRegiao', '=', $id)->update([
            'DescricaoRegiao' => $regiao->descricao
        ]);
        return view('regiao.alterado')->with('r', $regiao);
    }

}