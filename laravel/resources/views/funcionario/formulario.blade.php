@extends('layout.principal')
@section('conteudo')
    <h1>Formulário funcionário</h1>
    <form action="/funcionarios/{{isset($f) ? 'altera' : 'adiciona'}}">
        @if(isset($f))
            <input type="hidden" name="id" value="{{$f->IDFuncionario}}"/>
        @endif
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{isset($f) ? $f->Nome : ''}}"/>
        </div>
        <div class="form-group">
            <label>Sobrenome</label>
            <input name="sobrenome" class="form-control" value="{{isset($f) ? $f->Sobrenome : ''}}"/>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
@stop