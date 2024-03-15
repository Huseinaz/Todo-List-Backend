<?php

include "./connection.php";

$description = isset($_POST['description']) ? $_POST['description'] : '';
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

$query = $connection ->prepare('INSERT INTO lists (description, user_id) VALUES (?,?)');

$query ->bind_param('si', $description, $user_id);

if($query->execute()) {
    $response['message'] = "list created";
    $response['id'] = $connection->insert_id;
} else {
    $response['message'] = "list not created";
}

echo json_encode($response);

$connection ->close();
