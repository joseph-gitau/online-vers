<!-- database connection -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fastmovi_epiz_28351378_fastmovies_localv2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
