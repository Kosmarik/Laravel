@extends('layouts.app')

@section('content')
    <form action="{{route('invoice', $company->id)}}" method="GET">
    <div class="container" style="width: 50%; min-width: 600px;">
        <div class="row">
            <div class="company-single-container text-center" style="margin-top: 20px; width: 80%; min-width: 500px;">
                <table>
                    <tr>
                        <td class="left-td">Company Name</td>
                        <td class="right-td"><b>{{$company->company_name}}</b></td>
                    </tr>
                    <tr>
                        <td class="left-td">Address</td>
                        <td class="right-td"><b>{{$company->address}}</b></td>
                    </tr>
                    <tr>
                        <td class="left-td">Company Code</td>
                        <td class="right-td"><b>{{$company->company_code}}</b></td>
                    </tr>
                    <tr>
                        <td class="left-td">VAT Code</td>
                        <td class="right-td"><b>{{$company->vat_code}}</b></td>
                    </tr>
                </table>
            </div>
            <div style="width: 50px; height: 300px;">
                <div>
                     <a style="width: 100%" href="{{route('companies.edit', $company->id)}}">
                         <span class="glyphicon glyphicon-pencil btn btn-lg" style="background-color: blanchedalmond" aria-hidden="true"></span>
                     </a>
                </div>
                 <br>
                <div>
                     <button style="width: 100%; color: #0f74a8; padding: 0px; border: 0px;">
                        <span class="glyphicon glyphicon-euro btn btn-lg" style="background-color: blanchedalmond" aria-hidden="true"></span>
                     </button>
                </div>
            </div>
        </div>

            @csrf
            @method('GET')
        @foreach($tasks as $task)
            <div class="d-flex" style="width: 100%; min-width: 550px; height: 100px;border-radius: 30px; margin-top: 10px; border: 3px black solid;">
                <div class="d-flex" style="width: 60%; height: 100%;padding: 20px; border-right: 3px black solid;">
                    <h3>{{$task->title}}</h3>
                </div>
                <div class="d-flex" style="width: 45%; height: 100%; padding: 20px; ">
                    <a title="Edit" style="width: 100%;" href="{{route('tasks.edit', $task->id)}}">
                        <span class="glyphicon glyphicon-pencil btn btn-lg" aria-hidden="true"></span>
                    </a>

                    <a title="Ctreate Invoice" style="width: 100%;" href="{{route('faktura', ['company_id'=>$company->id, 'task_id'=>$task->id])}}">
                        <span class="glyphicon glyphicon-euro btn btn-lg"  aria-hidden="true"></span>
                    </a>

                    <a title="Task PDF" style="width: 100%;" href="{{route('tasks.pdf', $task->id)}}">
                        <span class="glyphicon glyphicon-file btn btn-lg"  aria-hidden="true"></span>
                    </a>

                    <a title="Delete Task" style="width: 100%; color: red;">
                        <span class="glyphicon glyphicon-remove  btn btn-lg"  aria-hidden="true"></span>
                    </a>

                        <input title="Add to invoice" type="checkbox" name="checkboxArray[]" value="{{$task->id}}">

                </div>
            </div>
        @endforeach
    </div>
        </form>
    </div>
@endsection