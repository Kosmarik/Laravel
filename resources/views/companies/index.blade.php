@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-success" href="{{route('companies.create')}}">Add Company</a>
            @foreach($companies as $company)
                    <div class="card">
                        <div class="card-header d-inline-flex justify-content-between">
                            <div style="width: 100%;" class="d-flex justify-content-between">
                               <div><h4>{{$company->company_name}}</h4></div>
                                <div>
                                <a class="btn btn-primary" href="{{route('companies.show', $company->id)}}">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    </div>

@endsection