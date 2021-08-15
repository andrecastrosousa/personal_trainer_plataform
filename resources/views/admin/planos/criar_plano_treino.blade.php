@extends('layouts.admin_layout')

@section('content')
    <h1>Criar Plano de Treino</h1>
        <form action="{{ route('clientes.plano_treino.store', $cliente) }}" method="POST">
            @csrf
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <label for="dia1Titulo">
                                <a class="btn btn-link" data-toggle="collapse" style="cursor:pointer" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Dia 1
                                </a>
                            </label>
                            (<input type="text" name="dia1Titulo" id="dia1Titulo" placeholder="Titulo do Dia" required>)
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <a class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg1" style="color:white; cursor:pointer">Adicionar Exercícios</a>
                            <ul class="list-group" id="exerciciosDiaLista1">
                            </ul>
                            <input type="hidden" name="dia1" value="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <a class="btn btn-outline-danger" onclick="renderDia()" style="color:black; cursor:pointer">Adicionar Novo Dia</a>
                </div>
                <div class="col-md-7 text-right">
                    <a class="btn btn-outline-danger" onclick="removeDay()" style="color:black; cursor:pointer">Remover Último Dia</a>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-danger" type="submit">Criar Plano</button>
            </div>
            <input type="hidden" value="{{$plano->id}}" name="plano">
            <input type="hidden" value="{{$cliente}}" name="cliente">
        </form>
    </div>
        @for($i = 1; $i <= 7; $i++)
            <div class="modal fade bd-example-modal-lg{{$i}}" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group" id="myList">
                                    @foreach($tipoExercicios as $tipoExercicio)
                                        <li class="list-group-item"><button style="width: 100%" class="btn btn-link" onclick="filterExercicios({{$tipoExercicio->id}}, {{$i}})">{{$tipoExercicio->nome}} </button></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <h4>Exercícios</h4>
                                <ul class="list-group" id="listaExercicios{{$i}}">
                                    Realize uma pequisa selecionando um filtro do lado esquerdo.
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
@endsection
<script>
    let dia = 1;
    let diaExt = "One";
    let exercicios = @json($exercicios);
    exercicios = JSON.parse(JSON.stringify(exercicios));
    let exerciciosCriados1 = [];
    let exerciciosCriados2 = [];
    let exerciciosCriados3 = [];
    let exerciciosCriados4 = [];
    let exerciciosCriados5 = [];
    let exerciciosCriados6 = [];
    let exerciciosCriados7 = [];
    let nomeFiltroEx;
    let base_url = "{{asset('/')}}";

    function removeDay() {
        if(dia > 1) {

            let coordinationDia = document.getElementById("coordinationDia"+dia);
            document.getElementById("accordion").removeChild(coordinationDia)

            if(dia === 2)
                exerciciosCriados2 = []
            else if(dia === 3)
                exerciciosCriados3 = []
            else if(dia === 4)
                exerciciosCriados4 = []
            else if(dia === 5)
                exerciciosCriados5 = []
            else if(dia === 6)
                exerciciosCriados6 = []
            else
                exerciciosCriados7 = []

            dia -= 1
        }
    }

    function renderDia() {
        if(dia < 7) {
            dia += 1
            if(dia === 2)
                diaExt = "Two"
            else if(dia === 3)
                diaExt = "Three"
            else if(dia === 4)
                diaExt = "Four"
            else if(dia === 5)
                diaExt = "Five"
            else if(dia === 6)
                diaExt = "Six"
            else
                diaExt = "Seven"

            let root = document.getElementById("accordion");



            let divCard = document.createElement("div");
            divCard.classList.add("card");
            divCard.id = "coordinationDia"+dia;

            let divCardHeader = document.createElement("div");
            divCardHeader.classList.add("card-header");
            divCardHeader.id = "heading" + diaExt;

            let h5 = document.createElement("h5");
            h5.classList.add("mb-0");

            let labelHeader = document.createElement("label");
            labelHeader.for = "dia"+dia+"Titulo";


            let buttonDia = document.createElement("a")
            buttonDia.classList.add("btn", "btn-link", "collapsed");
            buttonDia.setAttribute('data-toggle', "collapse");
            buttonDia.setAttribute('data-target', "#collapse"+diaExt);
            buttonDia.setAttribute('aria-expanded', "false");
            buttonDia.setAttribute('aria-controls', "collapse"+diaExt);
            buttonDia.style.cursor = "pointer";
            buttonDia.innerText = "Dia "+ dia;

            let inputTitulo = document.createElement("input");
            inputTitulo.id = "dia"+dia+"Titulo";
            inputTitulo.name = "dia"+dia+"Titulo";
            inputTitulo.placeholder = "Titulo do Dia";
            inputTitulo.required = "true";

            let divCollapse = document.createElement("div");
            divCollapse.id = "collapse" + diaExt;
            divCollapse.classList.add("collapse");
            divCollapse.setAttribute("aria-labelledby", "heading"+diaExt);
            divCollapse.setAttribute("data-parent", "#accordion");

            let divCardBody = document.createElement("div");
            divCardBody.classList.add("card-body");

            let buttonSubmit = document.createElement("a");
            buttonSubmit.classList.add("btn", "btn-danger");
            buttonSubmit.setAttribute("data-toggle", "modal");
            buttonSubmit.setAttribute("data-target",".bd-example-modal-lg"+dia);
            buttonSubmit.innerText = "Adicionar Exercícios";
            buttonSubmit.style.cursor = "pointer";
            buttonSubmit.style.color = "white";

            let ul = document.createElement("ul");
            ul.classList.add("list-group");
            ul.id = "exerciciosDiaLista" + dia;

            let inputHidden = document.createElement("input");
            inputHidden.setAttribute("type", "hidden");
            inputHidden.name="dia"+dia;
            inputHidden.value = dia;

            divCardBody.append(buttonSubmit, ul, inputHidden)
            divCollapse.append(divCardBody);
            labelHeader.append(buttonDia);
            h5.append(labelHeader, "(", inputTitulo, ")");
            divCardHeader.append(h5);
            divCard.append(divCardHeader, divCollapse);
            root.append(divCard);
        }
    }

    function filterExercicios(nomeFiltroExercicio, numDia) {
        nomeFiltroEx = nomeFiltroExercicio;
        let listaExercicios = document.getElementById("listaExercicios"+numDia);
        while(listaExercicios.hasChildNodes())
            listaExercicios.removeChild(listaExercicios.childNodes[0]);
        let foundExercicio = false
        for(const [numExercicio, exercicio] of Object.entries(exercicios)) {
            let alreadyChoose = false
            for(const value of exercicio) {
                if(value === nomeFiltroExercicio) {
                    let exerciciosCriados = exerciciosDia(numDia);
                    alreadyChoose = exercicioAlreadyChoose(exerciciosCriados, exercicio);
                    if(!alreadyChoose) {
                        createExercicio(exercicio[0]['nome'], numExercicio, numDia);
                        foundExercicio = true;
                    }
                }
            }

        }
        if(!foundExercicio)
            semResultados(numDia)
    }

    function exercicioAlreadyChoose(exerciciosCriados, exercicio) {
        for(const exercicioCriado of exerciciosCriados)
            if(exercicioCriado === exercicio[0]['nome'])
                return true;
        return false;
    }

    function createExercicio(nomeExercicio, numExercicio, numDia) {
        let listaExercicios = document.getElementById("listaExercicios"+numDia);
        let divNome = document.createElement("div");
        divNome.classList.add("col-md-10");
        divNome.innerText = nomeExercicio;

        let divBotao = document.createElement("div");
        divBotao.classList.add("col-md-2");

        let divLinha = document.createElement("div");
        divLinha.classList.add("row")

        let botaoAddExercicio = document.createElement("button");
        botaoAddExercicio.innerText = "+";
        botaoAddExercicio.classList.add("btn", "btn-danger");
        botaoAddExercicio.addEventListener("click", function() {addExercicio(numExercicio, numDia)});

        let liExercicio = document.createElement("li");
        liExercicio.classList.add("list-group-item");

        divBotao.append(botaoAddExercicio);
        divLinha.append(divNome, divBotao);
        liExercicio.append(divLinha);

        listaExercicios.append(liExercicio);
    }

    function semResultados(numDia) {
        let listaExercicios = document.getElementById("listaExercicios"+numDia);
        let liExercicio = document.createElement("li");
        liExercicio.innerText = "Sem resultados";
        liExercicio.classList.add("list-group-item");

        listaExercicios.append(liExercicio);
    }

    function exerciciosDia (numDia) {
        if(numDia === 1)
            return exerciciosCriados1
        else if(dia === 2)
            return exerciciosCriados2
        else if(dia === 3)
            return exerciciosCriados3
        else if(dia === 4)
            return exerciciosCriados4
        else if(dia === 5)
            return exerciciosCriados5
        else if(dia === 6)
            return exerciciosCriados6
        else
            return exerciciosCriados7
    }

    function addExercicio (numExercicio, numDia) {
        let listaDiaExercicios = document.getElementById("exerciciosDiaLista"+numDia);
        let liExercicio = document.createElement("li");
        liExercicio.classList.add("list-group-item");
        liExercicio.id = "dia"+numDia+"numexercicio"+numExercicio;

        let rowExercicio = document.createElement("div");
        rowExercicio.classList.add("row", "text-center");

        let inputHidden = document.createElement("input");
        inputHidden.setAttribute("type", "hidden");
        inputHidden.value = numExercicio;
        inputHidden.name = "dia"+numDia+"num"+numExercicio;

        let colImagem = document.createElement("div");
        colImagem.classList.add("col-md-2");


        let imagem = document.createElement("img");
        imagem.src = base_url + exercicios[numExercicio][0]["foto_video"];
        imagem.style.maxWidth = "100%";

        let colDetalhesExercicio = document.createElement("div");
        colDetalhesExercicio.classList.add("col-md-2", "mt-5");

        let nomeExercicio = document.createElement("p");
        nomeExercicio.innerText = exercicios[numExercicio][0]["nome"];

        let colReps = document.createElement("div");
        colReps.classList.add("col-md-1");

        let labelReps = document.createElement("label");
        labelReps.innerText = "Reps"

        let reps = document.createElement("input");
        reps.setAttribute("type", "text");
        reps.style.maxWidth = "100%";
        reps.name = "dia"+numDia+"num"+numExercicio+"reps";

        let colSerie = document.createElement("div");
        colSerie.classList.add("col-md-1");

        let labelSerie = document.createElement("label");
        labelSerie.innerText = "Série"

        let serie = document.createElement("input");
        serie.setAttribute("type", "text");
        serie.style.maxWidth = "100%";
        serie.name = "dia"+numDia+"num"+numExercicio+"serie";

        let colTempoDesc = document.createElement("div");
        colTempoDesc.classList.add("col-md-1");

        let labelDesc = document.createElement("label");
        labelDesc.innerText = "Descanso"

        let tempoDesc = document.createElement("input");
        tempoDesc.setAttribute("type", "text");
        tempoDesc.style.maxWidth = "100%";
        tempoDesc.name = "dia"+numDia+"num"+numExercicio+"tempoDesc";

        let colCarga = document.createElement("div");
        colCarga.classList.add("col-md-1");

        let labelCarga = document.createElement("label");
        labelCarga.innerText = "Carga"

        let carga = document.createElement("input");
        carga.setAttribute("type", "text");
        carga.style.maxWidth = "100%";
        carga.name = "dia"+numDia+"num"+numExercicio+"carga";

        let colTecnica = document.createElement("div");
        colTecnica.classList.add("col-md-3");

        let labelTecnica = document.createElement("label");
        labelTecnica.innerText = "Técnica"

        let tecnica = document.createElement("input");
        tecnica.setAttribute("type", "text");
        tecnica.style.maxWidth = "100%";
        tecnica.name = "dia"+numDia+"num"+numExercicio+"tecnica";

        let divObservacoes = document.createElement("div");
        divObservacoes.classList.add("col-md-12");

        let labelObs = document.createElement("label");
        labelObs.innerText = "Observações"
        labelObs.classList.add("col-md-12")

        let breakLine = document.createElement("br");

        let observacoes = document.createElement("TEXTAREA");
        observacoes.setAttribute("type", "textarea");
        observacoes.rows = "5";
        observacoes.cols = "35";
        observacoes.name = "dia"+numDia+"num"+numExercicio+"obs";

        let colApagar = document.createElement("div");
        colApagar.classList.add("col-md-1");

        let apagar = document.createElement("a");
        apagar.classList.add("btn", "btn-danger");
        apagar.style.color = "white";
        apagar.style.cursor = "pointer";
        apagar.addEventListener("click", function () {removeExercicio(numExercicio, numDia)});

        let i = document.createElement("i");
        i.classList.add("fas", "fa-trash");


        let exerciciosCriados = exerciciosDia(numDia)
        exerciciosCriados.push(exercicios[numExercicio][0]["nome"])

        apagar.append(i);
        colImagem.append(imagem);
        colDetalhesExercicio.append(nomeExercicio);
        colReps.append(labelReps, reps);
        colSerie.append(labelSerie, serie);
        colTempoDesc.append(labelDesc, tempoDesc);
        colCarga.append(labelCarga, carga);
        colTecnica.append(labelTecnica, tecnica);
        divObservacoes.append(labelObs,breakLine, breakLine, observacoes);
        colApagar.append(breakLine, apagar);

        rowExercicio.append(colImagem, colDetalhesExercicio, colReps, colSerie, colTempoDesc, colCarga, colTecnica, divObservacoes, colApagar);
        liExercicio.append(rowExercicio, inputHidden);
        listaDiaExercicios.append(liExercicio);
        filterExercicios(nomeFiltroEx, numDia);
    }

    function removeExercicio (numExercicio, numDia) {
        let listaDiaExercicios = document.getElementById("exerciciosDiaLista"+numDia);

        let exercicio = document.getElementById("dia"+numDia+"numexercicio"+numExercicio);

        listaDiaExercicios.removeChild(exercicio);

        let exerciciosCriados = exerciciosDia(numDia);
        let exerciciosAlterados = [];
        for(let i = 0; i < exerciciosCriados.length; i++) {
            if(exerciciosCriados[i] !== exercicios[numExercicio][0]['nome'])
                exerciciosAlterados.push(exerciciosCriados[i]);
        }
        if(numDia === 1)
            exerciciosCriados1 = exerciciosAlterados
        else if(dia === 2)
            exerciciosCriados2 = exerciciosAlterados
        else if(dia === 3)
            exerciciosCriados3 = exerciciosAlterados
        else if(dia === 4)
            exerciciosCriados4 = exerciciosAlterados
        else if(dia === 5)
            exerciciosCriados5 = exerciciosAlterados
        else if(dia === 6)
            exerciciosCriados6 = exerciciosAlterados
        else
            exerciciosCriados7 = exerciciosAlterados

        filterExercicios(nomeFiltroEx, numDia);
    }

</script>
