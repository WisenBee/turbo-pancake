<?php

$servername = "localhost:3306";
$username = "root";
$password = "esbddsa13";
$dbname = "dela3_labghit";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
