@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do funcionário:</h1>
    <ul>
        <li>
            <b>Nome:</b> {{$f->Nome}}
        </li>
        <li>
            <b>Sobrenome:</b> {{$f->Sobrenome}}
        </li>
    </ul>
@stop