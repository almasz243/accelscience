<?php
?><!doctype html>
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
<h1>Аплоад</h1>
<form action="{{ route('user.upload') }}" method="POST">
    @csrf
    <div>
        <label for="name">Название</label>
        <input type="text" name="name" id="name" placeholder="name">
        @error('name')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="youtube">Ссылка на ютуб</label>
        <input type="text" name="youtube" id="youtube" placeholder="youtube">
        @error('youtube')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="onedrive">Ссылка на документ OneDrive</label>
        <input type="text" name="onedrive" id="onedrive" placeholder="onedrive">
        @error('onedrive')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="value">Сумма</label>
        <input type="text" name="value" id="value" placeholder="value">
        @error('value')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <button type="submit" name="sendMe" value="1">Аплоад</button>
    </div>
</form>
<a href="{{route('user.private')}}">Назад</a>
</body>
</html>
