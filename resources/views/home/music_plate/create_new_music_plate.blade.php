<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Music Plate</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <div class="container" style="width: 500px">
        <h1 class="text-center">Создание новой пластинки</h1>
        <body>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
            <form method="POST" action="{{route('create-music-plate')}}">
                @csrf
                <div class="form-group">
                    <label for="music_author">Автор(группа) музыкальной пластинки:</label>
                    <input type="text" class="form-control" placeholder="Введите автора" name="music_author">
                </div>
                <div class="form-group">
                    <label for="album_name">Название альбома:</label>
                    <input type="text" class="form-control" placeholder="Введите название альбома" name="album_name">
                </div>  <div class="form-group">
                    <label for="genre_of_music">Жанр:</label>
                    <input type="text" class="form-control" placeholder="Введите жанр" name="genre_of_music">
                </div>
                <div class="form-group">
                    <label for="record_label">Лейбл записи:</label>
                    <input type="text" class="form-control" placeholder="Введите лейбл" name="record_label">
                </div>
                <div class="form-group">
                    <label for="date_of_creation_album">Дата записи альбома:</label>
                    <input type="date" class="form-control" placeholder="Введите дату записи" name="date_of_creation_album">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Создать">
                </div>
            </form>
            <div class="text-center">
                <a href="{{route('show-music-plates')}}" class="btn btn-primary">Назад</a>
            </div>
        </body>
    </div>
</html>





