
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
    <table>
        <tr>
            <th>Russian</th>
            <th>English</th>
        </tr>
        @foreach($translate as $line)
            <tr>
                <td>{{$line->russia}}</td>
                <td>{{$line->english}}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
