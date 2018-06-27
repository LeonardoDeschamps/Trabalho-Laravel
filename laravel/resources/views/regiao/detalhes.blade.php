@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes da região:</h1>
    <ul>
        <li>
            <b>Descrição:</b> {{$r->DescricaoRegiao}}
        </li>
    </ul>
@stop