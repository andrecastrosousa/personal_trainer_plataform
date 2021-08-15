@extends('layouts.admin_layout')

@section('content')
    <h1>Escolher Cliente</h1>
    <form action="{{ route('plano_treino.iniciar') }}" method="POST">
        @csrf
        <div class="card border-dark mb-3 text-center">
            <div class="card-header">
                <h5>
                    <div class="form-group ">

                        <label for="objetivo">Objetivo</label>
                        <input class="form-control @error('objetivo') is-invalid @enderror" name="objetivo" id="objetivo">
                    </div> <!-- form-group end.// -->
                </h5>
            </div>
            <div class="card-body">
                <select class="form-control @error('cliente') is-invalid @enderror" name="cliente">
                    <option value="" selected disabled hidden>Escolher Cliente</option>
                    @foreach($users as $user)
                        @if($user->name != Auth::user()->name)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button class="btn btn-outline-danger">Criar Plano de Treino</button>
        </div>
    </form>

@endsection
