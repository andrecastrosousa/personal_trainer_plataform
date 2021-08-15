@extends('layouts.user_layout')

@section('content')
    <h1>Fotos</h1>
    @if(count($fotos) > 0)
        @foreach($fotos as $foto)
            @csrf
            @method('GET')
            <div class="row">
                <div class="col-md-12">
                    <h3>{{$foto->titulo}}</h3>
                </div>
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <h5>Frente</h5>
                        @if($foto->foto_frente != null)
                            <img src="{{ asset($foto->foto_frente ) }}" style="width: 100%">
                        @else
                            <p>Sem foto adicionada</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Lado</h5>
                        @if($foto->foto_lado != null)
                            <img src="{{ asset($foto->foto_lado ) }}" style="width: 100%">
                        @else
                            <p>Sem foto adicionada</p>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h5>Costas</h5>
                        @if($foto->foto_costas != null)
                            <img src="{{ asset($foto->foto_costas ) }}" style="width: 100%">
                        @else
                            <p>Sem foto adicionada</p>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    @else
        <p>Ainda sem fotos adicionadas. Necessário adicionar as primeiras fotos apartir do preenchimento do formulário da avaliação inicial.</p>
    @endif
@endsection
