@extends('layouts.app')

@section('content')

    {{--{{$users[0]["name"]}}--}}

    <div style="width: 80%; margin: 0 auto; background-color: white; display: flex; height: 500px; border: 3px darkgrey solid; ">
        <div style="width: 20%; height: 100%; border-right: 3px darkgrey solid; background-color: darkgrey; text-align: center;">
            <h2>Admin Menu</h2>

            <button style="width: 80%; height: 30px; background-color: #0079f7; border-radius: 15px; font-size: larger; color: white;" onclick="showHideUsers()" > All Users</button>

            <button style="width: 80%; margin-top: 20px; height: 30px; background-color: #0079f7; border-radius: 15px; font-size: larger; color: white;" onclick="setRole()" >Set Role</button>

        </div>
        <div  style="width: 80%; height: 100%; background-color: silver; text-align: center;">
            <div id="myDIV" style="width: 50%; height: 80%; margin: 0 auto; border: 1px black solid; display: none;">
                <ul class="list-group">
                    <li class="list-group-item active">Users</li>
                @foreach($users as $user)
                    <li class="list-group-item">{{$user->name}}</li>
                @endforeach
                </ul>
            </div>

            <form action="{{route('setRole')}}" method="POST">
                @method('POST')
                @csrf

                <div id="setRole" style="height: 20%; display: none;">
                    <select name="user" href="" style="width: 200px;">
                        <option>...</option>
                        @foreach($users as $user):
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>

                    <select name="role" href="" style="width: 200px;">
                        <option>...</option>
                        @foreach($roles as $role):
                        <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>

                    <input type="submit">
                </div>
            </form>

        </div>



    </div>





    <script>
        function showHideUsers() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function setRole() {
            var x = document.getElementById("setRole");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection