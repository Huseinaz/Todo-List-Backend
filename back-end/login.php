<?php

include('connection.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = $connection ->prepare('SELECT id,username,email,password
FROM users
WHERE username=? OR email=?');

$query->bind_param('ss', $username, $email);

$query->execute();

$query->store_result();

$query->bind_result($id, $username, $email, $hashed_password);

$query->fetch();

$num_rows = $query->num_rows();

if ($num_rows == 0) {
    $response['message'] = "user not found";
} else {
    if (password_verify($hashed_password)) {
        $response['message'] = "logged in";
        $response['user_id'] = $id;
        $response['username'] = $username;
        $response['email'] = $email;
    } else {
        $response['message'] = "incorrect password";
    }
}

echo json_encode($response);

$connection ->close();
