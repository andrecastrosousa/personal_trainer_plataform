@extends('layouts.user_layout')

@section('content')
    <h1 class="text-center">{{$cliente->name}}</h1>
    <div class="row">
        <div class="col-md-5 offset-md-1">
            <div class="card border-danger mb-3 ">
                <form action="{{route('update_conta')}}" method="POST">
                    @csrf
                    <div class="card-header" style="background-color: #BF3434"><h3>Detalhes</h3></div>
                    <div class="card-body text-dark bg-light" >
                        <p class="card-text"><b>Nome: </b> <input type="text" value="{{$cliente->name}}" name="nome"></p>
                        <p class="card-text"><b>E-mail: </b> {{$cliente->email}}</p>
                        <p class="card-text"><b>Tipo de Serviço: </b> {{\App\Models\TipoServico::find($cliente->tipo_servico_id)->servico}}</p>
                        <p class="card-text"><b>Telemovel: </b> <input type="text" value="{{$cliente->telemovel}}" name="telemovel"></p>
                        <p class="card-text"><b>Data Nascimento: </b> <input type="date" value="{{$cliente->data_nascimento}}" name="data_nascimento"></p>
                        <p class="card-text"><b>Profissão: </b> <input type="text" value="{{$cliente->profissao}}" name="profissao"></p>
                    </div>
                    <div class="card-footer">
                        <button class="btn" style="background-color: #BF3434; color:white">Guardar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-danger mb-3">
                <form action="{{ route('alterarPassword') }}" method="POST">
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
                    <div class="card-footer">
                        <button type="submit" class="btn" style="background-color: #BF3434; color:white">Alterar password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
