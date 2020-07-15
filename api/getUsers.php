<?php

include 'connect.php';
$query = $pdo->query('SELECT * FROM `users` ORDER BY `id`');
$mass = $query->fetchAll(PDO::FETCH_OBJ);

echo json_encode(array(
    'method' => 'GET',
    'data' => $mass,
    'done' => true
));