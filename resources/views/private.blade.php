<?php
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
<p>Залогинились!</p>
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
</body>
</html>
