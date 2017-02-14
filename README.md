# Registration form PHP JS PDO MVC
## Краткое описание работы
#### В файле .htaccess настроен постоянный редирект на файл index.php.
#### Далее все GET и POST параметры разбираютуся в файле route.php
#### После разбора и анализа строки запроса определяется контроллер, экшен и параметры.
#### Запускается определенный контроллер.
#### В этом контроллере данные для обработки (например обращение к БД, валидация) передаются в соответствующую модель.
#### После обработки в модели данные возвращаются назад в контроллер, где будет вызвано соответствующее представление.
#### Представление ожидает дальнейших действий пользователя, например Logout или смену языка интерфейса.
#### Как только пользователь определяется и совершает действие, все данные снова попадают в файл index.php и т.д.
## Безопасность
#### Загружаемыe имиджи проходят проверку по черному и белому спискам, meta-типу, допустимому размеру файла.
#### Также в папку с имиджами добавлен .htaccess с запретом запуска скриптов из данной папки.
#### Также добавлен в файл .htaccess запрет на просмотр содержимого папок сайта на сервере.
#### Добавлена CSRF-защита. Случайный код генерируется на сервере и передается в представление и сессию.
