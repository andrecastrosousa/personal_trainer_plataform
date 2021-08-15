@extends('layouts.admin_layout')

@section('content')
    @foreach($progressos as $progresso)
        <h2>Condição do dia: {{ substr($progresso->created_at, 0, 10) }}</h2>
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
        <form action="{{ route('cliente.progresso.edit', [$cliente->id, $progresso->id])}}">
            <button type="submit" class="btn btn-danger">Editar Informações</button>
        </form>
    @endforeach
    <a href="{{ route('cliente.progresso.create', [$cliente->id]) }}">Criar Novo Progresso</a>
    <h2>Gráficos de Progresso</h2>
    <div class="row">
        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Peso</h5>

            <div id="google-line-chart" style="width: 100%;"></div>
        </div>

        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Cintura</h5>

            <div id="google-line-chart1" style="width: 100%;"></div>
        </div>

        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Coxa</h5>

            <div id="google-line-chart2" style="width: 100%;"></div>
        </div>

        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Quadril</h5>

            <div id="google-line-chart3" style="width: 100%;"></div>
        </div>

        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Abdominal</h5>

            <div id="google-line-chart4" style="width: 100%;"></div>
        </div>

        <div class="container col-md-6 col-12 mb-2 p-2">
            <h5>Braço</h5>

            <div id="google-line-chart5" style="width: 100%;"></div>
        </div>
        <div class="container col-md-6 col-12 mb-2 p-2">
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
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->peso."],";
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
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->cintura."],";
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

        chart2.draw(data, options);
    }

    function drawChart2() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro da coxa nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->coxa."],";
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

        chart3.draw(data, options);
    }

    function drawChart3() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do quadril nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->quadril."],";
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

        chart4.draw(data, options);
    }

    function drawChart4() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do abdominal nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->abdominal."],";
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

        chart5.draw(data, options);
    }

    function drawChart5() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do braço nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->braco."],";
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

        chart6.draw(data, options);
    }

    function drawChart6() {

        var data = google.visualization.arrayToDataTable([
            ['Peso', 'Variação do perímetro do peito nas diferentes datas'],

            @php
                foreach($progressos as $d) {
                    echo "['".substr($d->created_at, 0, 10)."', ".$d->peito."],";
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

        chart7.draw(data, options);
    }
</script>
