<?php

include('connection.php');

$username = isset($_POST['username']) ? $_POST['username'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password =  isset($_POST['password']) ? $_POST['password'] : null;

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
    if (password_verify($password, $hashed_password)) {
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
