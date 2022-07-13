<?php
use Illuminate\Support\Facades\Auth;
?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>
<p>Здравствуйте, {{Auth::user()->email}}</p>
<form action="{{route('user.logout')}}" method="GET">
    @csrf
    <button type="submit">Выйти</button>
</form>
<a href="{{route('user.upload')}}">Аплоад</a>
@if(session()->has('message'))
    <div>
        {{ session()->get('message') }}
    </div>
@endif
<hr>
@foreach($tables as $table)
    <div>{{$table->name }}</div>
    <div>{{$table->valueOf}}/{{$table->value }}руб.</div>
    <a href="{{route('user.page',['id' =>$table->id])}}">Посмотреть</a>
    <hr>
@endforeach
<div>
    <h1>Онлайн чат</h1>
    <div>
        <div id="chatInput" contenteditable="" style="width:30%; border:solid black 2px"></div>
    </div>
    <div class="chatContent">
        <ul>
            @foreach($chat as $user)
                <li>{{$user->email}}: {{$user->message}}</li>
            @endforeach
        </ul>
    </div>
</div>
</body>
<script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(function(){
        let ip_address = '127.0.0.1';
        let socket_port = '3000';
        let socket = io(ip_address + ':' + socket_port);
        socket.on('connection');
        let chatInput = $('#chatInput');
        let user = "{{Auth::user()->email}}";
        chatInput.keypress(function(e){
            let message = $(this).html();
            console.log(message);
            if(e.which === 13 && !e.shiftKey){
                socket.emit('sendChatToServer', user , message );
                chatInput.html('');
                return false;
            }
        })
        socket.on('sendChatToClient', (user, message) => {
            $('.chatContent ul').append(`<li>${user}: ${message}</li>`);
        });
    })
</script>
</html>
