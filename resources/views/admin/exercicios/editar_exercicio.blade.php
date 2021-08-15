@extends('layouts.admin_layout')

@section('content')
    <h1>Editar Exercicios</h1>
    <form action="{{ route('exercicios.update', $exercicio->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-header"><h3>Criar Exercício</h3></div>
        <div class="card-body text-dark">
            <div class="form-group custom-file mb-3">
                @if($video)
                    <video controls width="100%">
                        <source src="{{ asset($exercicio->foto_video) }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ asset($exercicio->foto_video) }}" alt="imagem exercicio" style="max-width: 100%">
                @endif
                <label class="custom-file-label" for="fotoVideoExercicio">Vídeo/Foto</label>
                <input type="file" class="custom-file-input" name="fotoVideoExercicio" id="fotoVideoExercicio">
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            <div class="form-group input-group">
                <input name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Exercício" type="text" value="{{ $exercicio->nome }}">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <input name="musculos" id="musculos" class="form-control @error('musculos') is-invalid @enderror" placeholder="Musculos" type="text" value="{{ $exercicio->musculos }}">
            </div> <!-- form-group// -->
            <div style="display:none">{{$countTipos = 0}}</div>
            {{$found = false}}
            <div class="form-group">
                <select class="form-control @error('tipo_exercicio') is-invalid @enderror" name="tipo_exercicio">
                    @foreach($tipoExercicios as $tipoExercicio)
                            @if(App\Models\Exercicio::find($exercicio->id)->tipoExercicios->contains($tipoExercicio->id))
                                {{$found = !$found}}
                                @if($found)
                                    <option value="{{$tipoExercicio->id}}" selected>{{$tipoExercicio->nome}}</option>
                                @endif
                            @else
                            <option value="{{$tipoExercicio->id}}">{{$tipoExercicio->nome}}</option>
                            @endif
                    @endforeach
                </select>
            </div> <!-- form-group end.// -->
            <div class="form-group" id="tipo2">
                <select class="form-control @error('tipo_exercicio') is-invalid @enderror" name="tipo_exercicio2">
                    <option value="0">Nenhum</option>
                    @foreach($tipoExercicios as $tipoExercicio)
                        @if(App\Models\Exercicio::find($exercicio->id)->tipoExercicios->contains($tipoExercicio->id))
                            <div style="display:none">{{$countTipos ++}}</div>
                            @if($countTipos == 2)
                                <option value="{{$tipoExercicio->id}}" selected>{{$tipoExercicio->nome}}</option>
                            @endif
                        @else
                            <option value="{{$tipoExercicio->id}}">{{$tipoExercicio->nome}}</option>
                        @endif
                    @endforeach
                </select>
            </div> <!-- form-group end.// -->

        </div>
        <div class="card-footer">
            <button class="btn btn-danger">Guardar Alterações</button>
        </div>
    </form>
@endsection
