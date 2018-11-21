@extends('layouts.app')

@section('content')


    <div class="d-flex justify-content-between">
        <div class="calendar col-md-6"  style="min-width: 300px;">
            <div id='calendar'></div>
        </div>
        <div class="container col-md-5" style="border-left: 5px black solid">
            <h3>All Tasks</h3>

                            @foreach($tasks as $task)
                                <div style="min-width: 300px;margin: 0 auto; font-size: larger; ">
                                    <div class="card" style="width: 60%; min-width: 300px;">
                                        @if ($task->status->name === 'Done')
                                            <div class="d-flex justify-content-between task-container-hover" style="width: 100%; border: 1px black solid;padding: 10px;">
                                                <div>
                                                    {{$task->title}}
                                                </div>
                                                <div>
                                                    <a style="color: mediumspringgreen; font-size: x-large;" href="tasks/{{$task->id}}">
                                                        <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        @elseif ($task->status->name === 'In Progres')
                                            <div class="d-flex justify-content-between task-container-hover" style="width: 100%; border: 1px black solid;padding: 10px;">
                                                <div>
                                                    {{$task->title}}
                                                </div>
                                                <div>
                                                    <a style="color: orange; font-size: x-large;" href="tasks/{{$task->id}}">
                                                        <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex justify-content-between task-container-hover" style="width: 100%; border: 1px black solid; padding: 10px;">
                                                <div>
                                                    {{$task->title}}
                                                </div>
                                                <div>
                                                    <a style="color: red; font-size: x-large;" href="tasks/{{$task->id}}">
                                                        <span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
            <div class="text-center" style=" width: 60%; margin-top: 20px; min-width: 300px;">
                <a href="http://185.80.130.158/tasks/create" style="color: springgreen; font-size: xx-large">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </a>
            </div>
        </div>
    </div>


    <script>
        $(function() {

            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar({
                // put your options and callbacks here

                events : [
                        @foreach($tasks as $task)
                    {
                        title : '{{ $task->title }}',
                        start : '{{ $task->deadline_date }}',
                        url : '{{ route('tasks.show', $task->id) }}'
                    },
                    @endforeach
                ]
            })

        });
    </script>
@endsection