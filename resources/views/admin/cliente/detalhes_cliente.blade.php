@extends('layouts.admin_layout')

@section('content')

    <h1 class="text-center">{{$cliente->name}}</h1>
    <div class="row">
        <div class="col-md-11 offset-md-1 text-left mb-5">
            <a href="{{route('clientes.index')}}" class="btn btn-danger"> Voltar </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 offset-md-1" style="height: 100%">
            <div class="card border-danger mb-3 ">
                <div class="card-header" style="background-color: #BF3434"><h3>Detalhes</h3></div>
                <div class="card-body text-dark bg-light" >
                    <p class="card-text"><b>E-mail: </b> {{$cliente->email}}</p>
                    <p class="card-text"><b>Tipo de Serviço: </b> {{\App\Models\TipoServico::find($cliente->tipo_servico_id)->servico}}</p>
                    @if($cliente->telemovel == null)
                        <p class="card-text"><b>Sem número de telemóvel adicionado.</b></p>
                    @else
                        <p class="card-text"><b>Telemovel: </b> {{$cliente->telemovel}}</p>
                    @endif
                    @if($cliente->pagamento == 0)
                        <p class="card-text"><b>Pagamento: </b> Não Pago</p>
                    @else
                        <p class="card-text"><b>Pagamento: </b> Pago</p>
                    @endif
                </div>
                <div class="card-footer" style="background-color: black;">
                    <a href="{{route('clientes.edit', $cliente->id)}}" class="btn" style="background-color: #BF3434; color:white">Editar</a>
                </div>

            </div>
            <a href="{{ route('cliente.progresso.index', $cliente->id) }}" class="btn btn-danger">Progresso</a>

        </div>
        <div class="col-md-5" >
            <div class="card border-danger mb-3">
                <form action="{{ route('clientes.alterarPassword', $cliente->id) }}" method="POST">
                    @csrf
                    <div class="card-header" style="background-color: #BF3434"><h3>Alterar Password</h3></div>
                    <div class="card-body text-dark bg-light">
                        @error('passwordAlterada')
                        <div class="alert alert-success">{{ $message }}</div>
                        @enderror
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                    </div>
                    <div class="card-footer" style="background-color: black;">
                        <button type="submit" class="btn" style="background-color: #BF3434; color:white">Alterar password</button>
                    </div>
                </form>
            </div>
            <a href="{{ route('cliente.fotos.index', $cliente->id) }}" class="btn btn-danger">Fotos</a>

        </div>


    </div>


@endsection
