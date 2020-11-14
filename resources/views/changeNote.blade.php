<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <title>ShSh</title>
</head>
<body>
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
    <div class="Outsider">
        <h2>Имя:</h2>
        <form action="/Notes/{{$data->id}}" method="post">
            <input type="text" name="title" value="{{$data->title}}">
            <h2>Описание:</h2>
            <textarea name="description" cols="100" rows="15" >{{$data->description}}</textarea>
                @method('PUT')
                @csrf
            <br>
            <input type="submit" value="Изменить"  class="littleButtons"  />
        </form>
    </div>
</body>
</html>
