<!DOCTYPE html>
<html lang="en">
<head>
    <title>Start page</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
    <div class="container" style="width: 500px">
        <h1 class="text-center">Добро пожаловать на сайт</h1>
        <div class="text-center">
            <h5>Для того чтобы начать пользоваться сайтом, необходимо зарегистрироваться</h5>
        </div>
        <body>
            <div class="d-flex justify-content-around">
                <a href="{{route('registration')}}" class="btn btn-primary">Регистрация</a>
                <a href="{{route('login')}}" class="btn btn-primary">Авторизация</a>
            </div>
        </body>
    </div>
</html>
