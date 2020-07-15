<?php
$host = 'localhost'; // адрес сервера
$db = 'test'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

$dsn = "mysql:host=$host;dbname=$db"; //строка подключения
$pdo = new PDO($dsn, $user, $password); //подключение
