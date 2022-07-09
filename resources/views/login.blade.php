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
<h1>Вход</h1>
<form action="{{ route('user.login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Ваш email</label>
        <input type="text" name="email" id="email" placeholder="Email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="password">Пароль</label>
        <input type="text" name="password" id="password" placeholder="Password">
        @error('password')
        <div>{{$message}}</div>
        @enderror
    </div>
    <input type="checkbox" id="checkbox" name="remember">Запомнить
    <div>
        <button type="submit" name="sendMe" value="1">Войти</button>
    </div>
</form>
<a href="{{ route('user.register') }}">Зарегистрироваться</a>
</body>
</html>
