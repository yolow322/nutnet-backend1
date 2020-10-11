<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <div class="container" style="width: 500px">
        <h1 class="text-center">Авторизация</h1>
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
            <form method="POST" action="{{route('login-submit')}}">
                @csrf
                <div class="form-group">
                    <label for="login">Логин:</label>
                    <input type="text" class="form-control" placeholder="Введите логин" name="login">
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" class="form-control" placeholder="Введите пароль" name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember">Запомнить меня</label>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Авторизироваться">
                </div>
            </form>
            <div class="text-center">
                <a href="{{route('start-page')}}" class="btn btn-primary">Назад</a>
            </div>
        </body>
    </div>
</html>




