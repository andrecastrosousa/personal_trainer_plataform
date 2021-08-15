@extends('layouts.user_layout')

@section('content')
    <div class="container">
        <div class="row full-calendar" >

            <div class="col-md-12">
                <div id="calendar" style="width: 100%"></div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('fullCalendar/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                dayMinWidth: 200,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'timeGridWeek',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->name }}',
                        start : '{{ $task->task_date }}T{{$task->hora_inicio}}',
                        end: '{{ $task->task_date }}T{{$task->hora_fim}}',
                        url : '{{ route('marcacoes.show', $task->id) }}',
                        backgroundColor: '#ff0000',
                        color: '#ff0000',
                    },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>
@endsection
