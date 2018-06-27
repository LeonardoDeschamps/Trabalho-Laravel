@extends('layout.principal')
@section('conteudo')
    <h1>Formulário região</h1>
    <form action="/regioes/{{isset($r) ? 'altera' : 'adiciona'}}">
        @if(isset($r))
            <input type="hidden" name="id" value="{{$r->IDRegiao}}"/>
        @endif
        <div class="form-group">
            <label>Descrição</label>
            <input name="descricao" class="form-control" value="{{isset($r) ? $r->DescricaoRegiao : ''}}"/>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
@stop