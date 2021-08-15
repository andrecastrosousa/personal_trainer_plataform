@extends('layouts.admin_layout')

@section('content')
    <h1>Listar Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-danger mb-2"> {{__('Criar Cliente')}} </a>
    @error('clienteCriado')
    <div class="alert alert-success">{{ $message }}</div>
    @enderror
    @error('clienteEliminado')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <table class="table table-hover table-dark table-striped table-borderless text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo Serviço</th>
                <th scope="col">Pagamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if($user->email !== Auth::user()->email)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>
                            <a href="{{ route('clientes.show', $user->id) }}" style="color:white; text-decoration: underline"> {{ $user->name }} </a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ \App\Models\TipoServico::find($user->tipo_servico_id)->servico }}</td>
                        <td>
                            @if($user->pagamento == 0)
                                <span><i class="fas fa-times mt-1" style="color:red; font-size: 20px"></i></span>
                            @else
                                <span><i class="fas fa-check" style="color: green; font-size: 20px"></i></span>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
