@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('companies.update', $company->id)}}" method="POST">
                @method('PUT')
                @csrf
                    <div><button class="btn btn-success">Update</button></div>
                    <div class="text-center" style="border: black 2px solid; padding: 20px;">
                        <p><b>Company Name:</b></p>
                     <input style="width: 50%; text-align: center;" type="text" name="company_name" value="{{$company->company_name}}" placeholder="{{$company->company_name}}">
                    </div >
                    <br>
                    <div class="text-center" style="border: black 2px solid; margin-top: 10px;  padding: 20px;">
                     <p><b>Company Address:</b></p>
                     <input style="width: 50%; text-align: center;" type="text" name="company_address" value="{{$company->address}}" placeholder="{{$company->address}}">
                    </div>
                    <br>
                    <div class="text-center" style="border: black 2px solid; margin-top: 10px;  padding: 20px;">
                       <p> <b>Company Code:</b></p>
                        <input style="width: 50%; text-align: center;" type="text" name="company_code" value="{{$company->company_code}}" placeholder="{{$company->company_code}}">
                    </div>
                    <div class="text-center" style="border: black 2px solid; margin-top: 10px;  padding: 20px;">
                        <p> <b>Company Code:</b></p>
                        <input style="width: 50%; text-align: center;" type="text" name="vat_code" value="{{$company->vat_code}}" placeholder="{{$company->vat_code}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection