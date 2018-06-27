@extends('layout.principal')
@section('conteudo')
    @if(empty($funcionariosterritorios))
        <div class="alert alert-danger">
            Você não tem nenhum funcionário território cadastrado.
        </div>
    @else
        <h1>Listagem de funcionários territórios</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($funcionariosterritorios as $ft)
            <tr>
                <td> {{$ft->funcionario}} </td>
                <td> {{$ft->DescricaoTerritorio}} </td>
                <td align="center" width="1%">
                    <a href="/funcionario-territorio/alterar/{{$ft->IDFuncionario}}_{{$ft->IDTerritorio}}">
                        <span>Alterar</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/funcionario-territorio/excluir/{{$ft->IDFuncionario}}_{{$ft->IDTerritorio}}">
                        <span>Excluir</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/funcionario-territorio/visualizar/{{$ft->IDFuncionario}}_{{$ft->IDTerritorio}}">
                        <span>Visualizar</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@stop