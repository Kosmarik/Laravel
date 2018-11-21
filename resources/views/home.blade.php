@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center s ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello, {{ Auth::user()->name }} , my name is Alfred, and you came to my web page :)</div>
            </div>
        </div>
        <div class="col-md-12" style=" height: 30%; margin-top: 20px;" >
           @role('admin')
            <div class="card col-4 float-left" style="width: 23%; margin: 10px; min-width: 250px;">
                <div class="card-body">
                    <div style="height: 150px;">
                        <h2 class="card-title">Vocabulary</h2>
                        <p class="card-text">This is my own vocabulary, for english learning.</p>
                    </div>
                    <a href="http://185.80.130.158/vocabulary" class="btn btn-primary">Go to vocabulary</a>
                </div>
            </div>
            @endrole
            <div class="card col-4 float-left" style="width: 23%; margin: 10px;  min-width: 250px;">
                <div class="card-body">
                    <div style="height: 150px;">
                        <h2 class="card-title">Projects</h2>
                        <p class="card-text">Projects</p>
                    </div>
                    <a href="http://185.80.130.158/projects" class="btn btn-primary">Go to projects page</a>
                </div>
            </div>
            <div class="card col-4 float-left" style="width: 23%; margin: 10px;  min-width: 250px;">
                <div class="card-body">
                    <div style="height: 150px;">
                        <h2 class="card-title">Tasks</h2>
                        <p class="card-text">My Tasks</p>
                    </div>
                    <a href="http://185.80.130.158/tasks" class="btn btn-primary">Go to tasks page</a>
                </div>
            </div>
            <div class="card col-4 float-left" style="width: 23%; margin: 10px;  min-width: 250px;">
                <div class="card-body">
                    <div style="height: 150px;">
                        <h2 class="card-title">Vocabulary to PDF</h2>
                        <p class="card-text">Vocabulary table with all lines and PDF maker(in progress)</p>
                    </div>
                    <a href="http://185.80.130.158/vocabularyList" style="width: 100%;" class="btn btn-primary">Go to Vokabulary table page</a>
                </div>
            </div>
            @role('admin')
            <div class="card col-4 float-left" style="width: 23%; margin: 10px;  min-width: 250px;">
                <div class="card-body">
                    <div style="height: 150px;">
                        <h2 class="card-title">Imones</h2>
                        <p class="card-text">Imoniu, su kuriais dirbu rekvizitai, saskaitos fakturoms pildyti</p>
                    </div>
                    <a href="http://185.80.130.158/companies" style="width: 100%;" class="btn btn-primary">Go To List</a>
                </div>
            </div>
            @endrole
        </div>

    </div>
</div>
@endsection
