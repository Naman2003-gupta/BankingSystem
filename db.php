<?php
$server="localhost";
$username="root";
$password="1411";  // change if different
$db="banksystem";

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>
