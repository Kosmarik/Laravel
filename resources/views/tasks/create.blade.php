@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                            <strong>New Task</strong>
                    </div>

                                <form action="{{route('tasks.store')}}" method="POST">
                                    @method('POST')
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="title" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="task_content" id="summernote" class="form-control summernote" > </textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label>Start date: </label> <input type="date" name="start_date" placeholder="dd/mm/yyyy">
                                        </div>
                                        <div class="col">
                                            <label>Deadline date: </label> <input type="date" name="deadline_date" placeholder="dd/mm/yyyy">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <input class="form-control" type="number" name="estimated_time" placeholder="Estimated time">
                                        </div>
                                        <div class="col">
                                            <input class="form-control" type="number" name="fixed_rate" placeholder="Fixed rate">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <select name="project" class="form-control">
                                                    <option>Project Name</option>
                                                @foreach($projects as $project)
                                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="status" class="form-control">
                                                    <option>Status Name</option>
                                                @foreach($statuses as $status)
                                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="priority" class="form-control">
                                                    <option>Priority Name</option>
                                                @foreach($priority as $prior)
                                                    <option value="{{$prior->id}}">{{$prior->priority_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input name="author" type="hidden" value="{{Auth::user()->id}}">
                                        </div>
                                        <div class="col">
                                            <select name="client" class="form-control">
                                                     <option>Client UserName</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{--<button class="btn btn-success">Create Task</button>--}}
                                    <input type="submit" id="send" class="btn btn-success">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Content',
                height: '300px',

            });
        });
    </script>
@endsection