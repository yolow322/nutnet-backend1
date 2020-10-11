<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <div class="container" style="width: 500px">
        <h1 class="text-center">Регистрация</h1>
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
            <form method="POST" action="{{route('registration-submit')}}">
                @csrf
                <div class="form-group">
                    <label for="login">Логин:</label>
                    <input type="text" class="form-control" placeholder="Введите логин" name="login">
                </div>
                <div class="form-group">
                    <label for="email">Эл. почта:</label>
                    <input type="email" class="form-control" placeholder="Введите эл. почту" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" placeholder="Введите пароль" name="password">
                </div>
                <div class="form-group">
                    <label for="password-check">Проверка на совпадение пароля:</label>
                    <input type="password" class="form-control" placeholder="Введите пароль повторно" name="password_confirmation">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Зарегистрироваться">
                </div>
            </form>
            <div class="text-center">
                <a href="{{route('start-page')}}" class="btn btn-primary">Назад</a>
            </div>
        </body>
    </div>
</html>



