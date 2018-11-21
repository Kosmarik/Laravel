@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>New Company</strong>
                        <form action="{{route('companies.store')}}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="text-center">
                                <input class="form-control text-center company-create-input" type="text" name="company_name" placeholder="Company Name">
                                <input class="form-control text-center company-create-input" type="text" name="company_address" placeholder="Company Address">
                                <input class="form-control text-center company-create-input" type="text" name="company_code" placeholder="Company Code">
                                <input class="form-control text-center company-create-input" type="text" name="vat_code" placeholder="VAT Code">
                                <input type="submit" class="btn btn-success company-create-input" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'write your comment here...',
                height: '300px',
            });
        });
    </script>
@endsection