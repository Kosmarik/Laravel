@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="min-width: 550px;">
                    @if( Auth::user()->name == 'Kosmarik')
                    <form class="d-inline-flex justify-content-between" action="{{route('projects.destroy', $data->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Delete Project</button>
                        <div>
                            <a class="btn btn-dark" href="{{route('projects.edit', $data->id)}}">Edit</a>
                        </div>
                    </form>
                    @endif
                    <div class="card-body">
                        <b class="text-danger">Project Name: </b>
                        <br>
                        {{$data->name}}
                    </div>
                    <hr>
                    <div class="card-body">
                        <b class="text-danger">Description:</b>
                        <br>
                        {{$data->description}}
                    </div>
                    <hr>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-column">
                            <div class="card-body">
                                <b class="text-danger">Project Owner = </b>
                                {{$data->owner->name}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Admin id = </b>
                                {{$data->admin->name}}
                            </div>
                            <div class="card-body"><b class="text-danger">Details id=  </b>
                                {{$data->details_id}}
                            </div>
                            <div class="card-body">
                                <b class="text-danger">Hourly rate = </b>
                                {{$data->hourly_rate}}
                                <b> eur</b>
                            </div>
                            <div class="card-body"><b class="text-danger">System Type: </b>
                                {{$data->system_type}}
                            </div>

                            <div class="card-body"><b class="text-danger">LogIn details: </b>
                                {{$data->login_details}}
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="card-body">
                                <b class="text-danger">URL:  </b>
                                <a href="#">{{$data->url}}</a>
                            </div>
                            <div class="card-body"><b class="text-danger">GitHub URL: </b>
                                <a href="#">{{$data->git_url}}</a>
                            </div>
                            <div class="card-body"><b class="text-danger">Logo URL: </b>
                                <a href="#"> {{$data->logo_url}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list-group" style="list-style: none;">
                @foreach($data->tasks as $task)
                    <li><a class="list-group-item" target="_blank" href="/tasks/{{$task->id}}">{{$task->title}}</a></li>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection