<?php
    if(isset($_POST['send'])) {
        $link = $_POST['link'];
        $email = $_POST['email'];
        $messageMail = $_POST['message'];
        
        $to = $email;
        $subject = "Fastmovies1.com: Movie link.";
        $txt = "Here's the repaired link you rquested. \n $link. \n
        $messageMail
        ";
        $headers = "contact@fastmovies1.com" . "\r\n" .
        
        $success = mail($to,$subject,$txt,$headers);
        if($success) {
            $message = "Success!";
        } else {
            $message = "Failed!";
        }

    }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Send email</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900">
	<!-- Full-width fluid until the `md` breakpoint, then lock to container -->
	<div class="md:mx-auto md:w-2/4 content-center mt-10 mx-5">
	    
	    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 md:w-3/4" id="success" role="alert">
          <!--<p class="font-bold">Informational message</p>-->
          <p class="text-sm"><?php echo $message; ?></p>
        </div>
		<h2 class="font-medium leading-tight text-4xl mt-0 mb-2 text-blue-600">Reply emails</h2>
	  	<!-- component -->
		<form action="" method="POST" class="w-full max-w-lg">
		  
		  <div class="flex flex-wrap -mx-3 mb-6">
		    <div class="w-full px-3">
		      <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">
		        Link
		      </label>
		      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="text" name="link" placeholder="Link">
		    </div>
		  </div>
		  <div class="flex flex-wrap -mx-3 mb-6">
		    <div class="w-full px-3">
		      <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">
		        E-mail
		      </label>
		      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" name="email" placeholder="Email">
		    </div>
		  </div>
		  <div class="flex flex-wrap -mx-3 mb-6">
		    <div class="w-full px-3">
		      <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-password">
		        Message
		      </label>
		      <textarea class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message" name="message" placeholder="Message"></textarea>
		    </div>
		  </div>
		  <div class="md:flex md:items-center">
		    <div class="md:w-1/3">
		      <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" name="send">
		        Send
		      </button>
		    </div>
		    <div class="md:w-2/3"></div>
		  </div>
		</form>

	</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    
    <script>
        $(document).ready(function (){
            $("#success").delay(5000).fadeOut();
        });
        
    </script>
	
</body>
</html>
  