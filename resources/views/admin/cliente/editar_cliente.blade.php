@extends('layouts.admin_layout')

@section('content')
    <div class="card border-danger mb-3 text-center">
        <div class="card-header"><h3>{{$cliente->name}}</h3></div>
        <div class="card-body text-dark">
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
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo" type="text" id="nome" name="nome" value="{{$cliente->name}}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Endereço de Email" type="email" value="{{$cliente->email}}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <input name="telemovel" id="telemovel" class="form-control @error('telemovel') is-invalid @enderror" placeholder="Número Telemóvel" type="text" value="{{$cliente->telemovel}}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control @error('servico') is-invalid @enderror" name="servico">
                        @if($cliente->tipo_servico_id == 1)
                            <option value="1" selected>Acompanhamento Presencial</option>
                            <option value="2">Acompanhamento Online</option>
                            <option value="3">Personal Trainer</option>
                        @elseif($cliente->tipo_servico_id == 2)
                            <option value="1">Acompanhamento Presencial</option>
                            <option value="2" selected>Acompanhamento Online</option>
                            <option value="3">Personal Trainer</option>
                        @else
                            <option value="1">Acompanhamento Presencial</option>
                            <option value="2">Acompanhamento Online</option>
                            <option value="3" selected>Personal Trainer</option>
                        @endif
                    </select>
                </div> <!-- form-group end.// -->

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control @error('servico') is-invalid @enderror" name="pagamento">
                        @if($cliente->pagamento == 0)
                            <option value="0" selected>Não Pago</option>
                            <option value="1">Pago</option>
                        @else
                            <option value="0">Não Pago</option>
                            <option value="1" selected>Pago</option>
                        @endif
                    </select>
                </div> <!-- form-group end.// -->

                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block"> Confirmar Alterações  </button>
                </div> <!-- form-group// -->
            </form>
        </div>
    </div>
@endsection
