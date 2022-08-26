<?php include "header.php"; 
    include "dbh.php";
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://www.google.com/recaptcha/api.js"></script>


<style>
    body{
        background-color: black;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("resources/images/contact.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
    }
    .row-form {
        width: 40vw;
        border: 1px solid black;
        border-radius: 5px;
        margin: auto;
        background-color: #fff;
        margin-top: 5vh;
        margin-bottom: 5vh;
    }
    .form {
        width: 80%;
        margin: auto;
    }
    .status {
        padding: 15px;
        color: green;
        font-size: 20px;
    }
    .status span {
        color: red;
    }
    @media  screen and (max-width: 767px) {
        .row-form{
            width: 100vw;
            margin-left: 0;
            padding: 0;
        }
    }
</style>
<div class="container">
    <div class="row-form">
        <div class="form">
            <h2>Contact Us</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail" placeholder="Enter email" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Enter subject" required>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <div class=""></div>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeCyDUdAAAAADoND9gcnaSNHe1oH4LGERuaOGb3"></div>
                    <button class="btn btn-primary" name="save" type="submit">Send message</button>
                </div>
            </form>
            <div class="status">
                <?php
                if (isset($_POST['save'])) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']) ;
                    $smail = mysqli_real_escape_string($conn, $_POST['mail']);
                    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
                    $message = mysqli_real_escape_string($conn, $_POST['message']);
                    $rmail = "fastmoviesup@gmail.com";
                    $headers = "From: $smail \r\n";

                    $secretKey = "6LeCyDUdAAAAAFdbnDSOqbZmV-aWX-2HPrJb1Upi";
                    $responseKey = $_POST['g-recaptcha-response'];
                    $userIp = $_SERVER['REMOTE_ADDR'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIp";

                    $response = file_get_contents($url);
                    $response = json_decode($response);

                    if ($response->success) {
                        $sq = "INSERT INTO contactdet (name, email, subject, message) VALUES ('$name', '$smail', '$subject', '$message')";
                        $query = mysqli_query($conn, $sq);
                        if($query) {
                            echo "Sent successfully";
                        } else {
                            echo "An error occurred please try again";
                        }
                        
                    } else {
                        echo "<span>Invalid captcha! Please try again.</span>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include "footer.html"; ?>