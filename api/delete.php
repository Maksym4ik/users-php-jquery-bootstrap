<?php

include "connect.php";

$id = $_GET['id'];

//Подготовка к загрузке в базу данных
$sql = 'DELETE FROM `users` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);

header("HTTP/1.1 200 OK");

echo json_encode(array(
    'method' => 'GET',
    'id' => $_GET['id'],
    'done' => true
));