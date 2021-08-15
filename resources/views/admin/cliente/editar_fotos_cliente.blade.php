@extends('layouts.admin_layout')

@section('content')
    <h2>Atualizar informações das fotos com o titulo {{$foto->titulo}} do {{$user->name}}</h2>
    <form action="{{ route('cliente.fotos.update', [$user->id, $foto->id]) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <h6 style="color:black">Titulo para as fotos: </h6>
            <div class="col-md-12">
                <input class="form-control" type="text" id="titulo" name="titulo" value="{{ $foto->titulo }}">
            </div>
        </div>
        <div class="form-group">
            <h6 style="color:black">Descarregue fotografias (De frente/De lado/De costas)</h6>

            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoFrente">Foto de frente</label>
                @if($foto->foto_frente != null)
                    <img src="{{ asset($foto->foto_frente) }}">
                @else
                    <input type="file" class="custom-file-input" name="fotoFrente" id="fotoFrente">
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @endif
            </div>
            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoLado">Foto de lado</label>
                @if($foto->foto_frente != null)
                    <img src="{{ asset($foto->foto_lado) }}">
                @else
                    <input type="file" class="custom-file-input" name="fotoLado" id="fotoLado">
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @endif
            </div>
            <div class="form-group custom-file mb-3">
                <label class="custom-file-label" for="fotoCostas">Foto de costas</label>
                @if($foto->foto_frente != null)
                    <img src="{{ asset($foto->foto_costas) }}">
                @else
                    <input type="file" class="custom-file-input" name="fotoCostas" id="fotoCostas">
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                @endif
            </div>
        </div>
        <input type="hidden" name="foto" value="{{ $foto->id }}">
        <button type="submit" class="btn btn-danger">Atualizar Fotos</button>
    </form>
@endsection
