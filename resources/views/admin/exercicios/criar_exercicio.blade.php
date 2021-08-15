@extends('layouts.admin_layout')

@section('content')
    <div class="card border-dark mb-3 text-center">
        <form action="{{ route('exercicios.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header"><h3>Criar Exercício</h3></div>
            <div class="card-body text-dark">
                <div class="form-group custom-file mb-3">
                    <label class="custom-file-label" for="fotoVideoExercicio">Vídeo/Foto</label>
                    <input type="file" class="custom-file-input" name="fotoVideoExercicio" id="fotoVideoExercicio" required>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
                <div class="form-group input-group">
                    <input name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Exercício" type="text" value="{{ old('nome') }}">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <input name="musculos" id="musculos" class="form-control @error('musculos') is-invalid @enderror" placeholder="Musculos" type="text" value="{{ old('nome') }}">
                </div> <!-- form-group// -->
                <div class="form-group">
                    <select class="form-control @error('tipo_exercicio') is-invalid @enderror" name="tipo_exercicio">
                        <option value="" selected disabled hidden>Tipo de Exercício</option>
                        @foreach($tipoExercicios as $tipoExercicio)
                            <option value="{{$tipoExercicio->id}}">{{$tipoExercicio->nome}}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group end.// -->
                <div class="form-group text-left" id="renderTipo2">
                    <a onclick="renderTipoExercicio2()" class="btn btn-danger">Adicionar 2º Tipo</a>
                </div>
                <div class="form-group" id="tipo2" style="display:none;">
                    <select class="form-control @error('tipo_exercicio') is-invalid @enderror" name="tipo_exercicio2">
                        <option value="" selected disabled hidden>Tipo de Exercício</option>
                        <option value="0">Nenhum</option>
                        @foreach($tipoExercicios as $tipoExercicio)
                            <option value="{{$tipoExercicio->id}}">{{$tipoExercicio->nome}}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group end.// -->

            </div>
            <div class="card-footer">
                <button class="btn btn-danger">Criar Exercicio</button>
            </div>
        </form>
    </div>

@endsection

<script>
    function renderTipoExercicio2() {
        document.getElementById("tipo2").style.display = "block";
        document.getElementById("renderTipo2").style.display = "none";
    }
</script>
