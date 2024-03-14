<?php

include "./connection.php";

$description = $_POST['description'];
$user_id = $_POST['user_id'];

$query = $connection ->prepare('INSERT INTO lists (description, user_id) VALUES (?,?)');

$query ->bind_param('si', $description, $user_id);

if($query->execute()) {
    $response['message'] = "list created";
} else {
    $response['message'] = "list not created";
}

echo json_encode($response);

$connection ->close();
