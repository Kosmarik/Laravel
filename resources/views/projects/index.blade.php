@extends('layouts.app')

@section('content')
    @can('create project')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @can('create project')
                <a class="btn btn-success" href="{{route('projects.create')}}">Create New Project</a>
                @endcan
                    @foreach($projects as $project)
                            <div class="card">
                                <div class="card-header d-inline-flex justify-content-between">
                                    <div><strong>{{$project->name}}</strong></div>
                                    <div><a href="projects/{{$project->id}}">More</a></div>
                                </div>
                            </div>
                    @endforeach
            </div>
        </div>
    </div>
    @endcan
@endsection