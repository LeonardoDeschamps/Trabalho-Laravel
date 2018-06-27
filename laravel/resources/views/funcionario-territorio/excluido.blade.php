@extends('layout.principal')
@section('conteudo')
    <div class="alert alert-success">
        <strong>Sucesso!</strong> A relação funcionário território {{$ft->funcionario}} - {{$ft->DescricaoTerritorio}} foi excluída.
    </div>
@stop