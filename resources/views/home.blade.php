@extends('layouts.app')

@section('content')
    {{--style for home--}}
    <style>
        .py-4{
            padding-top: 0px!important;
        }
        .navbar{
            margin: 0px!important;
        }
    </style>

    {{--1 sekcija--}}
    <div class="first-div" style="width: 100%; background-color: white; height: 500px; padding: 40px; display: flex;">
        <div style="width: 50%; white-space: normal; padding-left: 5%; ">
            <h2 style="margin-top: 0px;">Hello! I'm  Alfred! </h2>
            <h3>Contacts:</h3>
            <ul style="font-size: x-large;">
                <li>+37060825981</li>
                <li>allfred.ivasko@gmail.com</li>
                <li>Kovo 11-osios, 27-17 Vilnius</li>
                <li>https://github.com/Kosmarik</li>
                <li><a href="/CV/cv.php?fileName=Alfred_Ivasko.pdf">CV</a></li>
            </ul>
            <h3>Skills</h3>
            <ul style="font-size: x-large;">
                <li>PHP/Laravel/CI</li>
                <li>JS/jQuery</li>
                <li>Linux/Unix</li>
                <li>GIT/Terminal</li>
            </ul>
        </div>

        <div style="width: 50%; text-align: center;">
            {{--<img src="https://www.telegraph.co.uk/content/dam/news/2016/08/23/106598324PandawaveNEWS_trans_NvBQzQNjv4Bqeo_i_u9APj8RuoebjoAHt0k9u7HhRJvuo-ZLenGRumA.jpg?imwidth=450">--}}
            <img src="/img/mano.jpg" alt="Smiley face" width="300" height="400">
        </div>
    </div>
    {{--2 sekcija--}}
    <div class="second-div" style="width: 100%; background-color: lightblue; height: 500px; padding: 40px; display: flex;">
        <div style="width: 50%; white-space: normal; text-align: center; padding: 20px;">
            <img style="width: 500px; height: 300px;" src="https://www.codeacademy.lt/wp-content/themes/codeacademy/dist/images/ca_logo.png">
        </div>
        <div style="width: 50%; white-space: normal; padding: 5%; ">
            <h4>I'm studying in VGTU (Manufacture Egnineering), but after two years i understood what i don't like it and i want to try something else.</h4>
            <h4> I'm decided what i want to try Programming. I started search programming schools and I found.</h4>
        </div>
    </div>
    {{--3 sekcija--}}
    <div class="first-div" style="width: 100%; background-color: white; height: 500px; padding: 40px; display: flex;">
        <div style="width: 50%; padding: 10%;">
            <h4>I choose PHP language because it one of the most used WEB-language.</h4>
            <h4>And i liked it!</h4>
            <h4>In one year I managed to finish PHP-first and PHP-second level, where I learned core of PHP language.</h4>
        </div>
        <div style="width: 50%; text-align: center;">
            <img style="width: 400px; height: 400px;"  src="https://www.codeacademy.lt/wp-content/uploads/2017/05/icon-03-1.png">
        </div>
    </div>
    <div class="second-div" style="width: 100%; background-color: lightblue; height: 500px; padding: 40px; display: flex; text-align: center;">
        <div style="width: 50%; white-space: normal; text-align: center; padding: 20px;">
            <img style="width: 500px; height: 300px;"  src="https://www.codeacademy.lt/wp-content/themes/codeacademy/dist/images/cak_logo.png">
        </div>
        <div style="width: 50%; white-space: normal; padding: 10%; ">
            <h4> At this moment I work in CodeAcademyKids. I'm teaching  kids the basics of programming.</h4>
            <h4>Also i'm raise my knowledge in programming and now i'm working on my first Laravel project.</h4>
            <h4>Yes!!! This is my first Laravel project and you can look on it!</h4>
        </div>
    </div>
    <div class="first-div" style="width: 100%; background-color: white; height: 500px; padding: 40px; display: flex; justify-content: space-between;">
        <div style="width: 33%; padding: 10px; text-align: center; border: 3px lightgrey solid; border-radius: 15px;">
              <span style="font-size: 100px;" class="glyphicon glyphicon-calendar"></span>
            <h3><b>Tasks Calendar</b></h3>
            <h4>Here you can see all tasks and edit them. You can move them in calendar and change start or deadline date. This button <span class="glyphicon glyphicon-circle-arrow-right"></span> redirect you to task details.</h4>
            <div style="text-align: left; width: 90%; margin: 0 auto;">
                <p><span style="font-size: 30px; color: springgreen;" class="glyphicon glyphicon-circle-arrow-right"> Done</span></p>
                <p><span style="font-size: 30px; color: orange;" class="glyphicon glyphicon-circle-arrow-right"> In Progress</span></p>
                <p><span style="font-size: 30px; color: red;" class="glyphicon glyphicon-circle-arrow-right"> New</span></p>

            </div>
        </div>
        <div style="width: 33%; padding: 10px; text-align: center; border: 3px lightgrey solid; border-radius: 15px;">
            <span style="font-size: 100px;" class="glyphicon glyphicon-list-alt"></span>
            <h3><p>Projects</p></h3>
            <h4>Here you can see all projects and project details.</h4>
            <h4>You will see all projects only if you are Admin or Project Manager.</h4>
            <h4>Also in "Project Details" you will see all tasks owned by project.</h4>
        </div>
        <div style="width: 33%; padding: 10px; text-align: center; border: 3px lightgrey solid; border-radius: 15px;">
            <span style="font-size: 100px;" class="glyphicon glyphicon-eur"></span>
            <h3><p>Invoice</p></h3>
            <h4>Here you can see all companies what you work with and all tasks what you made for them. </h4>
            <h4>Also you can create invoice for them. You need to mark all all task what you done and press <span class="glyphicon glyphicon-euro"></span> after this php will generate invoice for you.</h4>
            <h4>If you want to get PDF of generated invoice you should click on date!</h4>
        </div>
    </div>


@endsection
