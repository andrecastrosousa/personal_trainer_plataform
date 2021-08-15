@extends('layouts.admin_layout')

@section('content')
    <div class="avaliacao">
        <div class="offset-md-2 col-md-8" style="padding: 25px;">
            <div>
                <h1>Avaliação Inicial de {{$user->name}}</h1>
                <hr>
                <h3>Informação Pessoal</h3>

                <div class="form-group">
                    <h6 style="color:black">Data de Nascimento</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" value="{{$user->data_nascimento}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Profissão</h6>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="profissao" name="profissao" value="{{$user->profissao}}" placeholder="Insira a sua profissão" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Telemóvel</h6>
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="telemovel" name="telemovel" value="{{$user->telemovel}}" placeholder="Insira o seu número de telemóvel" disabled>
                    </div>
                </div>


                <hr>
                <h3>Avaliação</h3>
                <div class="form-group">
                    <h6 style="color:black">Altura</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="altura" name="altura" value="{{$user->altura}}" placeholder="Insira a sua altura" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Peso Corporal</h6>
                    <div class="col-md-12">
                        <input class="form-control " type="text" id="peso" name="peso" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->peso}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro da Cintura</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="cintura_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->cintura}}" disabled name="cintura_perimetro">
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro da Coxa</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="coxa_perimetro" name="coxa_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->coxa}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro do Quadril</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="quadril_perimetro" name="quadril_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->quadril}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro Abdominal</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="abs_perimetro" name="abs_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->abdominal}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro do Braço</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="braco_perimetro" name="braco_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->braco}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Perímetro do Peito</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="peito_perimetro" name="peito_perimetro" value="{{\App\Models\Condicao::where('user_id', $user->id)->first()->peito}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Horas Diárias de trabalho</h6>
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="horas_trabalho" name="horas_trabalho" value="{{$avaliacao->horas_trabalho}}" disabled>

                    </div>
                </div>
                <div class="form-group">
                    <h6 style="color:black">Horas diárias de sono</h6>
                    <div class="col-md-12">
                        <input class="form-control " type="text" id="horas_sono" name="horas_sono" value="{{$avaliacao->horas_diarias}}" disabled>

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
                                @if($avaliacao->sedentarismo == 1)
                                    <input type="radio" id="sedentarismo1" name="sedentarismo" value="1" checked disabled>
                                @else
                                    <input type="radio" id="sedentarismo1" name="sedentarismo" value="1" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="sedentarismo2">2</label><br>
                                @if($avaliacao->sedentarismo == 2)
                                    <input type="radio" id="sedentarismo2" name="sedentarismo" value="2" checked disabled>
                                @else
                                    <input type="radio" id="sedentarismo2" name="sedentarismo" value="2" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="sedentarismo3">3</label><br>
                                @if($avaliacao->sedentarismo == 3)
                                    <input type="radio" id="sedentarismo3" name="sedentarismo" value="3" checked disabled>
                                @else
                                    <input type="radio" id="sedentarismo3" name="sedentarismo" value="3" disabled>
                                @endif
                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="sedentarismo4">4</label><br>
                                @if($avaliacao->sedentarismo == 4)
                                    <input type="radio" id="sedentarismo4" name="sedentarismo" value="4" checked disabled>
                                @else
                                    <input type="radio" id="sedentarismo4" name="sedentarismo" value="4" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="sedentarismo5">5</label><br>
                                @if($avaliacao->sedentarismo == 5)
                                    <input type="radio" id="sedentarismo5" name="sedentarismo" value="5" checked disabled>
                                @else
                                    <input type="radio" id="sedentarismo5" name="sedentarismo" value="5" disabled>
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
                            @if($avaliacao->objetivo->perder_peso)
                                <input class="form-check-input" type="checkbox" id="objetivo1" name="objetivo1" value="perder" checked disabled>
                            @else
                                <input class="form-check-input" type="checkbox" id="objetivo1" name="objetivo1" value="perder" disabled>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Perder peso
                            </label>
                        </div>
                        <div class="row col-md-12 mt-2">
                            @if($avaliacao->objetivo->hipertrofia)
                                <input class="form-check-input" type="checkbox" id="objetivo2" name="objetivo2" value="hipertrofia" checked disabled>
                            @else
                                <input class="form-check-input" type="checkbox" id="objetivo2" name="objetivo2" value="hipertrofia" disabled>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Hipertropfia/Ganhar massa muscular
                            </label>
                        </div>
                        <div class="row col-md-12 mt-2">
                            @if($avaliacao->objetivo->melhorar_condicao)
                                <input class="form-check-input" type="checkbox" id="objetivo3" name="objetivo3" value="fisica" checked disabled>
                            @else
                                <input class="form-check-input" type="checkbox" id="objetivo3" name="objetivo3" value="fisica" disabled>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Melhorar condição física/saúde
                            </label>
                        </div>
                        <div class="row col-md-12 mt-2">
                            @if($avaliacao->objetivo->melhorar_mental)
                                <input class="form-check-input" type="checkbox" id="objetivo4" name="objetivo4" value="mental" checked disabled>
                            @else
                                <input class="form-check-input" type="checkbox" id="objetivo4" name="objetivo4" value="mental" disabled>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                Melhor saúde mental
                            </label>
                        </div>
                        <div class="row col-md-12 mt-2">
                            @if($avaliacao->objetivo->outro)
                                <input class="form-check-input mt-2" type="checkbox" id="objetivo5" name="objetivo5" value="outro" checked disabled>
                            @else
                                <input class="form-check-input mt-2" type="checkbox" id="objetivo5" name="objetivo5" value="outro" disabled>
                            @endif
                            <label class="form-check-label" for="flexCheckDefault">
                                <input type="text" class="form-control" name="objetivoOutro" value="{{$avaliacao->objetivo->outro_objetivo}}" disabled>
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
                                @if($avaliacao->motivacao == 1)
                                    <input type="radio" id="motivacao1" name="motivacao" value="1" checked disabled>
                                @else
                                    <input type="radio" id="motivacao1" name="motivacao" value="1" disabled>
                                @endif
                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="motivacao2">2</label><br>
                                @if($avaliacao->motivacao == 2)
                                    <input type="radio" id="motivacao2" name="motivacao" value="2" checked disabled>
                                @else
                                    <input type="radio" id="motivacao2" name="motivacao" value="2" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="motivacao3">3</label><br>
                                @if($avaliacao->motivacao == 3)
                                    <input type="radio" id="motivacao3" name="motivacao" value="3" checked disabled>
                                @else
                                    <input type="radio" id="motivacao3" name="motivacao" value="3" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="motivacao4">4</label><br>
                                @if($avaliacao->motivacao == 4)
                                    <input type="radio" id="motivacao4" name="motivacao" value="4" checked disabled>
                                @else
                                    <input type="radio" id="motivacao4" name="motivacao" value="4" disabled>
                                @endif

                            </div>
                            <div class="col-md-1 col-1">
                                <label class="form-check-label" for="motivacao5">5</label><br>
                                @if($avaliacao->motivacao == 5)
                                    <input type="radio" id="motivacao5" name="motivacao" value="5" checked disabled>
                                @else
                                    <input type="radio" id="motivacao5" name="motivacao" value="5" disabled>
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
                        @if($avaliacao->treinos_semana == 1)
                            <input type="radio" id="treino1" name="treino" value="1" checked disabled>
                        @else
                            <input type="radio" id="treino1" name="treino" value="1" disabled>
                        @endif
                        <label class="form-check-label" for="treino1">1</label><br>

                        @if($avaliacao->treinos_semana == 2)
                            <input type="radio" id="treino2" name="treino" value="2" checked disabled>
                        @else
                            <input type="radio" id="treino2" name="treino" value="2" disabled>
                        @endif
                        <label class="form-check-label" for="treino2">2</label><br>

                        @if($avaliacao->treinos_semana == 3)
                            <input type="radio" id="treino3" name="treino" value="3" checked disabled>
                        @else
                            <input type="radio" id="treino3" name="treino" value="3" disabled>
                        @endif
                        <label class="form-check-label" for="treino3">3</label><br>

                        @if($avaliacao->treinos_semana == 4)
                            <input type="radio" id="treino4" name="treino" value="4" checked disabled>
                        @else
                            <input type="radio" id="treino4" name="treino" value="4" disabled>
                        @endif
                        <label class="form-check-label" for="treino4">4</label><br>

                        @if($avaliacao->treinos_semana == 5)
                            <input type="radio" id="treino5" name="treino" value="5" checked disabled>
                        @else
                            <input type="radio" id="treino5" name="treino" value="5" disabled>
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
                        @if($avaliacao->anamneseClinica->asma)
                            <input class="form-check-input" type="checkbox" id="clinica1" name="clinica1" value="asma" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica1" name="clinica1" value="asma" disabled>
                        @endif
                        <label class="form-check-label" for="clinica1">
                            Asma
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->cardiorrespiratorias)
                            <input class="form-check-input" type="checkbox" id="clinica2" name="clinica2" value="cardiorrespiratorias" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica2" name="clinica2" value="cardiorrespiratorias" disabled>
                        @endif
                        <label class="form-check-label" for="clinica2">
                            Cardiorrespiratórias
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->depressao)
                            <input class="form-check-input" type="checkbox" id="clinica3" name="clinica3" value="depressao" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica3" name="clinica3" value="depressao" disabled>
                        @endif
                        <label class="form-check-label" for="clinica3">
                            Depressão
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->diabetes)
                            <input class="form-check-input" type="checkbox" id="clinica4" name="clinica4" value="diabetes" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica4" name="clinica4" value="diabetes" disabled>
                        @endif
                        <label class="form-check-label" for="clinica4">
                            Diabetes
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->hipertensao)
                            <input class="form-check-input" type="checkbox" id="clinica5" name="clinica5" value="hipertensao" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica5" name="clinica5" value="hipertensao" disabled>
                        @endif
                        <label class="form-check-label" for="clinica5">
                            Hipertensão
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->hipotensao)
                            <input class="form-check-input" type="checkbox" id="clinica6" name="clinica6" value="hipotensao" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica6" name="clinica6" value="hipotensao" disabled>
                        @endif
                        <label class="form-check-label" for="clinica6">
                            Hipotensão
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->lesoes)
                            <input class="form-check-input" type="checkbox" id="clinica7" name="clinica7" value="lesoes" disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica7" name="clinica7" value="lesoes" disabled>
                        @endif
                        <label class="form-check-label" for="clinica7">
                            Lesões
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->musculares)
                            <input class="form-check-input" type="checkbox" id="clinica8" name="clinica8" value="musculares" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica8" name="clinica8" value="musculares" disabled>
                        @endif
                        <label class="form-check-label" for="clinica8">
                            Musculares
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->osteoarticulares)
                            <input class="form-check-input" type="checkbox" id="clinica9" name="clinica9" value="osteoarticulares" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica9" name="clinica9" value="osteoarticulares" disabled>
                        @endif
                        <label class="form-check-label" for="clinica9">
                            Osteoarticulares
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->pressao_arterial)
                            <input class="form-check-input" type="checkbox" id="clinica10" name="clinica10" value="arterial" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica10" name="clinica10" value="arterial" disabled>
                        @endif
                        <label class="form-check-label" for="clinica5">
                            Pressão Arterial
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->problemas_coluna)
                            <input class="form-check-input" type="checkbox" id="clinica11" name="clinica11" value="coluna" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica11" name="clinica11" value="coluna" disabled>
                        @endif
                        <label class="form-check-label" for="clinica11">
                            Problemas de Coluna
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->tiroide)
                            <input class="form-check-input" type="checkbox" id="clinica12" name="clinica12" value="tiróide" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica12" name="clinica12" value="tiróide" disabled>
                        @endif
                        <label class="form-check-label" for="clinica12">
                            Tiróide
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->renais)
                            <input class="form-check-input" type="checkbox" id="clinica13" name="clinica13" value="renais" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica13" name="clinica13" value="renais" disabled>
                        @endif
                        <label class="form-check-label" for="clinica13">
                            Renais
                        </label>
                    </div>
                    <div class="row col-md-12">
                        @if($avaliacao->anamneseClinica->outro)
                            <input class="form-check-input" type="checkbox" id="clinica14" name="clinica14" value="outro" checked disabled>
                        @else
                            <input class="form-check-input" type="checkbox" id="clinica14" name="clinica14" value="outro" disabled>
                        @endif
                        <label class="form-check-label" for="clinica14">
                            <input type="text" class="form-control" name="clinicaOutro" value="{{$avaliacao->anamneseClinica->outro_anamnese}}" disabled>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h6 style="color:black">PAR_Q & YOU</h6>
                <div class="col-md-12 text-left">
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
                                @if($avaliacao->parq1 == "sim")
                                    <input type="radio"  id="parq11" name="parq1" value="sim" checked disabled>
                                @else
                                    <input type="radio"  id="parq11" name="parq1" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq1 == "nao")
                                    <input type="radio"  id="parq12" name="parq1" value="nao" checked disabled>
                                @else
                                    <input type="radio"  id="parq12" name="parq1" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Sente dores no peito enquanto pratica algum tipo de atividade física?</td>
                            <td>
                                @if($avaliacao->parq2 == "sim")
                                    <input type="radio" id="parq21" name="parq2" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="parq21" name="parq2" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq2 == "nao")
                                    <input type="radio" id="parq22" name="parq2" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="parq22" name="parq2" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>No mês passado, sentiu dores no peito enquanto não estava a praticar atividade física?</td>
                            <td>
                                @if($avaliacao->parq3 == "sim")
                                    <input type="radio" id="parq31" name="parq3" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="parq31" name="parq3" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq3 == "nao")
                                    <input type="radio" id="parq32" name="parq3" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="parq32" name="parq3" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Alguma vez perdeu o equilíbrio devido a tonturas ou perdeu a consciência durante a prática de exercício físico?</td>
                            <td>
                                @if($avaliacao->parq4 == "sim")
                                    <input type="radio" id="parq41" name="parq4" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="parq41" name="parq4" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq4 == "nao")
                                    <input type="radio" id="parq42" name="parq4" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="parq42" name="parq4" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tem problemas ósseos ou articulares que possam piorar com o início da atividade física?</td>
                            <td>
                                @if($avaliacao->parq5 == "sim")
                                    <input type="radio" id="parq51" name="parq5" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="parq51" name="parq5" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq5 == "nao")
                                    <input type="radio" id="parq52" name="parq5" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="parq52" name="parq5" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>O seu médico prescreve-lhe algum medicamento para a sua pressão arterial ou doença cardíaca?</td>
                            <td>
                                @if($avaliacao->parq6 == "sim")
                                    <input type="radio" id="parq61" name="parq6" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="parq61" name="parq6" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->parq6 == "nao")
                                    <input type="radio" id="parq62" name="parq6" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="parq62" name="parq6" value="nao" disabled>
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
                    <input class="form-control" type="text" id="razao_atividade" name="razao_atividade" value="{{$avaliacao->questao_atividade}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <h6 style="color:black">Foi submetid@ a alguma cirurgia no último ano? Se sim, qual e indique há quanto tempo.</h6>
                <div class="col-md-12">
                    <input class="form-control" type="text" id="questao_cirurgia" name="questao_cirurgia" value="{{$avaliacao->questao_cirurgia}}" disabled>
                </div>
            </div>

            <div class="form-group">
                <h6 style="color:black">Está grávida?</h6>
                <div class="form-check col-md-12 col-sm-12 mt-1">
                    @if($avaliacao->questao_gravidez == "sim")
                        <input type="radio" id="questao_gravida1" name="questao_gravida" value="sim" checked disabled>
                    @else
                        <input type="radio" id="questao_gravida1" name="questao_gravida" value="sim" disabled>
                    @endif
                    <label class="form-check-label" for="questao_gravida1">Sim</label><br>
                    @if($avaliacao->questao_gravidez == "nao")
                        <input type="radio" id="questao_gravida2" name="questao_gravida" value="nao" checked disabled>
                    @else
                        <input type="radio" id="questao_gravida2" name="questao_gravida" value="nao" disabled>
                    @endif
                    <label class="form-check-label" for="questao_gravida2">Não</label>

                </div>
            </div>
            <div class="form-group">
                <h6 style="color:black">Toma alguma medicação?</h6>
                <div class="form-check col-md-12 col-sm-12 mt-3">
                    @if($avaliacao->questao_medicacao == "sim")
                        <input type="radio" id="questao_medicacao1" name="questao_medicacao" value="sim" checked disabled>
                    @else
                        <input type="radio" id="questao_medicacao1" name="questao_medicacao" value="sim" disabled>
                    @endif
                    <label class="form-check-label" for="questao_medicacao1">Sim</label><br>
                    @if($avaliacao->questao_medicacao == "nao")
                        <input type="radio" id="questao_medicacao2" name="questao_medicacao" value="nao" checked disabled>
                    @else
                        <input type="radio" id="questao_medicacao2" name="questao_medicacao" value="nao" disabled>
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
                                @if($avaliacao->anamnese_desportiva1 == "sim")
                                    <input type="radio" id="ana_desportiva11" name="ana_desportiva1" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="ana_desportiva11" name="ana_desportiva1" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->anamnese_desportiva1 == "nao")
                                    <input type="radio" id="ana_desportiva12" name="ana_desportiva1" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="ana_desportiva12" name="ana_desportiva1" value="nao" disabled>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Atualmente pratica exercício físico?</td>
                            <td>
                                @if($avaliacao->anamnese_desportiva2 == "sim")
                                    <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="sim" checked disabled>
                                @else
                                    <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="sim" disabled>
                                @endif
                            </td>
                            <td>
                                @if($avaliacao->anamnese_desportiva2 == "nao")
                                    <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="nao" checked disabled>
                                @else
                                    <input type="radio" id="ana_desportiva21" name="ana_desportiva2" value="nao" disabled>
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
                    @if($avaliacao->questao_trabalho == "insta")
                        <input type="radio" id="questao_trabalho1" name="questao_trabalho" value="insta" checked disabled>
                    @else
                        <input type="radio" id="questao_trabalho1" name="questao_trabalho" value="insta" disabled>
                    @endif
                    <label class="form-check-label" for="questao_trabalho1">Instagram</label><br>
                    @if($avaliacao->questao_trabalho == "fb")
                        <input type="radio" id="questao_trabalho2" name="questao_trabalho" value="fb" checked disabled>
                    @else
                        <input type="radio" id="questao_trabalho2" name="questao_trabalho" value="fb" disabled>
                    @endif
                    <label class="form-check-label" for="questao_trabalho2">Facebook</label><br>
                    @if($avaliacao->questao_trabalho == "amigos")
                        <input type="radio" id="questao_trabalho3" name="questao_trabalho" value="amigos" checked disabled>
                    @else
                        <input type="radio" id="questao_trabalho3" name="questao_trabalho" value="amigos" disabled>
                    @endif
                    <label class="form-check-label" for="questao_trabalho3">Amigos</label><br>
                    @if($avaliacao->questao_trabalho == "ginasio")
                        <input type="radio" id="questao_trabalho4" name="questao_trabalho" value="ginasio" checked disabled>
                    @else
                        <input type="radio" id="questao_trabalho4" name="questao_trabalho" value="ginasio" disabled>
                    @endif
                    <label class="form-check-label" for="questao_trabalho4">Ginásio</label><br>
                    @if($avaliacao->questao_trabalho == "outro")
                        <input type="radio" id="questao_trabalho5" name="questao_trabalho" value="outro" checked disabled>
                    @else
                        <input type="radio" id="questao_trabalho5" name="questao_trabalho" value="outro" disabled>
                    @endif
                    <input type="text" name="outro_trabalho" placeholder="Outra opção" value="{{$avaliacao->questao_trabalho_outro}}" disabled><br>
                </div>
            </div>
            <div class="form-group">
                <h6 style="color:black">Descarregue fotografias (De frente/De lado/De costas)</h6>
                <div class="form-group custom-file mb-3">
                    @if(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_frente != "")
                        Foto de frente
                        <img src="{{ asset(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_frente) }}" alt="foto de frente">
                    @else
                        Sem fotos
                    @endif
                </div>
                <div class="form-group custom-file mb-3">
                    @if(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_frente != "")
                        Foto de lado
                        <img src="{{ asset(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_lado) }}" alt="foto de lado">
                    @else
                        Sem fotos
                    @endif
                </div>
                <div class="form-group custom-file mb-3">
                    @if(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_costas != "")
                        Foto de costas
                        <img src="{{ asset(\App\Models\FotosProgresso::where('user_id', $user->id)->first()->foto_costas) }}" alt="foto de costas">
                    @else
                        Sem fotos
                    @endif
                </div>
            </div>
            <div class="form-group">
                <h6 style="color:black">Observações</h6>
                <div class="col-md-12">
                    <textarea class="form-control" type="text" id="observacoes" name="observacoes">{{$avaliacao->observacoes}}</textarea>
                </div>
            </div>
            <hr>
        </div>
    </div>

@endsection
