<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <body>
        <ul class="nav justify-content-end">
            <li class="navbar">Доброго времени суток, {{Auth::user()->getLogin()}}</li>
            <li class="nav-link">
                <a href="{{route('create-music-plate')}}" class="btn btn-primary">Добавить новую пластинку</a>
            </li>
            <li class="nav-link">
                <a href="{{route('logout')}}" class="btn btn-primary">Выйти</a>
            </li>
        </ul>
        <div class="container" style="width: 600px">
            <div class="align-content-center">
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
                @if(empty($musicPlates))
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th scope="col">№</th>
                            <th scope="col">Автор(группа) </th>
                            <th scope="col">Название альбома</th>
                            <th scope="col">Жанр альбома</th>
                            <th scope="col">Дата записи</th>
                            <th scope="col">Создал</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($musicPlates as $musicPlate)
                            <tr>
                                <th scope="row">{{$musicPlate->id}}</th>
                                <td class="text-break">{{$musicPlate->music_author}}</td>
                                <td class="text-break">{{$musicPlate->album_name}}</td>
                                <td class="text-break">{{$musicPlate->genre_of_music}}</td>
                                <td class="text-center">{{date('d-m-Y', strtotime($musicPlate->date_of_creation_album))}}</td>
                                <td class="text-break">{{$musicPlate->created_by_user}}</td>
                                <td class="text-center">
                                    <a href="{{route('update-music-plate', $musicPlate->id)}}" class="btn btn-primary">Изменить</a>
                                    <a href="{{route('delete-music-plate', $musicPlate->id)}}" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$musicPlates->links()}}
                    </div>
                @else
                    <p class="font-weight-bold text-center">В данный момент в БД нет записей</p>
                @endif
            </div>
        </div>
    </body>
</html>
