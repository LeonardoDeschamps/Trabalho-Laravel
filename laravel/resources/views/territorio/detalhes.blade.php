@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do território:</h1>
    <ul>
        <li>
            <b>Descrição:</b> {{$t->DescricaoTerritorio}}
        </li>
        <li>
            <b>Região:</b> {{$t->DescricaoRegiao}}
        </li>
    </ul>
@stop