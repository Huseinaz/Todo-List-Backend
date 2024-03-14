<?php 

include "./connection.php";

$lists_id= $_POST['id'];
$description = $_POST['description'];
$user_id = $_POST['user_id'];

$query = $connection ->prepare('UPDATE lists SET description=? WHERE user_id=? AND id=?');

$query ->bind_param('sii', $description, $user_id, $lists_id);

if($query->execute()) {
    $response['message'] = "list updated successfully";
} else {
    $response['message'] = "list not updated successfully";
}

echo json_encode($response);

$connection ->close();
