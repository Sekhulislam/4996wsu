<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "todo";

// Create connection to PHP Admin
$conn = @mysqli_connect($servername, $username, $password, $database_name);

// Check connection and only display failed connection to users
if (!$conn) {
    die("Connection failed..... ");
}

?>