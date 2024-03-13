<?php

include "./connection.php";

$query = $connection ->prepare('SELECT * FROM users');

$query ->execute();

$query ->store_result();

$query ->bind_result($id, $username, $email, $password);

$response = [];
while($query ->fetch()) {
    $user = [
        'id' => $id,
        'username' => $username,
        'email' => $email,
        'password' => $password
    ];
    $response[] = $user;
}

echo json_encode($response);

$connection ->close();
