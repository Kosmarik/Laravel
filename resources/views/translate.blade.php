{{--@extends('layouts.app')--}}

{{--@section('content')--}}
<?php
        $random = rand(0, count($translate)-1);

?>
<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('css/tranlator/translator.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="main">
        <div id="rus" class="value-rus" onclick="myTranslate()">
            {{$translate[$random]->russia}}
        </div>
        <div id="english" class="value-en" onclick="myTranslate()">
            {{$translate[$random]->english}}
        </div>
        <div class="next-button">
            <a href="http://185.80.130.158/vocabulary">Next</a>
        </div>
    </div>

<script src="{{asset('js/translator/translator.js')}}">
</script>
</body>
</html>

{{--@endsection--}}