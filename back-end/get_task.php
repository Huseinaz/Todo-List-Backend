<?php

include "./connection.php";

$user_id = $_GET['user_id'];

$query = $connection ->prepare('SELECT * FROM lists WHERE user_id=?');

$query ->bind_param('i', $user_id);

$query ->execute();

$query ->store_result();

$query ->bind_result($id, $user_id, $description, $complete);

$response = [];
while($query ->fetch()) {
    $list = [
        'id' => $id,
        'user_id' => $user_id,
        'description' => $description,
        'complete' => $complete
    ];
    $response[] = $list;
}

echo json_encode($response);

$connection ->close();
