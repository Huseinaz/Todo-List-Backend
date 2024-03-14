<?php 

include "./connection.php";

$list_id= $_POST['id'];
$user_id = $_POST['user_id'];

$query = $connection ->prepare('DELETE FROM lists WHERE id =? AND user_id =?');

$query ->bind_param('ii', $list_id, $user_id);

if($query->execute()) {
    $response['message'] = "Task deleted successfully";
} else {
    $response['message'] = "Error deleting task: ". $connection -> error;
}

echo json_encode($response);

$connection->close();
