<!DOCTYPE html>
<html>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
</html>
<body>
<h3>Calendar</h3>

<div style="width: 60vh; height: 80vh;" id='calendar'></div>


<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                    @foreach($tasks as $task)
                {
                    title : '{{ $task->title }}',
                    start : '{{ $task->deadline_date }}',
                    url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });
</script>
</body>