@extends('layouts.admin_layout')

@section('content')
    <div class="avaliacao">
        <div class="col-md-12" style="padding: 25px;">
            <form action="{{ route('feedback.store') }}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div>
                    <h1>Criar Avaliação Inicial</h1>
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
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Cansaço?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Muito cansad@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="cansaco1">1</label><br>
                                    @if($feedback->cansaco == 1)
                                        <input type="radio" id="cansaco1" name="cansaco" value="1" checked>
                                    @else
                                        <input type="radio" id="cansaco1" name="cansaco" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="cansaco2">2</label><br>
                                    @if($feedback->cansaco == 2)
                                        <input type="radio" id="cansaco2" name="cansaco" value="2" checked>
                                    @else
                                        <input type="radio" id="cansaco2" name="cansaco" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="cansaco3">3</label><br>
                                    @if($feedback->cansaco == 3)
                                        <input type="radio" id="cansaco3" name="cansaco" value="3" checked>
                                    @else
                                        <input type="radio" id="cansaco3" name="cansaco" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="cansaco4">4</label><br>
                                    @if($feedback->cansaco == 4)
                                        <input type="radio" id="cansaco4" name="cansaco" value="4" checked>
                                    @else
                                        <input type="radio" id="cansaco4" name="cansaco" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="cansaco5">5</label><br>
                                    @if($feedback->cansaco == 5)
                                        <input type="radio" id="cansaco5" name="cansaco" value="5" checked>
                                    @else
                                        <input type="radio" id="cansaco5" name="cansaco" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Nada cansad@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Fome?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Muita fome
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="fome1">1</label><br>
                                    @if($feedback->fome == 1)
                                        <input type="radio" id="fome1" name="fome" value="1" checked>
                                    @else
                                        <input type="radio" id="fome1" name="fome" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="fome2">2</label><br>
                                    @if($feedback->fome == 2)
                                        <input type="radio" id="fome2" name="fome" value="2" checked>
                                    @else
                                        <input type="radio" id="fome2" name="fome" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="fome3">3</label><br>
                                    @if($feedback->fome == 3)
                                        <input type="radio" id="fome3" name="fome" value="3" checked>
                                    @else
                                        <input type="radio" id="fome3" name="fome" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="fome4">4</label><br>
                                    @if($feedback->fome == 4)
                                        <input type="radio" id="fome4" name="fome" value="4" checked>
                                    @else
                                        <input type="radio" id="fome4" name="fome" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="fome5">5</label><br>
                                    @if($feedback->fome == 5)
                                        <input type="radio" id="fome5" name="fome" value="5" checked>
                                    @else
                                        <input type="radio" id="fome5" name="fome" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Nenhuma fome
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Qualidade de Sono?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Muito má
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sono1">1</label><br>
                                    @if($feedback->sono == 1)
                                        <input type="radio" id="sono1" name="sono" value="1" checked>
                                    @else
                                        <input type="radio" id="sono1" name="sono" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sono2">2</label><br>
                                    @if($feedback->sono == 2)
                                        <input type="radio" id="sono2" name="sono" value="2" checked>
                                    @else
                                        <input type="radio" id="sono2" name="sono" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sono">3</label><br>
                                    @if($feedback->sono == 3)
                                        <input type="radio" id="sono3" name="sono" value="3" checked>
                                    @else
                                        <input type="radio" id="sono3" name="sono" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sono4">4</label><br>
                                    @if($feedback->sono == 4)
                                        <input type="radio" id="sono4" name="sono" value="4" checked>
                                    @else
                                        <input type="radio" id="sono4" name="sono" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="sono">5</label><br>
                                    @if($feedback->sono == 5)
                                        <input type="radio" id="sono5" name="sono" value="5" checked>
                                    @else
                                        <input type="radio" id="sono5" name="sono" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Muito Boa
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Humor?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Péssimo humor
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="humor1">1</label><br>
                                    @if($feedback->humor == 1)
                                        <input type="radio" id="humor1" name="humor" value="1" checked>
                                    @else
                                        <input type="radio" id="humor1" name="humor" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="humor2">2</label><br>
                                    @if($feedback->sono == 2)
                                        <input type="radio" id="humor2" name="humor" value="2" checked>
                                    @else
                                        <input type="radio" id="humor2" name="humor" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="humor3">3</label><br>
                                    @if($feedback->sono == 3)
                                        <input type="radio" id="humor3" name="humor" value="3" checked>
                                    @else
                                        <input type="radio" id="humor3" name="humor" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="humor4">4</label><br>
                                    @if($feedback->sono == 4)
                                        <input type="radio" id="humor4" name="humor" value="4" checked>
                                    @else
                                        <input type="radio" id="humor4" name="humor" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="humor5">5</label><br>
                                    @if($feedback->sono == 5)
                                        <input type="radio" id="humor5" name="humor" value="5" checked>
                                    @else
                                        <input type="radio" id="humor5" name="humor" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Excelente Humor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Motivação?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Nada motivad@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao1">1</label><br>
                                    @if($feedback->motivacao == 1)
                                        <input type="radio" id="motivacao1" name="motivacao" value="1" checked>
                                    @else
                                        <input type="radio" id="motivacao1" name="motivacao" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao2">2</label><br>
                                    @if($feedback->motivacao == 2)
                                        <input type="radio" id="motivacao2" name="motivacao" value="2" checked>
                                    @else
                                        <input type="radio" id="motivacao2" name="motivacao" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao3">3</label><br>
                                    @if($feedback->motivacao == 3)
                                        <input type="radio" id="motivacao3" name="motivacao" value="3" checked>
                                    @else
                                        <input type="radio" id="motivacao3" name="motivacao" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao4">4</label><br>
                                    @if($feedback->motivacao == 4)
                                        <input type="radio" id="motivacao4" name="motivacao" value="4" checked>
                                    @else
                                        <input type="radio" id="motivacao4" name="motivacao" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="motivacao5">5</label><br>
                                    @if($feedback->motivacao == 5)
                                        <input type="radio" id="motivacao5" name="motivacao" value="5" checked>
                                    @else
                                        <input type="radio" id="motivacao5" name="motivacao" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Extremamente motivad@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Como te sentes a nível de Stress?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Muito stressad@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="stress1">1</label><br>
                                    @if($feedback->stress == 1)
                                        <input type="radio" id="stress1" name="stress" value="1" checked>
                                    @else
                                        <input type="radio" id="stress1" name="stress" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="stress2">2</label><br>
                                    @if($feedback->stress == 2)
                                        <input type="radio" id="stress2" name="stress" value="2" checked>
                                    @else
                                        <input type="radio" id="stress2" name="stress" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="stress3">3</label><br>
                                    @if($feedback->stress == 3)
                                        <input type="radio" id="stress3" name="stress" value="3" checked>
                                    @else
                                        <input type="radio" id="stress3" name="stress" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="stress4">4</label><br>
                                    @if($feedback->stress == 4)
                                        <input type="radio" id="stress4" name="stress" value="4" checked>
                                    @else
                                        <input type="radio" id="stress4" name="stress" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="stress5">5</label><br>
                                    @if($feedback->stress == 5)
                                        <input type="radio" id="stress5" name="stress" value="5" checked>
                                    @else
                                        <input type="radio" id="stress5" name="stress" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Nada stressad@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">O quão satisfeito estás com os meus serviços? Assinale uma opção entre 0 e 5.</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Nada satisfeit@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao1">1</label><br>
                                    @if($feedback->satisfacao == 1)
                                        <input type="radio" id="satisfacao1" name="satisfacao" value="1" checked>
                                    @else
                                        <input type="radio" id="satisfacao1" name="satisfacao" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao2">2</label><br>
                                    @if($feedback->satisfacao == 2)
                                        <input type="radio" id="satisfacao2" name="satisfacao" value="2" checked>
                                    @else
                                        <input type="radio" id="satisfacao2" name="satisfacao" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao3">3</label><br>
                                    @if($feedback->satisfacao == 3)
                                        <input type="radio" id="satisfacao3" name="satisfacao" value="3" checked>
                                    @else
                                        <input type="radio" id="satisfacao3" name="satisfacao" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao4">4</label><br>
                                    @if($feedback->satisfacao == 4)
                                        <input type="radio" id="satisfacao4" name="satisfacao" value="4" checked>
                                    @else
                                        <input type="radio" id="satisfacao4" name="satisfacao" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao5">5</label><br>
                                    @if($feedback->satisfacao == 5)
                                        <input type="radio" id="satisfacao5" name="satisfacao" value="5" checked>
                                    @else
                                        <input type="radio" id="satisfacao5" name="satisfacao" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Extremamente satisfeit@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Quais das seguintes palavras descrevem os treinos que decorreram até agora? Selecione as opções que caracterizam os mesmos.</h6>
                        <div class="col-md-12 ml-4 text-center">
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->divertidos)
                                    <input class="form-check-input" type="checkbox" id="opiniao1" name="opiniao1" value="divertidos" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao1" name="opiniao1" value="divertidos">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Divertidos
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->monotonos)
                                    <input class="form-check-input" type="checkbox" id="opiniao2" name="opiniao2" value="monotonos" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao2" name="opiniao2" value="monotonos">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Monótonos
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->desafiantes)
                                    <input class="form-check-input" type="checkbox" id="opiniao3" name="opiniao3" value="desafiantes" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao3" name="opiniao3" value="desafiantes">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Desafiantes
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->faceis)
                                    <input class="form-check-input" type="checkbox" id="opiniao4" name="opiniao4" value="faceis" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao4" name="opiniao4" value="faceis">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Fáceis
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->dificeis)
                                    <input class="form-check-input" type="checkbox" id="opiniao5" name="opiniao5" value="dificeis" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao5" name="opiniao5" value="dificeis">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dificeis
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->educacionais)
                                    <input class="form-check-input" type="checkbox" id="opiniao6" name="opiniao6" value="educacionais" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao6" name="opiniao6" value="educacionais">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Educacionais
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->eficazes)
                                    <input class="form-check-input" type="checkbox" id="opiniao7" name="opiniao7" value="eficazes" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao7" name="opiniao7" value="eficazes">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Eficazes
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                @if($feedback->opiniao->ineficazes)
                                    <input class="form-check-input" type="checkbox" id="opiniao8" name="opiniao8" value="ineficazes" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" id="opiniao8" name="opiniao8" value="ineficazes">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    Ineficazes
                                </label>
                            </div>
                            <div class="row col-md-12 mt-2">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if($feedback->opiniao->outra)
                                            <input class="form-check-input mt-2" type="checkbox" id="opiniao9" name="opiniao9" value="outra" checked>
                                        @else
                                            <input class="form-check-input mt-2" type="checkbox" id="opiniao9" name="opiniao9" value="outra">
                                        @endif
                                        <label class="form-check-label" for="flexCheckDefault">Outra:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="outra_opiniao" value="{{$feedback->opiniao->opiniao_outro}}">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Quão provável recomendarias os meus serviços a outra pessoa? Selecione uma opção de 0 a 10.</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-1 col-1 mt-3">
                                    Totalmente improvável
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao1">1</label><br>
                                    @if($feedback->recomendacao == 1)
                                        <input type="radio" id="recomendacao1" name="recomendacao" value="1" checked>
                                    @else
                                        <input type="radio" id="recomendacao1" name="recomendacao" value="1">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao2">2</label><br>
                                    @if($feedback->recomendacao == 2)
                                        <input type="radio" id="recomendacao2" name="recomendacao" value="2" checked>
                                    @else
                                        <input type="radio" id="recomendacao2" name="recomendacao" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao3">3</label><br>
                                    @if($feedback->recomendacao == 3)
                                        <input type="radio" id="recomendacao3" name="recomendacao" value="3" checked>
                                    @else
                                        <input type="radio" id="recomendacao3" name="recomendacao" value="3">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao4">4</label><br>
                                    @if($feedback->recomendacao == 4)
                                        <input type="radio" id="recomendacao4" name="recomendacao" value="4" checked>
                                    @else
                                        <input type="radio" id="recomendacao4" name="recomendacao" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao5">5</label><br>
                                    @if($feedback->recomendacao == 5)
                                        <input type="radio" id="recomendacao5" name="recomendacao" value="5" checked>
                                    @else
                                        <input type="radio" id="recomendacao5" name="recomendacao" value="5">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao6">6</label><br>
                                    @if($feedback->recomendacao == 6)
                                        <input type="radio" id="recomendacao6" name="recomendacao" value="6" checked>
                                    @else
                                        <input type="radio" id="recomendacao6" name="recomendacao" value="6">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao7">7</label><br>
                                    @if($feedback->recomendacao == 7)
                                        <input type="radio" id="recomendacao7" name="recomendacao" value="7" checked>
                                    @else
                                        <input type="radio" id="recomendacao7" name="recomendacao" value="7">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao8">8</label><br>
                                    @if($feedback->recomendacao == 8)
                                        <input type="radio" id="recomendacao8" name="recomendacao" value="8" checked>
                                    @else
                                        <input type="radio" id="recomendacao8" name="recomendacao" value="8">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao9">9</label><br>
                                    @if($feedback->recomendacao == 9)
                                        <input type="radio" id="recomendacao9" name="recomendacao" value="9" checked>
                                    @else
                                        <input type="radio" id="recomendacao9" name="recomendacao" value="9">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="recomendacao10">10</label><br>
                                    @if($feedback->recomendacao == 10)
                                        <input type="radio" id="recomendacao10" name="recomendacao" value="10" checked>
                                    @else
                                        <input type="radio" id="recomendacao10" name="recomendacao" value="10">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1 mt-3">
                                    Extremamente provável
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Quão satisfeito estás com os treinos, no modo geral?</h6>
                        <div class="form-check col-md-12 col-sm-12">
                            <div class="row text-center">
                                <div class="col-md-4 col-4 mt-3">
                                    Nada satisfeit@
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao_treino1">1</label><br>
                                    @if($feedback->satisfacao_treino == 1)
                                        <input type="radio" id="satisfacao_treino1" name="satisfacao_treino" value="1" checked>
                                    @else
                                        <input type="radio" id="satisfacao_treino1" name="satisfacao_treino" value="1">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao_treino2">2</label><br>
                                    @if($feedback->satisfacao_treino == 2)
                                        <input type="radio" id="satisfacao_treino2" name="satisfacao_treino" value="2" checked>
                                    @else
                                        <input type="radio" id="satisfacao_treino2" name="satisfacao_treino" value="2">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao_treino3">3</label><br>
                                    @if($feedback->satisfacao_treino == 3)
                                        <input type="radio" id="satisfacao_treino3" name="satisfacao_treino" value="3" checked>
                                    @else
                                        <input type="radio" id="satisfacao_treino3" name="satisfacao_treino" value="3">
                                    @endif
                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao_treino4">4</label><br>
                                    @if($feedback->satisfacao_treino == 4)
                                        <input type="radio" id="satisfacao_treino4" name="satisfacao_treino" value="4" checked>
                                    @else
                                        <input type="radio" id="satisfacao_treino4" name="satisfacao_treino" value="4">
                                    @endif

                                </div>
                                <div class="col-md-1 col-1">
                                    <label class="form-check-label" for="satisfacao_treino5">5</label><br>
                                    @if($feedback->satisfacao_treino == 5)
                                        <input type="radio" id="satisfacao_treino5" name="satisfacao_treino" value="5" checked>
                                    @else
                                        <input type="radio" id="satisfacao_treino5" name="satisfacao_treino" value="5">
                                    @endif

                                </div>
                                <div class="col-md-3 col-3 mt-3">
                                    Extremamente satisfeit@
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="color:black">Dá o teu feedback geral sobre o meu desempenho como Personal Trainer e sobre os treinos.</h6>
                        <div class="col-md-12">
                            <textarea class="form-control" type="text" id="feedback" name="feedback">{{$feedback->feedback}}</textarea>
                        </div>
                    </div>
@endsection
