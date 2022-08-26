<?php

$server = "31.22.4.240";
$username = "fastmovi_burt";
$password = "zy;?f9lDgBUM";
$dbname = "fastmovi_epiz_28351378_fastMovies";

$conn = mysqli_connect($server, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}