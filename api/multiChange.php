<?php

include "connect.php";

$mass = $_POST['mass'];
$type = $_POST['type'];

switch($type){
    case "active":
        foreach ($mass as $id) {
            $sql = "UPDATE `users` SET `status`= ? WHERE `id` = ?";
            $query = $pdo->prepare($sql);
            $query->execute(array("on",$id));
        }
        break;
    case "not-active":
        foreach ($mass as $id) {
            $sql = "UPDATE `users` SET `status`= ? WHERE `id` = ?";
            $query = $pdo->prepare($sql);
            $query->execute(array("off",$id));
        }
        break;
    case "delete":
        foreach ($mass as $id) {
            $sql = 'DELETE FROM `users` WHERE `id` = ?';
            $query = $pdo->prepare($sql);
            $query->execute(array($id));
        }
        break;
    default:
        echo "none";
}


echo json_encode(array(
    'method' => 'POST',
    'data' => $_POST,
    'done' => true,
    'type'=> $type
));

