@extends('layouts.admin_layout')

@section('content')
    <h1>Criar Progresso de {{ $cliente->name }}</h1>
    <form action="{{ route('cliente.progresso.store', $cliente->id) }}" method="POST">
        @csrf
        <div class="avaliacao">
            <div class="offset-md-2 col-md-8" style="padding: 25px;">
                <div>
                    <div class="form-group">
                        <h6 style="color:black">Peso Corporal</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('peso') is-invalid @enderror" type="text" id="peso" name="peso" value="{{old('peso')}}">
                            @error('peso')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro da Cintura</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('cintura_perimetro') is-invalid @enderror" type="text" id="cintura_perimetro" value="{{old('cintura_perimetro')}}" name="cintura_perimetro">
                            @error('cintura_perimetro')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro da Coxa</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('coxa_perimetro') is-invalid @enderror" type="text" id="coxa_perimetro" name="coxa_perimetro" value="{{old('coxa_perimetro')}}">
                            @error('coxa_perimetro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Quadril</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('quadril_perimetro') is-invalid @enderror" type="text" id="quadril_perimetro" name="quadril_perimetro" value="{{old('quadril_perimetro')}}">
                            @error('quadril_perimetro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro Abdominal</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('abs_perimetro') is-invalid @enderror" type="text" id="abs_perimetro" name="abs_perimetro" value="{{old('abs_perimetro')}}">
                            @error('abs_perimetro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Braço</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('braco_perimetro') is-invalid @enderror" type="text" id="braco_perimetro" name="braco_perimetro" value="{{old('braco_perimetro')}}">
                            @error('braco_perimetro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Peito</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('peito_perimetro') is-invalid @enderror" type="text" id="peito_perimetro" name="peito_perimetro" value="{{old('peito_perimetro')}}">
                            @error('peito_perimetro')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">Criar Progresso</button>
            </div>
        </div>
    </form>
@endsection
