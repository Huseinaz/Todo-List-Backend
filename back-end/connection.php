<?php 

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Credentials: true");

header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

header("Access-Control-Allow-Headers: Content-Type");

$name="localhost";
$user="root";
$pass="";
$db_name="todo_db";

$connection=new mysqli($name,$user,$pass,$db_name);

if ($connection -> connect_error) {
    echo "Error connecting";
}
