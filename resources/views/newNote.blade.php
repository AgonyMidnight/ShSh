<!doctype html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShSh</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <hr>
@endif
<div>
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
        <form action="/Notes/" method="post" enctype="multipart/form-data">
            @csrf
            <p>Введите название:</p>
            <input type="text" name="title">
            <p>Введите описание:</p>
            <textarea name="description" cols="100" rows="10"></textarea>
            <p>Выберите категорию</p>
            <select name="category_id" onchange="if(this.value == 'add') hiddenBlock.hidden = false;">
                <option value="" hidden>Выбрать</option>
                <option value="add">Добавть категорию:</option>
                @foreach($all as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                <option value=""></option>

            </select>

            <input type="text" name="newCategory" id="hiddenBlock" hidden>
            <br>
            <p>Добавьте файл</p>
            <input type="file" name="imgFile">
            <br>
            <input type="submit" class="littleButtons">
        </form>
    </div>

</div>
</body>
</html>
