@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-araund">
            <div class="col-md-3" style="height: max-content; margin-top: 11px; background-color: #E8E8E8; border: black solid 1px; border-radius: 30px;">
                <div class="card-body">
                    <b class="text-danger">Status = </b>
                    {{$task->status->name}}
                </div>
                <div class="card-body">
                    <b class="text-danger">Priority = </b>
                    {{$task->priority->priority_name}}
                </div>
                <div class="card-body">
                    <b class="text-danger">Author = </b>
                    {{$task->author->name}}
                </div>
                <div class="card-body">
                    <b class="text-danger">Client = </b>
                    @if($task->client_id === 1)
                        {{$task->imone->company_name}}
                    @else
                        {{$task->client_id}}
                    @endif
                </div>
                <div class="card-body"><b class="text-danger">Project: </b>
                    {{$task->project->name}}
                </div>
                <div class="card-body"><b class="text-danger">Estimated_time = </b>
                   {{time_helper($task->estimated_time)}}
                </div>
                <div class="card-body"><b class="text-danger">Spent_time = </b>
                    {{time_helper($task->spent_time)}}
                </div>
                <div class="card-body"><b class="text-danger">Billing_time = </b>
                    {{time_helper($task->billing_time)}}
                </div>
                <div class="card-body"><b class="text-danger">Start_Date :  </b>
                    {{$task->start_date}}
                </div>
                <div class="card-body"><b class="text-danger">Deadline_date : </b>
                    {{$task->deadline_date}}
                </div>
                <div class="card-body"><b class="text-danger">Fixed_rate = </b>
                    {{$task->fixed_rate}} eur
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="border: 1px black solid; background-color: #E8E8E8; border-radius: 30px;">
                    <div class="d-flex justify-content-between">

                    </div>
                    <div class="card-body">
                        <h2>{{$task->title}}</h2>
                    </div>
                    <div class="card-body">
                        <h4>{!!  $task->content !!}</h4>
                    </div>

                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                        </div>
                    </div>
                </div>
                <div id="showComment" class="card comment text-center" style="border: 1px black solid; display: none;">
                    <form action="{{route('comment.store')}}" method="POST">
                    @method('POST')
                    @csrf
                        <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="task_id" value="{{$task->id}}">
                        <div id="commentForm" class="text-center div-for-comment-text">
                            <textarea name="comment" class="col-md-10 form-control summernote" id="summernote"></textarea>
                            <input type="submit" id="send" class="btn btn-dark">
                        </div>
                    </form>
                </div>
                    @foreach($comment as $comm)
                        <div class="card comment-card for-comment" style=" margin-top: 10px; border: black 1px solid; background-color: #ffffb3">
                            <form action="{{route('comment.destroy', $comm->id)}}" method="post">
                            @method('DELETE')
                                @csrf
                                <input type="hidden" name="task_id" value="{{$comm->task_id}}">
                                <input type="hidden" name="comment_id" value="{{$comm->id}}">
                                <div style="width: 100%; text-align: right">
                                    <button class="delete-btn">
                                        <span class="delete-btn glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                            <div><h3 style="color: salmon;">{{$comm->author->name}}</h3></div>
                            <div class=" font-italic"><h4>{!! $comm->comment !!}</h4></div>
                            <div class="text-right"><h6>{{$comm->created_at}}</h6></div>
                        </div>
                    @endforeach
            </div>
            <div class="col-md-2" style="height: max-content; padding: 10px; text-align: center; margin-top: 11px; background-color: #E8E8E8; border: 1px black solid; border-radius: 30px;">
                <div style=" width: 90%; margin: 0 auto;">
                    <button id="show" class="btn btn-success" style=" width:  100%;">Add Comment</button>
                </div>
                <div style="margin-top: 20px;">
                    @can('edit task')
                        <div style="margin: 0 auto">
                            <a class="btn btn-warning" style="width: 90%" href="{{route('tasks.edit', $task->id)}}">Edit Task</a>
                        </div>
                    @endcan
                </div>
                <div style="margin-top: 20px;">
                    <div>
                        <a class="btn btn-primary" style="width: 90%" href="{{route('tasks.pdf', $task->id)}}">Get Task PDF</a>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    @can('delete task')
                        <form  class="d-inline-flex justify-content-between" style="width: 90%" action="{{route('tasks.destroy', $task->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" style="width: 100%">Delete Task</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'write your comment here...',
                height: '200px',

            });

            $("#show").click(function(){
                $("#showComment").show(1000);
                $("#show").hide('');
            });
        });
    </script>
@endsection