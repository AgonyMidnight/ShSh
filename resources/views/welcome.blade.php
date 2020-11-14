<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShSh</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <!-- Styles -->


</head>
<body class="antialiased">
<a href="/Notes">
    <div class="loft">
        <div class="NameSite">
            Ш Ш
        </div>
        <div class="NameSiteAbout">
            <i>Шо шептанём?</i>
        </div>
    </div>
</a>
<div class="grid">
    <div class="Article">
        @foreach ($date as $value)
            <div class="Outsider">
                <br>
                <h2><b>{{$value->title}}</b></h2>
                <br>
                <div class="grid">
                    <div>{{$value->description}}</div>
                    <div>
                        @if ($value->img)
                            <img class="imgClass" src="{{asset('storage/'.$value->img)}}" alt="NotImage">
                        @endif
                    </div>
                </div>
                <div class="lineButtons">
                    <form action="Notes/{{$value->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Удалить" class="littleButtons"/>
                    </form>
                    <a href="Notes/{{$value->id}}/edit" method="get">
                        <input type="submit" value="Изменить" class="littleButtons"/>
                    </a>
                    <small>{{$value->created_at}}</small>
                    <small>{{$value->updated_at}}</small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="buttons">
        <a href="/Notes/create">NewNote</a>
    </div>
</div>
</body>
</html>
