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
@foreach($pages as $page)
    <div>{{$page->name }}</div>
        @php
            $video = $page->video;
            $name = explode('watch?v=',$video);
            $name1 = $name[1]
        @endphp
    <iframe src="{{$page->document}}" style="width:600px; height:500px;" frameborder="0"></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$name1}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div>{{$page->valueOf}}/{{$page->value }}руб.</div>
    <form action="{{route('user.give')}}" method="get">
        @csrf
        <h1>Пожертвовать</h1>
        <input type="text" name="id" id="id" value="{{$page->id}}" style="display:none">
        <input type="number" name="money" id="money" placeholder="5000">
        <button type="submit">Отправить</button>
    </form>
@endforeach
<a href="{{route('user.private')}}">Назад</a>
</body>
</html>
