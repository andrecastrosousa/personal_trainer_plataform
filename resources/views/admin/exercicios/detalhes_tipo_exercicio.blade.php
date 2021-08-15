@extends('layouts.admin_layout')

@section('content')
    <a href="{{ route('exercicios.dashboard') }}" class="btn btn-danger">Voltar</a>
    <h1>Tipo Exercicio: {{$tipoExercicio->nome}}</h1>
    <hr>
    <h3>Exercícios</h3>
    @foreach($exercicios as $exercicio)
        <ul class="list-group">
            <li class="list-group-item">{{$exercicio}}</li>
        </ul>
    @endforeach
@endsection
