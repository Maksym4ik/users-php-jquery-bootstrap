<?php

//Подключение к базе данных
include 'connect.php';

$first = $_POST['first'];
$second = $_POST['second'];
$status = $_POST['status'];
if ($_POST['role'] === 'null' || $_POST['role'] === null)
    $role = 'user';
else
    $role = $_POST['role'];
if ($_GET['id']) {
    $id = $_GET['id'];
    //изменение данных

    $sql = "UPDATE `users` SET `first`= ?, `second`= ?, `status`= ?, `role` = ? WHERE `users`.`id` = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($first, $second, $status, $role, $id));

    echo json_encode(array(
        'method' => 'POST',
        'id' => $_GET['id'],
        'done' => $_POST
    ));

} else {
//загрузка новых данных
    $sql = 'INSERT INTO `users` (`id`,`first`, `second`, `status`, `role`) VALUES (null, ?, ?, ?, ?);';
    $query = $pdo->prepare($sql);
    $query->execute(array($first, $second, $status, $role));

    echo json_encode(array(
        'method' => 'POST',
        'done' => $_POST
    ));

}