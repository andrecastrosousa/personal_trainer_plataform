@extends('layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>{{$evento->name}}</h3>
        </div>
        <div class="col-md-6">
            Hora Início:{{$evento->hora_inicio}}
        </div>
        <div class="col-md-6">
            Hora Fim: {{$evento->hora_fim}}
        </div>
        <div class="col-md-12">
            Descrição: {{$evento->description}}
        </div>
        <div class="col-md-12">
            Data: {{$evento->task_date}}
        </div>
        <a href="{{ route('marcacoes.edit', $evento->id) }}" class="btn btn-danger">Alterar</a><br>
        <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Apagar</button>
        </form>

    </div>

@endsection
