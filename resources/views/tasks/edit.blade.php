@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card d-flex" style="min-width: 700px;">
                    <form action="{{route('tasks.update', $task->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="d-flex justify-content-between">
                            <div><button class="btn btn-success">Update</button></div>
                            <div style="padding: 10px;"><h3>{{$task->author->name}}</h3></div>
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text" name="title" value="{{$task->title}}" placeholder="{{$task->title}}">
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text" name="task_content" value="{{$task->content}}" placeholder="{{$task->content}}">
                        </div>
                        <hr>
                        <div class="d-flex flex-row justify-content-around">
                            <div class="d-flex flex-column">

                                <div class="card-body">

                                    Estimated_time (min) : <input class="form-control" type="number" name="estimated_time" value="{{$task->estimated_time}}" placeholder="{{$task->estimated_time}}">

                                </div>
                                <div class="card-body">

                                    Spent_time (min) : <input class="form-control" type="number" name="spent_time" value="{{$task->spent_time}}" placeholder="{{$task->spent_time}}">

                                </div>
                                <div class="card-body">

                                    Billing_time (min) : <input class="form-control" type="number" name="billing_time" value="{{$task->billing_time}}" placeholder="{{$task->billing_time}}">

                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                    <div class="card-body">

                                        Start date : <input class="form-control" type="date" name="start_date" value="<?php echo  date('Y-m-d', strtotime($task->start_date));?>" >

                                    </div>
                                <div class="card-body">

                                    Deadline date : <input class="form-control" type="date" name="deadline_date" value="<?php echo  date('Y-m-d', strtotime($task->deadline_date));?>" placeholder="{{$task->deadline_date}}">

                                </div>
                                <div class="card-body">

                                    Fixed rate (eur) : <input class="form-control" type="number" name="fixed_rate" value="{{$task->fixed_rate}}" placeholder="{{$task->fixed_rate}}">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div>
                                    Project:
                                        <select name="project">
                                            @foreach($projects as $project)
                                                <option
                                                        @if($project->id == $task->project->id) selected @endif
                                                value="{{$project->id}}">{{$project->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        Status:
                                        <select style="margin-top: 20px;" name="status">
                                            @foreach($statuses as $status)

                                                <option
                                                        @if($status->id == $task->status->id) selected @endif
                                                        value="{{$status->id}}">{{$status->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        Priority:
                                        <select style="margin-top: 20px;" name="priority">
                                            @foreach($priority as $prior)
                                                <option
                                                        @if($prior->id == $task->priority->id) selected @endif
                                                            value="{{$prior->id}}">{{$prior->priority_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                    </div>
                                    <div>
                                        Author:
                                        <select style="margin-top: 20px" name="author">
                                            @foreach($users as $user)
                                                <option
                                                        @if($user->id == $task->author->id) selected @endif
                                                value="{{$user->id}}">{{$user->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        Client:
                                        {{--<input type="hidden" name="author" value="{{$task->author->id}}">--}}
                                        <select style="margin-top: 20px" name="client">
                                            @foreach($users as $user)
                                                <option
                                                        @if($user->id == $task->author->id) selected @endif
                                                value="{{$user->id}}">{{$user->name}}
                                                </option>
                                            @endforeach


                                        </select>
                                        {{--<select style="margin-top: 20px" name="client">--}}
                                            {{--@foreach($companies as $company)--}}
                                                {{--<option--}}
                                                        {{--@if($user->id == $task->author->id) selected @endif--}}
                                                {{--value="{{$company->id}}">{{$company->company_name}}--}}
                                                {{--</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection