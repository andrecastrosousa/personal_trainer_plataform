@extends('layouts.admin_layout')

@section('content')
    <h1>Listar Planos de Treino</h1>
    <a href="{{route('planostreino.criar')}}" class="btn btn-danger">Criar Plano de Treino</a>
    <table class="table table-hover table-dark table-striped table-borderless text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo Serviço</th>
            <th scope="col">Plano de Treino</th>
        </tr>
        </thead>
        <tbody>
        @foreach($planos as $plano)
            <tr>
                <th scope="row">{{ $plano->id }}</th>
                <td>
                    {{ App\Models\User::find($plano->user_id)->name }}
                </td>
                <td>
                    {{ \App\Models\TipoServico::find(App\Models\User::find($plano->user_id)->tipo_servico_id)->servico }}
                </td>
                <td>
                    <form action="{{ route("clientes.plano_treino.show", [$plano->user_id, $plano->id])}}" method="POST">
                        @csrf
                        @method("GET")
                        <button  style="color:white; text-decoration: underline" class="btn btn-outline-danger"> Consultar </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
