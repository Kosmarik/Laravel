@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">

                        <strong>New Project</strong>
                    </div>
                    <form action="{{route('projects.store')}}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="text" name="project_name" placeholder="Project Name">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="login_details" placeholder="LogIn Details"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <select name="project_owner_id" class="form-control">
                                    <option>Project-Owner Name</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" name="hourly_rate" placeholder="Hourly rate">
                            </div>
                            <div class="col">
                                <select name="admin_id" class="form-control">
                                    <option>Admin</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" name="details_id" placeholder="Details Id">
                            </div>
                        </div>
                        <div class="form-row" style="margin-top: 10px;">
                            <div class="col">
                                <input type="text" name="url" placeholder="URL">
                            </div>
                            <div class="col">
                                <input type="text" name="git_url" placeholder="Git URL">
                            </div>
                            <div class="col">
                                <input type="text" name="logo_url" placeholder="Logo URL">
                            </div>
                            <div class="col">
                                <input type="text" name="system_type" placeholder="System Type">
                            </div>
                        </div>
                        <button style="margin-top: 10px;" class="btn btn-success">Create Project</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection