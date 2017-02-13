# Registration form PHP JS PDO MVC
## В файле .htaccess настроен постоянный редирект на файл index.php.
## Далее все GET и POST параметры разбираютуся в файле route.php
## После разбора и анализа строки запроса определяется контроллер, экшен и параметры
## После этого начинает работать определенный контроллер.
## В этом контроллере данные для обработки (например обращение к БД, валидация) передаются в соответствующую модель
## После обработки в модели данные передаются в назад в контроллер, где будет вызвано соответствующее представление
## Представление ожидает дальнейших действий пользователя, например Logout или смену языка интерфейса.
## Как только пользователь определяется и совершает действие, все данные снова попадают в файл index.html и т.д.
