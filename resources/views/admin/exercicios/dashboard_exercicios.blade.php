@extends('layouts.admin_layout')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('tipo_exercicios.create') }}" class="btn btn-danger mb-2">{{__('Criar Tipo Exercicio')}}</a>
            <table class="table table-hover table-dark table-striped table-borderless text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Apagar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tipoExercicios as $tipoExercicio)
                    <tr>
                        <th scope="row">{{ $tipoExercicio->id }}</th>
                        <td>
                            <a href="{{ route('tipo_exercicios.show', $tipoExercicio->id) }}" style="color:white; text-decoration: underline"> {{ $tipoExercicio->nome }} </a>
                        </td>
                        <td>
                            <form action="{{ route('tipo_exercicios.destroy', $tipoExercicio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <a href="{{ route('exercicios.create') }}" class="btn btn-danger mb-2">{{__('Criar Exercicio')}}</a>
            <table class="table table-hover table-dark table-striped table-borderless text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Musculos</th>
                    <th scope="col">Tipo Exercicio</th>
                    <th scope="col">Apagar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exercicios as $exercicio)
                    <tr>
                        <th scope="row">{{ $exercicio->id }}</th>
                        <td>
                            <a href="{{ route('exercicios.show', $exercicio->id) }}" style="color:white; text-decoration: underline"> {{ $exercicio->nome }} </a>
                        </td>
                        <td>{{ $exercicio->musculos }}</td>
                        <td>
                            {{ App\Models\Exercicio::find($exercicio->id)->tipoExercicios->first()->nome }}
                        </td>
                        <td>
                            <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
