@extends('layout.principal')
@section('conteudo')
    <h1>Formulário território</h1>
    <form action="/territorios/{{isset($t) ? 'altera' : 'adiciona'}}">
        @if(isset($t))
            <input type="hidden" name="id" value="{{$t->IDTerritorio}}"/>
        @endif
        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" value="{{isset($t) ? $t->DescricaoTerritorio : ''}}"/>
        </div>
        <div class="form-group">
            <label>Região</label>
            <select name="regiao" class="form-control">
                @foreach($regioes as $r)
                    <option {{isset($t) && $t->IDRegiao == $r->IDRegiao ? "selected" : ''}} value="{{$r->IDRegiao}}">{{$r->DescricaoRegiao}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
@stop