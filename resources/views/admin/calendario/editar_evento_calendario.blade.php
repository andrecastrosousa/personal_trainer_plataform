@extends('layouts.admin_layout')

@section('content')
    <form action="{{ route('marcacoes.update', $evento->id) }}" method="post">
        {{ csrf_field() }}
        @method("PATCH")
        Nome da tarefa:
        <br />
            <input type="text" name="name" value="{{$evento->name}}"/>
        <br /><br />
        Descrição:
        <br />
            <textarea name="description" >{{$evento->description}}</textarea>
        <br /><br />
            Inicio: <input type="time" name="hora_inicio" value="{{$evento->hora_inicio}}">
            Fim: <input type="time" name="hora_fim" value="{{$evento->hora_fim}}">
        <br /><br />
        Dia de começo:
            <input type="date" name="task_date" class="date" value="{{$evento->task_date}}"/>
        <br /><br />
            <input type="submit" value="Alterar" class="btn btn-danger" />
    </form>
@endsection
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
