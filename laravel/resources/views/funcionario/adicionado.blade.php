@extends('layout.principal')
@section('conteudo')
    <div class="alert alert-success">
        <strong>Sucesso!</strong> O funcionário {{$f->nome}} {{$f->sobrenome}} foi adicionado.
    </div>
@stop