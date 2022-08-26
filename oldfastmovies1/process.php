<?php

include "dbh.php";

$errors = [];
$data = [];
$email = "";
// if (isset($_GET['report-link'])) {
// https://fastmovies1.com/process?name=https%3A%2F%2Ffastmovies1.com%2Fmovies%2F680-Blacklight&email=crosetsw09%40gmail.com&urlTrim=80-Blacklight
    $url = $_GET['name'];
    $urlTrim = $_GET['urlTrim'];
    $email = $_GET['email'];
    // $url = mysqli_real_escape_string($conn, $_GET['url']);
    // $urlTrim = mysqli_real_escape_string($conn, $_GET['urlTrim']);
    // $email = mysqli_real_escape_string($conn, $_GET['email']);
    
    
    
    if ($email != "") {
        $sq = "INSERT INTO brokenlinks (url, email) VALUES ('$url', '$email')";
        $query = mysqli_query($conn, $sq);
        $to = "contact@fastmovies1.com";
        $subject = "Broken links";
        $headers = "From: crosetsw09@gmail.com" . "\r\n" .
        "CC: fastmoviesup@gmail.com";
        
        $success = mail($to,$subject,$url,$headers);
    } else {
        $success1 = mail($to,$subject,$url,$headers);
    }
    
// }

if (!empty($_GET['url'])) {
    $errors['url'] = 'Something went wrong. Please try again.';
}

if (empty($errors)) {
    $data['success'] = true;
    $data['errors'] = 'Success!';
    $data['results'] = $urlTrim;
} else {
    $data['success'] = false;
    $data['message'] = $errors;
}


echo json_encode($data);