<?php
$tasks_id = [];
$est = [];
foreach ($tasks as $task){
    $est[] = $task['estimated_time']*$task['fixed_rate'];
    $tasks_id[] = $task['id'];
}
$summa = array_sum($est);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{--<link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    <style>
        *{ font-family: DejaVu Sans !important;}

        a{
            text-decoration: none;
            color: black;
        }
        table,td,th{
            border: black 1px solid;
        }

    </style>

</head>
<body>
<form action="#" method="post">
    <div  style="text-align: center;">
        <h1>SĄSKAITA FAKTŪRA</h1>

        <h3>Serija   NR. 1</h3>

        <h3><a href="{{ route('faktura-pdf',['download'=>'pdf', 'id'=> $company->id, 'task_id'=>$tasks_id]) }}"><?= date("F j, Y");?></a></h3>

        <table style="margin: 0 auto; border-right: 1px ; width: 80%;">
            <tr>
                <th style="width: 50%;">
                    <h4>Pardavėjas</h4>
                    <p>Alfred Ivaško</p>
                    <p>Adresas: Kovo-11, 27-17</p>
                    <p>IV pažymos numeris:871709</p>
                    <p>LT91 7044 0600 0807 5844 </p>
                </th>
                <th style="width: 50%;">
                    <h4>Pirkėjas</h4>
                    <p>{{$company->company_name}}</p>
                    <p>{{$company->address}}</p>
                    <p>{{$company->company_code}}</p>
                    <p>{{$company->vat_code}}</p>
                </th>
            </tr>
        </table>

        <br>

        <table style="margin: 0 auto;">
            <tr>
                <th style="width: 50%; text-align: center;">Prekės, turto ar paslaugos pavadinimas</th>
                <th style="text-align: center;width: 10%;">Mato vnt.</th>
                <th style="text-align: center;width: 10%;">Kiekis</th>
                <th style="text-align: center;width: 10%;">Kaina</th>
                <th style="text-align: center;width: 10%;">Suma</th>

            </tr>
            @foreach($tasks as $task)

                <tr>
                    <?php $sum = $task->estimated_time * $task->fixed_rate; ?>
                    <td style="text-align: center;width: 50%;">{{$task->title}}</td>
                    <td style="text-align: center;width: 10%;">Val.</td>
                    <td style="text-align: center;width: 10%;">{{$task->estimated_time}}</td>
                    <td style="text-align: center;width: 10%;">{{$task->fixed_rate}} EUR</td>
                    <td style="text-align: center;width: 10%;"><?=$sum;?> EUR</td>

                </tr>

            @endforeach
            <tr>
                <td  style="text-align: center;width: 50%;"> </td>
                <td style="text-align: center;width: 10%;"> </td>
                <td style="text-align: center;width: 10%;"> </td>
                <td style="text-align: center;width: 10%;"><b>Iš viso</b></td>
                <td style="text-align: center;width: 10%;"><b><?= $summa;?> EUR</b></td>
            </tr>
        </table>
        <br>
        <div style="text-align: left;">
            <h4>Suma žodžiais</h4>
            <h4>
                <b><?php gauti_zodzius($summa); ?> eurų</b>
            </h4>
            <hr style="background-color: black; height: 2px;">
        </div>
        <br>
        <div style="text-align: left;">
            <h4>Alfred Ivaško</h4>
            <hr style="background-color: black; height: 2px;">
            <h5>(asmens, pasirašiusio dokumentą, pareigos, vardas ar vardo pirmoji raidė, pavardė, parašas)</h5>
        </div>

    </div>
</form>
</body>
</html>