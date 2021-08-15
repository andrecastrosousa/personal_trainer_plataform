@extends('layouts.admin_layout')

@section('content')
    <h1>Criar Tipo Exercicio</h1>
    <div class="card border-dark mb-3 text-center">
        <form action="{{ route('tipo_exercicios.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-header"><h3>Criar Tipo Exercício</h3></div>
            <div class="card-body text-dark">
                <div class="form-group input-group">
                    <input name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Tipo Exercício" type="text" value="{{ old('nome') }}">
                </div> <!-- form-group// -->
            </div>
            <div class="card-footer">
                <button class="btn btn-danger">Criar Tipo Exercicio</button>
            </div>
        </form>
    </div>
@endsection
