@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do funcionário território:</h1>
    <ul>
        <li>
            <b>Funcionário:</b> {{$ft->funcionario}}
        </li>
        <li>
            <b>Território:</b> {{$ft->DescricaoTerritorio}}
        </li>
        <li>
            <b>Região:</b> {{$ft->DescricaoRegiao}}
        </li>
    </ul>
@stop