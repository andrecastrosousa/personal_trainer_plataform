@extends('layouts.admin_layout')


@section('content')
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
        @foreach($feedbacks as $feedback)
            <tr>
                <th scope="row">{{ $feedback->id }}</th>
                <td>
                    {{ $feedback->user->name}}
                </td>
                <td>{{ $feedback->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('feedback_clientes.show', $feedback->id) }}" style="color:white; text-decoration: underline">Consultar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
