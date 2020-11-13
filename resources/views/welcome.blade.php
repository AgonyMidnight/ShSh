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
    <div class="grid">
        <div>
            @foreach ($date as $value)
            <div class="Outsider">
                {{$value->id}}
                <br>
                <b>{{$value->title}}</b>
                <br>
                {{$value->description}}

                <form action="Notes/{{$value->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Удалить" />
                </form>
            </div>
            @endforeach
        </div>
        <div>
            <a href="/Notes/create">NewNote</a>
        </div>
    </div>
    </body>
</html>
