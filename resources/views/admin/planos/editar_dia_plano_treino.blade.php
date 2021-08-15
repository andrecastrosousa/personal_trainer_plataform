@extends('layouts.admin_layout')

@section('content')
    <form action="{{ route('clientes.plano_treino.dia.update', [$plano->user_id, $plano->id, $dia->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <ul class="list-group">
            <li class="list-group-item col-md-12"><h3>Dia {{$dia->numero}} ({{$dia->titulo}})</h3></li>
            @foreach(\App\Models\DiaExercicio::where('dia_id', $dia->id)->get() as $diaExercicio)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="text-left">
                                <h5>{{\App\Models\Exercicio::where('id', $diaExercicio->exercicio_id)->first()->nome}}</h5>
                            </div>
                            <img style="max-width: 100%" src="{{ asset(\App\Models\Exercicio::where('id', $diaExercicio->exercicio_id)->first()->foto_video)}}">
                        </div>
                        <div class="col-md-5">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Repetições:</b> <input name="reps{{$diaExercicio->id}}"value="{{$diaExercicio->rep}}"></li>
                                <li class="list-group-item"><b>Série:</b> <input name="serie{{$diaExercicio->id}}"value="{{$diaExercicio->serie}}"></li>
                                <li class="list-group-item"><b>Tempo de Descanso:</b> <input name="tempoDesc{{$diaExercicio->id}}"value="{{$diaExercicio->tempo_desc}}"></li>
                                <li class="list-group-item"><b>Carga:</b> <input name="carga{{$diaExercicio->id}}" value="{{$diaExercicio->carga}}"></li>

                            </ul>
                        </div>
                        <div class="col-md-4 text-left">
                            <label for="obseravoces"> Observações</label><br>
                            <TEXTAREA cols="42" rows="6" id="observacoes" name="observacoes{{$diaExercicio->id}}">{{$diaExercicio->observacoes}}</TEXTAREA>

                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <button class="btn btn-danger">Atualizar</button>
        <input type="hidden" value="{{$dia->id}}" name="dia">
        <input type="hidden" value="{{$plano->id}}" name="plano">
        <input type="hidden" value="{{$plano->user_id}}" name="cliente">
    </form>
@endsection
