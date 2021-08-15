@extends('layouts.admin_layout')

@section('content')
    @foreach($tarefas as $tarefa)
        @if($tarefa->avaliacao_inicial == 0 || $tarefa->plano_treino == 0 || $tarefa->dicas_alimentar == 0 || $tarefa->feedback_semanal == 0 || $tarefa->avaliacao_periodica == 0)
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="heading{{$tarefa->id}}">
                        <h5 class="mb-0">

                            <label for="dia1Titulo">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$tarefa->id}}" aria-expanded="true" aria-controls="collapse{{$tarefa->id}}">
                                     {{$tarefa->user->name}}
                                </a>
                            </label>
                        </h5>
                    </div>

                    <div id="collapse{{$tarefa->id}}" class="collapse show" aria-labelledby="heading{{$tarefa->id}}" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group" id="exerciciosDiaLista1">
                                @if($tarefa->avaliacao_inicial == 0)
                                    <li class="list-group-item">
                                        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-md-10">
                                                    {{__('Pedir Avaliação Inicial')}}
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger"><i class="fas fa-check"></i></button>
                                                </div>
                                                <input type="hidden" name="tarefa" value="avaliacao_inicial">
                                                <input type="hidden" name="cliente" value="{{$tarefa->user->id}}">
                                            </div>
                                        </form>
                                    </li>
                                @endif
                                    @if($tarefa->plano_treino == 0)
                                        <li class="list-group-item">
                                            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{__('Fazer Plano Treino')}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-danger"><i class="fas fa-check"></i></button>
                                                    </div>
                                                    <input type="hidden" name="tarefa" value="plano_treino">
                                                    <input type="hidden" name="cliente" value="{{$tarefa->user->id}}">
                                                </div>
                                            </form>
                                        </li>
                                    @endif
                                    @if($tarefa->dicas_alimentar == 0)
                                        <li class="list-group-item">
                                            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">

                                                    <div class="col-md-10">
                                                        {{__('Fazer Dicas Alimentares')}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-danger"><i class="fas fa-check"></i></button>
                                                    </div>
                                                    <input type="hidden" name="tarefa" value="dicas_alimentar">
                                                    <input type="hidden" name="cliente" value="{{$tarefa->user->id}}">
                                                </div>
                                            </form>
                                        </li>
                                    @endif
                                    @if($tarefa->feedback_semanal == 0)
                                        <li class="list-group-item">
                                            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{__('Pedir Feedback Semanal')}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-danger"><i class="fas fa-check"></i></button>
                                                    </div>
                                                    <input type="hidden" name="tarefa" value="feedback_semanal">
                                                    <input type="hidden" name="cliente" value="{{$tarefa->user->id}}">
                                                </div>
                                            </form>
                                        </li>
                                    @endif
                                    @if($tarefa->avaliacao_periodica == 0)
                                        <li class="list-group-item">
                                            <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{__('Pedir Avaliacao Periodica')}}
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-danger"><i class="fas fa-check"></i></button>
                                                    </div>
                                                    <input type="hidden" name="tarefa" value="avaliacao_periodica">
                                                    <input type="hidden" name="cliente" value="{{$tarefa->user->id}}">
                                                </div>
                                            </form>
                                        </li>
                                    @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

@endsection
