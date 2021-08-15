@extends('layouts.admin_layout')

@section('content')
    <div class="card" style="background-color: black">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h2 class="card-title mt-3 text-center" style="color:white">Criar Cliente</h2>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('telemovel')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('servico')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo" type="text" id="nome" name="nome" value="{{ old('nome') }}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Endereço de Email" type="email" value="{{ old('email') }}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="telemovel" id="telemovel" class="form-control @error('telemovel') is-invalid @enderror" placeholder="Número Telemóvel" type="text" value="{{ old('telemovel') }}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control @error('servico') is-invalid @enderror" name="servico">
                        <option value="" selected disabled hidden>Tipo de Serviço</option>
                        <option value="1">Acompanhamento Presencial</option>
                        <option value="2">Acompanhamento Online</option>
                        <option value="3">Personal Trainer</option>
                    </select>
                </div> <!-- form-group end.// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Criar password">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repetir password" type="password" name="password_confirmation" id="password_confirmation">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block"> Criar Cliente  </button>
                </div> <!-- form-group// -->
            </form>
        </article>
    </div> <!-- card.// -->
@endsection

