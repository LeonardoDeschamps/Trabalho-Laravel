@extends('layout.principal')
@section('conteudo')
    <div class="alert alert-success">
        <strong>Sucesso!</strong> O funcionário {{$f->Nome}} {{$f->Sobrenome}} foi excluído.
    </div>
@stop