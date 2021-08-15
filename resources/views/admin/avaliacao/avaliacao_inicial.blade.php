@extends('layouts.admin_layout')

@section('content')
    <div class="avaliacao">
        <div class="offset-md-2 col-md-8" style="padding: 25px;">
            <form action="{{ route('cliente_avaliacao_inicial.store') }}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <select class="form-control @error('cliente') is-invalid @enderror" name="cliente">
                    <option value="" selected disabled hidden>Escolher Cliente</option>
                    @foreach($users as $user)
                        @if($user->name != Auth::user()->name && $user->avaliacao_inicial_id == null)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
                <div>
                    <h1>Criar Avaliação Inicial</h1>
                    <small>
                        Todas as informações fornecidas não serão partilhadas com terceiros.

                        Este formulário está dividido em 4 secções que visam a ter uma visão detalhada sobre o ponto de partida e o objetivo a alcançar.

                        Secção 1 - Dados pessoais
                        Secção 2 - Avaliação
                        Secção 3 - Ficha Anamnese
                        Secção 4 - Conclusão
                    </small>
                    <div id="errors">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <hr>
                    <h3>Informação Pessoal</h3>

                    <div class="form-group">
                        <h6 style="color:black">Data de Nascimento</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('data_nascimento') is-invalid @enderror" type="date" id="data_nascimento" name="data_nascimento" value="{{old('data_nascimento')}}">
                            @error('data_nascimento')
                                <div class="invalid-feedback">
                                        {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Profissão</h6>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('profissao') is-invalid @enderror" id="profissao" name="profissao" value="{{old('profissao')}}"placeholder="Insira a sua profissão">
                            @error('profissao')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Telemóvel</h6>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('telemovel') is-invalid @enderror" id="telemovel" name="telemovel" value="{{old('telemovel')}}" placeholder="Insira o seu número de telemóvel">
                            @error('telemovel')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <hr>
                    <h3>Avaliação</h3>
                    <div class="form-group">
                        <h6 style="color:black">Altura</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('altura') is-invalid @enderror" type="text" id="altura" name="altura" value="{{old('altura')}}" placeholder="Insira a sua altura">
                            @error('altura')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
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
                            <input class="form-control" type="text" id="cintura_perimetro" value="{{old('cintura_perimetro')}}" name="cintura_perimetro">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro da Coxa</h6>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="coxa_perimetro" name="coxa_perimetro" value="{{old('coxa_perimetro')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Quadril</h6>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="quadril_perimetro" name="quadril_perimetro" value="{{old('quadril_perimetro')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro Abdominal</h6>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="abs_perimetro" name="abs_perimetro" value="{{old('abs_perimetro')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Braço</h6>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="braco_perimetro" name="braco_perimetro" value="{{old('braco_perimetro')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Perímetro do Peito</h6>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="peito_perimetro" name="peito_perimetro" value="{{old('peito_perimetro')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Horas Diárias de trabalho</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('horas_trabalho') is-invalid @enderror" type="text" id="horas_trabalho" name="horas_trabalho" value="{{old('horas_trabalho')}}">
                            @error('horas_trabalho')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Horas diárias de sono</h6>
                        <div class="col-md-12">
                            <input class="form-control @error('horas_sono') is-invalid @enderror" type="text" id="horas_sono" name="horas_sono" value="{{old('horas_sono')}}">
                            @error('horas_sono')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Nível de sedentarismo</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Muito sedentári@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sedentarismo1">1</label><br>
                                    @if(old('sedentarismo') == 1)
                                        <input type="radio" id="sedentarismo1" name="sedentarismo" value="1" checked>
                                    @else
                                        <input type="radio" id="sedentarismo1" name="sedentarismo" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sedentarismo2">2</label><br>
                                    @if(old('sedentarismo') == 2)
                                        <input type="radio" id="sedentarismo2" name="sedentarismo" value="2" checked>
                                    @else
                                        <input type="radio" id="sedentarismo2" name="sedentarismo" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sedentarismo3">3</label><br>
                                    @if(old('sedentarismo') == 3)
                                        <input type="radio" id="sedentarismo3" name="sedentarismo" value="3" checked>
                                    @else
                                        <input type="radio" id="sedentarismo3" name="sedentarismo" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sedentarismo4">4</label><br>
                                    @if(old('sedentarismo') == 4)
                                        <input type="radio" id="sedentarismo4" name="sedentarismo" value="4" checked>
                                    @else
                                        <input type="radio" id="sedentarismo4" name="sedentarismo" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sedentarismo5">5</label><br>
                                    @if(old('sedentarismo') == 5)
                                        <input type="radio" id="sedentarismo5" name="sedentarismo" value="5" checked>
                                    @else
                                        <input type="radio" id="sedentarismo5" name="sedentarismo" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Muito Ativo
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Objetivos a atingir</h6>
                        <div class="col-md-12 ml-4 text-center">
                            <div class="row col-md-12 mt-2">
                                @if(old('objetivo1') == "perder")
                                    <input class="form-check-input" type="checkbox" id="objetivo1" name="objetivo1" value="perder" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="objetivo1" name="objetivo1" value="perder">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Perder peso
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if(old('objetivo2') == "hipertrofia")
                                    <input class="form-check-input" type="checkbox" id="objetivo2" name="objetivo2" value="hipertrofia" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="objetivo2" name="objetivo2" value="hipertrofia">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Hipertropfia/Ganhar massa muscular
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if(old('objetivo3') == "fisica")
                                    <input class="form-check-input" type="checkbox" id="objetivo3" name="objetivo3" value="fisica" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="objetivo3" name="objetivo3" value="fisica">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Melhorar condição física/saúde
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if(old('objetivo4') == "mental")
                                    <input class="form-check-input" type="checkbox" id="objetivo4" name="objetivo4" value="mental" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="objetivo4" name="objetivo4" value="mental">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Melhor saúde mental
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if(old('objetivo5') == "outro")
                                    <input class="form-check-input mt-2" type="checkbox" id="objetivo5" name="objetivo5" value="outro" checked>
                                @else
                                    <input class="form-check-input mt-2" type="checkbox" id="objetivo5" name="objetivo5" value="outro">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    <input type="text" class="form-control" name="objetivoOutro" value="{{old('objetivoOutro')}}">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Motivação</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-3 col-3 mt-3">
                                    Nada motivad@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao1">1</label><br>
                                    @if(old('motivacao') == 1)
                                        <input type="radio" id="motivacao1" name="motivacao" value="1" checked>
                                    @else
                                        <input type="radio" id="motivacao1" name="motivacao" value="1">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao2">2</label><br>
                                    @if(old('motivacao') == 2)
                                        <input type="radio" id="motivacao2" name="motivacao" value="2" checked>
                                    @else
                                        <input type="radio" id="motivacao2" name="motivacao" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao3">3</label><br>
                                    @if(old('motivacao') == 3)
                                        <input type="radio" id="motivacao3" name="motivacao" value="3" checked>
                                    @else
                                        <input type="radio" id="motivacao3" name="motivacao" value="3">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao4">4</label><br>
                                    @if(old('motivacao') == 4)
                                        <input type="radio" id="motivacao4" name="motivacao" value="4" checked>
                                    @else
                                        <input type="radio" id="motivacao4" name="motivacao" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao5">5</label><br>
                                    @if(old('motivacao') == 5)
                                        <input type="radio" id="motivacao5" name="motivacao" value="5" checked>
                                    @else
                                        <input type="radio" id="motivacao5" name="motivacao" value="5">
                                    @endif
                                </div>
                                <div class="col-md-4 col-4 mt-3">
                                    Extremamente motivad@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Treinos p/ semana</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            @if(old('treino') == 1)
                                <input type="radio" id="treino1" name="treino" value="1" checked>
                            @else
                                <input type="radio" id="treino1" name="treino" value="1">
                            @endif
                            <label class="form-check-label" for="treino1">1</label><br>

                            @if(old('treino') == 2)
                                <input type="radio" id="treino2" name="treino" value="2" checked>
                            @else
                                <input type="radio" id="treino2" name="treino" value="2">
                            @endif
                            <label class="form-check-label" for="treino2">2</label><br>

                            @if(old('treino') == 3)
                                <input type="radio" id="treino3" name="treino" value="3" checked>
                            @else
                                <input type="radio" id="treino3" name="treino" value="3">
                            @endif
                            <label class="form-check-label" for="treino3">3</label><br>

                            @if(old('treino') == 4)
                                <input type="radio" id="treino4" name="treino" value="4" checked>
                            @else
                                <input type="radio" id="treino4" name="treino" value="4">
                            @endif
                            <label class="form-check-label" for="treino4">4</label><br>

                            @if(old('treino') == 5)
                                <input type="radio" id="treino5" name="treino" value="5" checked>
                            @else
                                <input type="radio" id="treino5" name="treino" value="5">
                            @endif
                            <label class="form-check-label" for="treino5">5</label><br>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>Ficha Anamnese</h3>
                <div class="form-group">
                    <h6 style="color:black">Anamnese Clínica</h6>
                    <div class="col-md-12 ml-4 text-center">
                        <div class="row col-md-12">
                            @if(old('clinica1') == "asma")
                                <input class="form-check-input" type="checkbox" id="clinica1" name="clinica1" value="asma" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica1" name="clinica1" value="asma">
                            @endif
                            <label class="form-check-label" for="clinica1">
                                Asma
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica2') == "cardiorrespiratorias")
                                <input class="form-check-input" type="checkbox" id="clinica2" name="clinica2" value="cardiorrespiratorias" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica2" name="clinica2" value="cardiorrespiratorias">
                            @endif
                            <label class="form-check-label" for="clinica2">
                                Cardiorrespiratórias
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica3') == "depressao")
                                <input class="form-check-input" type="checkbox" id="clinica3" name="clinica3" value="depressao" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica3" name="clinica3" value="depressao">
                            @endif
                            <label class="form-check-label" for="clinica3">
                                Depressão
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica4') == "diabetes")
                                <input class="form-check-input" type="checkbox" id="clinica4" name="clinica4" value="diabetes" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica4" name="clinica4" value="diabetes">
                            @endif
                            <label class="form-check-label" for="clinica4">
                                Diabetes
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica5') == "hipertensao")
                                <input class="form-check-input" type="checkbox" id="clinica5" name="clinica5" value="hipertensao" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica5" name="clinica5" value="hipertensao">
                            @endif
                            <label class="form-check-label" for="clinica5">
                                Hipertensão
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica6') == "hipotensao")
                                <input class="form-check-input" type="checkbox" id="clinica6" name="clinica6" value="hipotensao" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica6" name="clinica6" value="hipotensao">
                            @endif
                            <label class="form-check-label" for="clinica6">
                                Hipotensão
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica7') == "lesoes")
                                <input class="form-check-input" type="checkbox" id="clinica7" name="clinica7" value="lesoes">
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica7" name="clinica7" value="lesoes">
                            @endif
                            <label class="form-check-label" for="clinica7">
                                Lesões
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica8') == "musculares")
                                <input class="form-check-input" type="checkbox" id="clinica8" name="clinica8" value="musculares" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica8" name="clinica8" value="musculares">
                            @endif
                            <label class="form-check-label" for="clinica8">
                                Musculares
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica9') == "osteoarticulares")
                                <input class="form-check-input" type="checkbox" id="clinica9" name="clinica9" value="osteoarticulares" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica9" name="clinica9" value="osteoarticulares">
                            @endif
                            <label class="form-check-label" for="clinica9">
                                Osteoarticulares
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica10') == "arterial")
                                <input class="form-check-input" type="checkbox" id="clinica10" name="clinica10" value="arterial" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica10" name="clinica10" value="arterial">
                            @endif
                            <label class="form-check-label" for="clinica5">
                                Pressão Arterial
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica11') == "coluna")
                                <input class="form-check-input" type="checkbox" id="clinica11" name="clinica11" value="coluna" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica11" name="clinica11" value="coluna">
                            @endif
                            <label class="form-check-label" for="clinica11">
                                Problemas de Coluna
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica12') == "tiróide")
                                <input class="form-check-input" type="checkbox" id="clinica12" name="clinica12" value="tiróide" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica12" name="clinica12" value="tiróide">
                            @endif
                            <label class="form-check-label" for="clinica12">
                                Tiróide
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica13') == "renais")
                                <input class="form-check-input" type="checkbox" id="clinica13" name="clinica13" value="renais" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica13" name="clinica13" value="renais">
                            @endif
                            <label class="form-check-label" for="clinica13">
                                Renais
                            </label>
                        </div>
                        <div class="row col-md-12">
                            @if(old('clinica14') == "outro")
                                <input class="form-check-input" type="checkbox" id="clinica14" name="clinica14" value="outro" checked>
                            @else
                                <input class="form-check-input" type="checkbox" id="clinica14" name="clinica14" value="outro">
                            @endif
                            <label class="form-check-label" for="clinica14">
                                <input type="text" class="form-control" name="clinicaOutro" value="{{old('clinicaOutro')}}">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">PAR_Q & YOU</h6>
                    <div class="col-md-12 text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td></td>
                                    <td>Sim</td>
                                    <td>Não</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>O seu médico já lhe comunicou que possui problemas cardiovasculares e que apenas deve praticar atividade física mediante de supervisão médica?</td>
                                    <td>
                                        @if(old('parq1') == "sim")
                                            <input type="radio"  id="parq11" name="parq1" value="sim" checked>
                                        @else
                                            <input type="radio"  id="parq11" name="parq1" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq1') == "nao")
                                            <input type="radio"  id="parq12" name="parq1" value="nao" checked>
                                        @else
                                            <input type="radio"  id="parq12" name="parq1" value="nao">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sente dores no peito enquanto pratica algum tipo de atividade física?</td>
                                    <td>
                                        @if(old('parq2') == "sim")
                                            <input type="radio" id="parq21" name="parq2" value="sim" checked>
                                        @else
                                            <input type="radio" id="parq21" name="parq2" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq2') == "nao")
                                            <input type="radio" id="parq22" name="parq2" value="nao" checked>
                                        @else
                                            <input type="radio" id="parq22" name="parq2" value="nao">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>No mês passado, sentiu dores no peito enquanto não estava a praticar atividade física?</td>
                                    <td>
                                        @if(old('parq3') == "sim")
                                            <input type="radio" id="parq31" name="parq3" value="sim" checked>
                                        @else
                                            <input type="radio" id="parq31" name="parq3" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq3') == "nao")
                                            <input type="radio" id="parq32" name="parq3" value="nao" checked>
                                        @else
                                            <input type="radio" id="parq32" name="parq3" value="nao">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alguma vez perdeu o equilíbrio devido a tonturas ou perdeu a consciência durante a prática de exercício físico?</td>
                                    <td>
                                        @if(old('parq4') == "sim")
                                            <input type="radio" id="parq41" name="parq4" value="sim" checked>
                                        @else
                                            <input type="radio" id="parq41" name="parq4" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq4') == "nao")
                                            <input type="radio" id="parq42" name="parq4" value="nao" checked>
                                        @else
                                            <input type="radio" id="parq42" name="parq4" value="nao">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tem problemas ósseos ou articulares que possam piorar com o início da atividade física?</td>
                                    <td>
                                        @if(old('parq5') == "sim")
                                            <input type="radio" id="parq51" name="parq5" value="sim" checked>
                                        @else
                                            <input type="radio" id="parq51" name="parq5" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq5') == "nao")
                                            <input type="radio" id="parq52" name="parq5" value="nao" checked>
                                        @else
                                            <input type="radio" id="parq52" name="parq5" value="nao">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>O seu médico prescreve-lhe algum medicamento para a sua pressão arterial ou doença cardíaca?</td>
                                    <td>
                                        @if(old('parq6') == "sim")
                                            <input type="radio" id="parq61" name="parq6" value="sim" checked>
                                        @else
                                            <input type="radio" id="parq61" name="parq6" value="sim">
                                        @endif
                                    </td>
                                    <td>
                                        @if(old('parq6') == "nao")
                                            <input type="radio" id="parq62" name="parq6" value="nao" checked>
                                        @else
                                            <input type="radio" id="parq62" name="parq6" value="nao">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Conhece alguma outra razão pela qual não deveria pratica atividade física</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="razao_atividade" name="razao_atividade" value="{{old('razao_atividade')}}">
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Foi submetid@ a alguma cirurgia no último ano? Se sim, qual e indique há quanto tempo.</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="questao_cirurgia" name="questao_cirurgia" value="{{old('questao_cirurgia')}}">
                    </div>
                </div>

                <div class="form-group">
                    <h6 style="color:black">Está grávida?</h6>
                    <div class="form-check col-md-12 col-sm-12 mt-1">
                        @if(old('questao_medicacao') == "sim")
                            <input type="radio" id="questao_gravida1" name="questao_gravida" value="sim" checked>
                        @else
                            <input type="radio" id="questao_gravida1" name="questao_gravida" value="sim">
                        @endif
                        <label class="form-check-label" for="questao_gravida1">Sim</label><br>
                        @if(old('questao_medicacao') == "nao")
                            <input type="radio" id="questao_gravida2" name="questao_gravida" value="nao" checked>
                        @else
                            <input type="radio" id="questao_gravida2" name="questao_gravida" value="nao">
                        @endif
                        <label class="form-check-label" for="questao_gravida2">Não</label>

                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Toma alguma medicação?</h6>
                    <div class="form-check col-md-12 col-sm-12 mt-3">
                        @if(old('questao_medicacao') == "sim")
                            <input type="radio" id="questao_medicacao1" name="questao_medicacao" value="sim" checked>
                        @else
                            <input type="radio" id="questao_medicacao1" name="questao_medicacao" value="sim">
                        @endif
                        <label class="form-check-label" for="questao_medicacao1">Sim</label><br>
                        @if(old('questao_medicacao') == "nao")
                            <input type="radio" id="questao_medicacao2" name="questao_medicacao" value="nao" checked>
                        @else
                            <input type="radio" id="questao_medicacao2" name="questao_medicacao" value="nao">
                        @endif
                        <label class="form-check-label" for="questao_medicacao2">Não</label>
                    </div>
                </div>

                <div class="form-group">
                    <h6 style="color:black">Anamnese Desportiva</h6>
                    <div class="col-md-12 text-center">
                        <table class="table">
                            <thead>
                            <tr>
                                <td></td>
                                <td>Sim</td>
                                <td>Não</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Já praticou outro tipo de exercício físico?</td>
                                <td>
                                    @if(old('ana_desportiva1') == "sim")
                                        <input type="radio" id="ana_desportiva11" name="ana_desportiva1" value="sim" checked>
                                    @else
                                        <input type="radio" id="ana_desportiva11" name="ana_desportiva1" value="sim">
                                    @endif
                                </td>
                                <td>
                                    @if(old('ana_desportiva1') == "nao")
                                        <input type="radio" id="ana_desportiva12" name="ana_desportiva1" value="nao" checked>
                                    @else
                                        <input type="radio" id="ana_desportiva12" name="ana_desportiva1" value="nao">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Atualmente pratica exercício físico?</td>
                                <td>
                                    @if(old('ana_desportiva2') == "sim")
                                        <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="sim" checked>
                                    @else
                                        <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="sim">
                                    @endif
                                </td>
                                <td>
                                    @if(old('ana_desportiva2') == "nao")
                                        <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="nao" checked>
                                    @else
                                        <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="nao">
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <h3>Ficha Anamnese</h3>
                <div class="form-group">
                    <h6 style="color:black">Como teve conhecimento do meu trabalho?</h6>
                    <div class="form-check col-md-12 col-sm-12">
                        @if(old('questao_trabalho') == "insta")
                            <input type="radio" id="questao_trabalho1" name="questao_trabalho" value="insta" checked>
                        @else
                            <input type="radio" id="questao_trabalho1" name="questao_trabalho" value="insta">
                        @endif
                        <label class="form-check-label" for="questao_trabalho1">Instagram</label><br>
                        @if(old('questao_trabalho') == "fb")
                            <input type="radio" id="questao_trabalho2" name="questao_trabalho" value="fb" checked>
                        @else
                            <input type="radio" id="questao_trabalho2" name="questao_trabalho" value="fb" >
                        @endif
                        <label class="form-check-label" for="questao_trabalho2">Facebook</label><br>
                        @if(old('questao_trabalho') == "amigos")
                            <input type="radio" id="questao_trabalho3" name="questao_trabalho" value="amigos" checked>
                        @else
                            <input type="radio" id="questao_trabalho3" name="questao_trabalho" value="amigos">
                        @endif
                        <label class="form-check-label" for="questao_trabalho3">Amigos</label><br>
                        @if(old('questao_trabalho') == "ginasio")
                            <input type="radio" id="questao_trabalho4" name="questao_trabalho" value="ginasio" checked>
                        @else
                            <input type="radio" id="questao_trabalho4" name="questao_trabalho" value="ginasio" >
                        @endif
                        <label class="form-check-label" for="questao_trabalho4">Ginásio</label><br>
                        @if(old('questao_trabalho') == "outro")
                            <input type="radio" id="questao_trabalho5" name="questao_trabalho" value="outro" checked>
                        @else
                            <input type="radio" id="questao_trabalho5" name="questao_trabalho" value="outro">
                        @endif
                        <input type="text" name="outro_trabalho" placeholder="Outra opção" value="{{old('outro_trabalho')}}"><br>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Descarregue fotografias (De frente/De lado/De costas)</h6>
                    <div class="form-group custom-file mb-3">
                        <label class="custom-file-label" for="fotoFrente">Foto de frente</label>
                        <input type="file" class="custom-file-input" name="fotoFrente" id="fotoFrente">
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <div class="form-group custom-file mb-3">
                        <label class="custom-file-label" for="fotoLado">Foto de lado</label>
                        <input type="file" class="custom-file-input" name="fotoLado" id="fotoLado">
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                    <div class="form-group custom-file mb-3">
                        <label class="custom-file-label" for="fotoCostas">Foto de costas</label>
                        <input type="file" class="custom-file-input" name="fotoCostas" id="fotoCostas">
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Observações</h6>
                    <div class="col-md-12">
                        <textarea class="form-control" type="text" id="observacoes" name="observacoes">{{old('observacoes')}}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button class="btn btn-danger">Submeter Avaliação</button>
                </div>
            </form>
        </div>
    </div>

@endsection
