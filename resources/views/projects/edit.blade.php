@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <form action="{{route('projects.update', $data->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-success">Update</button>
                        <div class="card-body">
                            <input class="form-control" type="text" name="name" value="{{$data->name}}" placeholder="{{$data->name}}">
                        </div>
                        <div class="card-body">
                            <input class="form-control" type="text" name="description" value="{{$data->description}}" placeholder="{{$data->description}}">
                        </div>
                        <hr>
                        <div class="d-flex flex-row justify-content-around">
                            <div class="d-flex flex-column">
                                <div class="col">
                                    <select name="project_owner_id" class="form-control">
                                            <option value="{{$data->owner->id}}">{{$data->owner->name}}</option>
                                        @foreach($users as $user)
                                            @if($user->name !== $data->owner->name)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="admin_id" class="form-control">
                                        <option value="{{$data->admin->id}}">{{$data->admin->name}}</option>
                                        @foreach($users as $user)
                                            @if($user->name !== $data->admin->name)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-body">

                                    Details id: <input class="form-control" type="number" name="details_id" value="{{$data->details_id}}" placeholder="{{$data->details_id}}">

                                </div>
                                <div class="card-body">

                                    Hourly Rate: <input class="form-control" type="number" name="hourly_rate" value="{{$data->hourly_rate}}" >

                                </div>
                            </div>
                            <div class="d-flex flex-column">

                                <div class="card-body">

                                    URL: <input class="form-control" type="text" name="url" value="{{$data->url}}" placeholder="{{$data->url}}">

                                </div>
                                <div class="card-body">

                                    Login details: <input class="form-control" type="text" name="login_details" value="{{$data->login_details}}" placeholder="{{$data->login_details}}">

                                </div>
                                <div class="card-body">

                                    Git URL: <input class="form-control" type="text" name="git_url" value="{{$data->git_url}}" placeholder="{{$data->git_url}}">

                                </div>
                                <div class="card-body">

                                    Logo URL: <input class="form-control" type="text" name="logo_url" value="{{$data->logo_url}}" placeholder="{{$data->logo_url}}">

                                </div>
                                <div class="card-body">

                                    System Type: <input class="form-control" type="text" name="system_type" value="{{$data->system_type}}" placeholder="{{$data->system_type}}">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection