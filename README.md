<h1>Тестовое задание №1</h1>
<ul>
  <li>СУБД: PostreSQL</li>
  <li>
    <a href="http://blooming-scrubland-23442.herokuapp.com/">Ссылка для демонстрации приложения</a>
  </li>
  <li>Модели:</li>
  <ul>
    <li>User - модель для таблицы users</li>
    <li>MusicPlate - модель для таблицы music_plates</li>
  </ul>
  <li>Контроллеры:</li>
  <ul>
    <li>RegistrationController - отвечает за регистрацию пользователей</li>
    <li>LoginController - отвечает за авторизацию пользователей</li>
    <li>MusicPlateController - отвечает за действия свзяанные с моделью MusicPlate</li>
  </ul>
  <li>Запросы для валидации:</li>
    <ul>
    <li>LoginRequest - регистрирует правила и выводит сообщения об ошибках в представлении <code>login/login.blade.php</code></li>
    <li>RegistrationRequest - регистрирует правила и выводит сообщения об ошибках в представлении <code>registration/registration.blade.php</code></li>
    <li>MusicPlateRequest - регистрирует правила и выводит сообщения об ошибках в представлениях в директории <code>home/music_plate</code></li>
  </ul>
  <li>В классе Handler.php добавил в метод render перенаправление на представления в деректории <code>errors</code> в случае HttpException</li>
</ul>
