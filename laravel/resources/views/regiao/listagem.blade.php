@extends('layout.principal')
@section('conteudo')
    @if(empty($regioes))
        <div class="alert alert-danger">
            Você não tem nenhuma região cadastrada.
        </div>
    @else
        <h1>Listagem de regiões</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($regioes as $r)
            <tr>
                <td> {{$r->DescricaoRegiao}} </td>
                <td align="center" width="1%">
                    <a href="/regioes/alterar/{{$r->IDRegiao}}">
                        <span>Alterar</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/regioes/excluir/{{$r->IDRegiao}}">
                        <span>Excluir</span>
                    </a>
                </td>
                <td align="center" width="1%">
                    <a href="/regioes/visualizar/{{$r->IDRegiao}}">
                        <span>Visualizar</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@stop