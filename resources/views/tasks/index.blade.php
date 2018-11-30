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
                editable: true,
                header:{
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                eventTextColor: 'white',
                selectable: true,
                selectHelper: true,
                eventStartEditable: true,
                eventDurationEditable: true,
                events : [
                        @foreach($tasks as $task)
                    {
                        default: false,
                        title : '{{ $task->title }}',
                        start : '{{ $task->start_date }}',
                        end : '{{$task->deadline_date}}',
                    },
                    @endforeach
                ],

                eventResize: function(event, delta, revertFunc){

                        var end = event.end.format();
                        var start = event.start.format();
                        var title = event.title;
                        // console.log(end);
                        $.ajax({
                            type:'POST',
                            data:{title:title, deadline_date:end, start_date:start, _token: '{{csrf_token()}}'},
                            url: "{{route('tasks.updateajax')}}",
                            success:function(){
                                alert('Success!!!');
                            }
                        });
                },

                eventDrop:function(event, delta, revertFunc){
                    console.log(event.end.format());
                    var start_date = event.start.format();
                    if(event.end){
                        var deadline_date = event.end.format();
                    }else{
                        var deadline_date = event.start.format();
                    }
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        type: 'POST',
                        data: {title:title, id:id, start_date:start_date, deadline_date:deadline_date, _token: '{{csrf_token()}}'},
                        url: "{{route('tasks.updateajax')}}",
                        success:function(){
                            alert('Success!!!');
                        }
                    });
                },

            });



        });
    </script>
@endsection