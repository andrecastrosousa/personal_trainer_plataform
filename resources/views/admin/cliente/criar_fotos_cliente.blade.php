@extends('layouts.admin_layout')

@section('content')
    <h2>Adicionar novas fotos ao {{$user->name}}</h2>
    <form action="{{ route('cliente.fotos.store', $user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
            <h6 style="color:black">Titulo para as fotos: </h6>
            <div class="col-md-12">
                <input class="form-control @error('titulo') is-invalid @enderror" type="text" id="titulo" name="titulo" value="{{old('questao_cirurgia')}}">
            </div>
        </div>
        <div class="form-group">
            <h6 style="color:black">Descarregue fotografias (De frente/De lado/De costas)</h6>
            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoFrente">Foto de frente</label>
                <input type="file" class="custom-file-input" name="fotoFrente" id="fotoFrente">
                @error('fotoFrente')
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @enderror
            </div>
            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoLado">Foto de lado</label>
                <input type="file" class="custom-file-input" name="fotoLado" id="fotoLado">
                @error('fotoLado')
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @enderror
            </div>
            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoCostas">Foto de costas</label>
                <input type="file" class="custom-file-input" name="fotoCostas" id="fotoCostas">
                @error('fotoCostas')
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Adicionar Fotos</button>
    </form>
@endsection
