<?php
    $server = "31.22.4.240";
    $username = "fastmovi_burt";
    $password = "zy;?f9lDgBUM";
    $dbname = "fastmovi_epiz_28351378_fastMovies";
    
    $conn = mysqli_connect($server, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $ip = $_SERVER['REMOTE_ADDR'];
    // $ip = '154.79.114.145';
    // $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    //echo $details->country;  -> "Mountain View"
    echo $ip."<br>";
    $timestamp = date("Y-m-d H:i:s");
    echo $timestamp;
    
    $sql = "INSERT INTO `address` (ip, time_set) VALUES ('$ip', now())";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "success";
    } else {
        echo "failed". mysqli_error($conn);
    }
?>