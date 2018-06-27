@extends('layout.principal')
@section('conteudo')
    @if(empty($territorios))
        <div class="alert alert-danger">
            Você não tem nenhum território cadastrado.
        </div>
    @else
        <h1>Listagem de territórios</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($territorios as $t)
            <tr>
                <td> {{$t->DescricaoTerritorio}} </td>
                <td> {{$t->DescricaoRegiao}} </td>
                <td align="center" width="1%">
                    <a href="/territorios/alterar/{{$t->IDTerritorio}}">
                        <span>Alterar</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/territorios/excluir/{{$t->IDTerritorio}}">
                        <span>Excluir</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/territorios/visualizar/{{$t->IDTerritorio}}">
                        <span>Visualizar</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@stop