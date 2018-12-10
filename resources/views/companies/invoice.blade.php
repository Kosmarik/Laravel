@extends('layouts.app')

@section('content')
<?php
        $tasks_id = [];
    $est = [];
    foreach ($tasks as $task){
        $est[] = $task['estimated_time']*$task['fixed_rate'];
        $tasks_id[] = $task['id'];
    }
    $summa = array_sum($est);

?>
<form action="#" method="post">
    <div class="invoice-container text-center" style="padding: 30px;">
        <h1>SĄSKAITA FAKTŪRA</h1>

        <h3>Serija   NR. 1</h3>

        <h3><a href="{{ route('faktura-pdf',['download'=>'pdf', 'id'=> $company->id, 'task_id'=>$tasks_id]) }}"><?= date("F j, Y");?></a></h3>

        <table>
            <tr>
                <th style="width: 50%; padding: 10px;">
                    <h4>Pardavėjas</h4>
                    <p>Alfred Ivaško</p>
                    <p>Adresas: Kovo-11, 27-17</p>
                    <p>IV pažymos numeris:871709</p>
                    <p>LT91 7044 0600 0807 5844 </p>
                </th>
                <th style="width: 50%; padding: 10px;">
                    <h4>Pirkėjas</h4>
                    <p>{{$company->company_name}}</p>
                    <p>{{$company->address}}</p>
                    <p>{{$company->company_code}}</p>
                    <p>{{$company->vat_code}}</p>
                </th>
            </tr>
        </table>

        <br>

        <table class="table table-bordered table-bordered">
            <tr>
                <th class="text-center" style="width: 50%;">Prekės, turto ar paslaugos pavadinimas</th>
                <th class="text-center" style="width: 10%;">Mato vnt.</th>
                <th class="text-center" style="width: 10%;">Kiekis</th>
                <th class="text-center" style="width: 10%;">Kaina</th>
                <th class="text-center" style="width: 10%;">Suma</th>

            </tr>
                @foreach($tasks as $task)

                    <tr>
                        <?php $sum = $task->estimated_time * $task->fixed_rate; ?>
                        <td class="text-center" style="width: 50%;">{{$task->title}}</td>
                        <td class="text-center" style="width: 10%;">Val.</td>
                        <td class="text-center" style="width: 10%;">{{$task->estimated_time}}</td>
                        <td class="text-center" style="width: 10%;">{{$task->fixed_rate}} EUR</td>
                        <td class="text-center" style="width: 10%;"><?=$sum;?> EUR</td>

                    </tr>

                @endforeach
            <tr>
                <td class="text-center" style="width: 50%;"> </td>
                <td class="text-center" style="width: 10%;"> </td>
                <td class="text-center" style="width: 10%;"> </td>
                <td class="text-center" style="width: 10%;"><b>Iš viso</b></td>
                <td class="text-center" style="width: 10%;"><b><?= $summa;?> EUR</b></td>
            </tr>
        </table>
        <br>
        <div class="text-left">
            <h4>Suma žodžiais</h4>
            <h4>
                <b><?php gauti_zodzius($summa); ?> eurų</b>
            </h4>
            <hr style="background-color: black; height: 2px;">
        </div>
        <br>
        <div class="text-left">
            <h4>Alfred Ivaško</h4>
            <hr style="background-color: black; height: 2px;">
            <h5>(asmens, pasirašiusio dokumentą, pareigos, vardas ar vardo pirmoji raidė, pavardė, parašas)</h5>
        </div>

    </div>
</form>
@endsection