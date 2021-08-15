@extends('layouts.admin_layout')

@section('content')
    <h1>{{$exercicio->nome}}</h1>
    <div class="row">
        <div class="col-md-3">
            <p>
                @if($video)
		    <p> {{ asset($exercicio->foto_video) }} </p>
                    <video controls width="100%">
                        <source src="{{ asset($exercicio->foto_video) }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ asset($exercicio->foto_video) }}" alt="imagem exercicio" style="max-width: 100%">
                @endif
            </p>
        </div>
        <div class="col-md-9">
            <p>
                @if($exercicio->musculos == null)
                    Sem informação disponível
                @else
                    <b>Músculos:</b> {{$exercicio->musculos}}
                @endif
            </p>
            Tipo Exercicio:
            <ul>
                @foreach($tipoExercicios as $tipoExercicio)
                    @if(App\Models\Exercicio::find($exercicio->id)->tipoExercicios->contains($tipoExercicio->id))
                        <li>{{$tipoExercicio->nome}}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div>
        <a href="{{ route('exercicios.edit', $exercicio->id) }}" class="btn btn-danger">Editar Exercício</a>
    </div>
@endsection
