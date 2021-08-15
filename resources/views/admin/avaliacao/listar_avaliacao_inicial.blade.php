@extends('layouts.admin_layout')

@section('content')
    @error('avaliacaoConcluida')
    <div class="alert alert-success">{{ $message }}</div>
    @enderror
    <a href="{{route('cliente_avaliacao_inicial.create')}}" class="btn btn-danger">Criar Avaliação</a>

    <table class="table table-hover table-dark table-striped table-borderless text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Utilizador</th>
                <th scope="col">Criada</th>
                <th scope="col">Consultar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($avaliacoes as $avaliacao)
            <tr>
                <th scope="row">{{ $avaliacao->id }}</th>
                <td>
                     {{ \App\Models\User::where('avaliacao_inicial_id', $avaliacao->id)->first()->name}}
                </td>
                <td>{{ $avaliacao->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('cliente_avaliacao_inicial.show', $avaliacao->id) }}" style="color:white; text-decoration: underline">Consultar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
