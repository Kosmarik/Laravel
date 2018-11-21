<!DOCTYPE html>
<html>
<head>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

        <br>
        <div style="text-align: left; width: 95%; height: 84%; margin: 20px auto;">
            <h3>{{$task->title}}</h3>
            <h3><b style="color: red">Content:</b> {{$task->content}} </h3>
            <h3><b style="color: red">Client:</b>{{$task->client->name}}</h3>
            <h3><b style="color: red">Author:</b>{{$task->author->name}}</h3>
            <h3><b style="color: red">Project:</b>{{$task->project->name}}</h3>
            <h3><b style="color: red">Priority:</b>{{$task->priority->priority_name}}</h3>
            <h3><b style="color: red">Status:</b>{{$task->status->name}}</h3>
            <h3><b style="color: red">Estimated time:</b>{{$task->estimated_time}} min</h3>
            <h3><b style="color: red">Spent time:</b>{{$task->spent_time}} min</h3>
            <h3><b style="color: red">Billing time:</b>{{$task->billing_time}} min</h3>
            <h3><b style="color: red">Rate:</b>{{$task->fixed_rate}} Eur</h3>
            <h3><b style="color: red">Created at:</b>{{$task->created_at}}</h3>
            <h3><b style="color: red">Updated_at:</b>{{$task->updated_at}}</h3>
            <h3><b style="color: red">Start:</b>{{$task->start_date}}</h3>
            <h3><b style="color: red">Deadline:</b>{{$task->deadline_date}}</h3>
            <a href="{{ route('task-pdf',['download'=>'pdf', 'id'=> $task->id]) }}"><?php echo date('y.m.d'); ?></a>

        </div>

</body>
</html>
