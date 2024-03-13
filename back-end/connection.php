<?php 

$name="localhost";
$user="root";
$pass="";
$db_name="todo_db";

$connection=new mysqli($name,$user,$pass,$db_name);

if ($connection -> connect_error) {
    echo "Error connecting";
}
