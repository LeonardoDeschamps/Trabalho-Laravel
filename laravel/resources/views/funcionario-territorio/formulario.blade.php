@extends('layout.principal')
@section('conteudo')
    <h1>Formulário funcionário território</h1>
    <form action="/funcionario-territorio/{{isset($ft) ? 'altera' : 'adiciona'}}">
        @if(isset($ft))
            <input type="hidden" name="id" value="{{$ft->IDFuncionario}}_{{$ft->IDTerritorio}}"/>
        @endif
        <div class="form-group">
            <label>Funcionário</label>
            <select name="funcionario" class="form-control">
                @foreach($funcionarios as $f)
                    <option {{isset($ft) && $ft->IDFuncionario == $f->IDFuncionario ? "selected" : ''}} value="{{$f->IDFuncionario}}">{{$f->funcionario}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Território</label>
            <select name="territorio" class="form-control">
                @foreach($territorios as $t)
                    <option {{isset($ft) && $ft->IDTerritorio == $t->IDTerritorio ? "selected" : ''}} value="{{$t->IDTerritorio}}">{{$t->DescricaoTerritorio}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
@stop