<?php 
// Google reCAPTCHA API key configuration 
$siteKey     = '6LeCyDUdAAAAADoND9gcnaSNHe1oH4LGERuaOGb3'; 
$secretKey     = '6LeCyDUdAAAAAFdbnDSOqbZmV-aWX-2HPrJb1Upi'; 
 
// Email configuration 
$toEmail = 'crosetsw09@gmail.com'; 
$fromName = 'fastmovies1'; 
$formEmail = 'crosetsw09@gmail.com';  
 
$postData = $statusMsg = $valErr = ''; 
$status = 'error'; 
 
// If the form is submitted 
if(isset($_POST['submit'])){ 
    // Get the submitted form data 
    $postData = $_POST; 
    $name = trim($_POST['name']); 
    $email = trim($_POST['email']); 
    $subject = trim($_POST['subject']); 
    $message = trim($_POST['message']); 
     
    // Validate form fields 
    if(empty($name)){ 
        $valErr .= 'Please enter your name.<br/>'; 
    } 
    if(empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
        $valErr .= 'Please enter a valid email.<br/>'; 
    } 
    if(empty($subject)){ 
        $valErr .= 'Please enter subject.<br/>'; 
    } 
    if(empty($message)){ 
        $valErr .= 'Please enter your message.<br/>'; 
    } 
     
    if(empty($valErr)){ 
         
        // Validate reCAPTCHA box 
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
 
            // Verify the reCAPTCHA response 
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode json data 
            $responseData = json_decode($verifyResponse); 
             
            // If reCAPTCHA response is valid 
            if($responseData->success){ 
 
                // Send email notification to the site admin 
                $subject = 'New contact request submitted'; 
                $htmlContent = " 
                    <h2>Contact Request Details</h2> 
                    <p><b>Name: </b>".$name."</p> 
                    <p><b>Email: </b>".$email."</p> 
                    <p><b>Subject: </b>".$subject."</p> 
                    <p><b>Message: </b>".$message."</p> 
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headers .= 'From:'.$fromName.' <'.$formEmail.'>' . "\r\n"; 
                 
                // Send email 
                @mail($toEmail, $subject, $htmlContent, $headers); 
                 
                $status = 'success'; 
                $statusMsg = 'Thank you! Your contact request has submitted successfully, we will get back to you soon.'; 
                $postData = ''; 
            }else{ 
                $statusMsg = 'Robot verification failed, please try again.'; 
            } 
        }else{ 
            $statusMsg = 'Please check on the reCAPTCHA box.'; 
        } 
    }else{ 
        $statusMsg = '<p>Please fill all the mandatory fields:</p>'.trim($valErr, '<br/>'); 
    } 
}

// Display status message 
echo $statusMsg;
?>

<!-- Google recaptcha API library -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Status message -->
<?php if(!empty($statusMsg)){ ?>
    <div class="status-msg <?php echo $status; ?>"><?php echo $statusMsg; ?></div>
<?php } ?>

<!-- Contact form fields -->
<form action="" method="post" class="cnt-form">
    <div class="form-input">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter your name" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required="">
    </div>
    <div class="form-input">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required="">
    </div>
    <div class="form-input">
        <label for="subject">Subject</label>
        <input type="text" name="subject" placeholder="Enter subject" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" required="">
    </div>
    <div class="form-input">
        <label for="message">Message</label>
        <textarea name="message" placeholder="Type your message here" required=""><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
    </div>
    <div class="form-input">
        <!-- Google reCAPTCHA box -->
        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
    </div>
    <input type="submit" name="submit" class="btn" value="Submit">
</form>

