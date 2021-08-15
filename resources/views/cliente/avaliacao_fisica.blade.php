@extends('layouts.user_layout')

@section('content')
    <a href="{{ route("fotos_cliente") }}" class="btn btn-danger">Consultar Fotos</a>
    @foreach($progressos as $progresso)

        <div id="accordion">
        <div class="card">
            <div class="card-header" id="heading{{$progresso->id}}">
                <h5 class="mb-0">

                    <label for="dia1Titulo">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$progresso->id}}" aria-expanded="true" aria-controls="collapse{{$progresso->id}}">
                            Condição do dia: {{ substr($progresso->created_at, 0, 10) }}

                        </a>
                    </label>
                </h5>
            </div>

            <div id="collapse{{$progresso->id}}" class="collapse" aria-labelledby="heading{{$progresso->id}}" data-parent="#accordion">
                <div class="card-body">
                    <b>Peso: </b><p>{{ $progresso->peso }} kg</p>

                    <b>Cintura: </b>
                    @if($progresso->cintura != null)
                        <p>{{ $progresso->cintura }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif

                    <b>Coxa: </b>
                    @if($progresso->coxa != null)
                        <p>{{ $progresso->coxa }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif

                    <b>Quadril: </b>
                    @if($progresso->quadril != null)
                        <p>{{ $progresso->quadril }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif

                    <b>Abdominal: </b>
                    @if($progresso->abdominal != null)
                        <p>{{ $progresso->abdominal }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif

                    <b>Braço: </b>
                    @if($progresso->braco != null)
                        <p>{{ $progresso->braco }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif

                    <b>Peito: </b>
                    @if($progresso->peito != null)
                        <p>{{ $progresso->peito }} cm</p>
                    @else
                        <p>Sem dados inseridos</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <h2>Gráficos de Progresso</h2>
    <div class="row">
        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Peso</h5>

            <div id="google-line-chart" style="width: 100%;"></div>
        </div>

        <div id="cintura" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Cintura</h5>

            <div id="google-line-chart1" style="width: 100%;"></div>
        </div>

        <div id="coxa" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Coxa</h5>

            <div id="google-line-chart2" style="width: 100%;"></div>
        </div>

        <div id="quadril" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Quadril</h5>

            <div id="google-line-chart3" style="width: 100%;"></div>
        </div>

        <div id="abdominal" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Abdominal</h5>

            <div id="google-line-chart4" style="width: 100%;"></div>
        </div>

        <div id="braco" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Braço</h5>

            <div id="google-line-chart5" style="width: 100%;"></div>
        </div>
        <div id="peito" class="container col-md-6 col-12 mb-2 p-2">
            <h5>Peito</h5>

            <div id="google-line-chart6" style="width: 100%;"></div>
        </div>
    </div>

@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart1);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);
    google.charts.setOnLoadCallback(drawChart4);
    google.charts.setOnLoadCallback(drawChart5);
    google.charts.setOnLoadCallback(drawChart6);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação de peso nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->peso != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->peso."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do peso',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

        chart.draw(data, options);
    }

    function drawChart1() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro da cintura nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->cintura."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro da cintura',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('google-line-chart1'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart2.draw(data, options);
        else{
            let divCintura = document.getElementById("cintura");
            while(divCintura.hasChildNodes())
                divCintura.removeChild(divCintura.childNodes[0])
        }
    }

    function drawChart2() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro da coxa nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->coxa."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro da coxa',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart3 = new google.visualization.LineChart(document.getElementById('google-line-chart2'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart3.draw(data, options);
        else{
            let divCoxa = document.getElementById("coxa");
            while(divCoxa.hasChildNodes())
                divCoxa.removeChild(divCoxa.childNodes[0])
        }
    }

    function drawChart3() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do quadril nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->quadril."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro do quadril',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart4 = new google.visualization.LineChart(document.getElementById('google-line-chart3'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart4.draw(data, options);
        else{
            let divQuadril = document.getElementById("quadril");
            while(divQuadril.hasChildNodes())
                divQuadril.removeChild(divQuadril.childNodes[0])
        }
    }

    function drawChart4() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do abdominal nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->abdominal."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro do abdominal',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart5 = new google.visualization.LineChart(document.getElementById('google-line-chart4'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart5.draw(data, options);
        else{
            let divAbdominal = document.getElementById("abdominal");
            while(divAbdominal.hasChildNodes())
                divAbdominal.removeChild(divAbdominal.childNodes[0])
        }
    }

    function drawChart5() {
        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do braço nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->braco."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro do braço nas diferentes datas',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart6 = new google.visualization.LineChart(document.getElementById('google-line-chart5'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart6.draw(data, options);
        else{
            let divBraco = document.getElementById("braco");
            while(divBraco.hasChildNodes())
                divBraco.removeChild(divBraco.childNodes[0])
        }
    }

    function drawChart6() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do peito nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    if($d->cintura != null)
                        echo "['".substr($d->created_at, 0, 10)."', ".$d->peito."],";
                    else
                        echo "['".substr($d->created_at, 0, 10)."', 0],";
                }
            @endphp
        ]);

        var options = {
            title: 'Variação do perímetro do peito nas diferentes datas',
            curveType: 'function',
            legend: { position: 'bottom' },
            plotOptions: {
                series: { allowPointSelect: true}
            }
        };

        var chart7 = new google.visualization.LineChart(document.getElementById('google-line-chart6'));

        if(data["fg"][0]["c"][1]["v"] !== 0)
            chart7.draw(data, options);
        else{
            let divPeito = document.getElementById("peito");
            while(divPeito.hasChildNodes())
                divPeito.removeChild(divPeito.childNodes[0])
        }
    }
</script>
