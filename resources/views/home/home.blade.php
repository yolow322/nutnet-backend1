<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <ul class="nav justify-content-end">
        <li class="navbar">Доброго времени суток, {{Auth::user()->getLogin()}}</li>
        <li class="nav-link">
            <a href="{{route('create-music-plate')}}" class="btn btn-primary">Добавить новую пластинку</a>
        </li>
        <li class="nav-link">
            <a href="{{route('logout')}}" class="btn btn-primary">Выйти</a>
        </li>
    </ul>
    <div class="d-flex justify-content-around">
        <div class="col-xl-5">
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
            @if(isset($musicPlatesMessage))
                <p class="font-weight-bold">{{$musicPlatesMessage}}</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">№</th>
                            <th scope="col">Автор(группа) </th>
                            <th scope="col">Название альбома</th>
                            <th scope="col">Жанр альбома</th>
                            <th scope="col">Дата записи</th>
                            <th scope="col">Создал</th>
                            <th scope="col">Удаление</th>
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
                            <td>
                                <a href="{{route('delete-music-plate', $musicPlate->id)}}" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$musicPlates->links()}}
                </div>
            @endif
        </div>
        <div class="col-xl-4">
            @if(isset($musicPlates))
            <form method="post" action="{{route('change-music-plate', $musicPlate->id)}}">
                @csrf
                {{method_field('patch')}}
                <div class="form-group">
                    <label for="music_plate_id">Выбирите пластинку, которую хотите изменить:</label>
                    <select class="custom-select" name="id">
                        <option selected hidden>№ пластинки в БД</option>
                        @foreach($musicPlates as $musicPlate)
                            <option class="form-control" value="{{$musicPlate->id}}">{{$musicPlate->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="music_author">Автор(группа) музыкальной пластинки:</label>
                    <input type="text" class="form-control" placeholder="Введите автора" name="music_author" value="">
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
                    <input type="date" class="form-control" placeholder="Введите дату" name="date_of_creation_album">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Изменить">
                </div>
            </form>
            @else
                <p class="text-center font-weight-bold">Форма редактирования недоступна, т.к в БД нет записей музыкальных пластинок</p>
            @endif
        </div>
    </div>
</html>
