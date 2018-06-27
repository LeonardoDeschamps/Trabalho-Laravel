@extends('layout.principal')
@section('conteudo')
    @if(empty($funcionarios))
        <div class="alert alert-danger">
            Você não tem nenhum funcionario cadastrado.
        </div>
    @else
        <h1>Listagem de funcionários</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($funcionarios as $f)
            <tr>
                <td> {{$f->Nome}} </td>
                <td> {{$f->Sobrenome}} </td>
                <td align="center" width="1%">
                    <a href="/funcionarios/alterar/{{$f->IDFuncionario}}">
                        <span>Alterar</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/funcionarios/excluir/{{$f->IDFuncionario}}">
                        <span>Excluir</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/funcionarios/visualizar/{{$f->IDFuncionario}}">
                        <span>Visualizar</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@stop