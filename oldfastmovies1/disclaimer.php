<html>

<head>
    <?php
        include "partials/head.php";
    ?>
    <meta name="keywords" content="download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <meta name="description" content="Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
	<link rel="canonical" href="https://fastmovies1.com/disclaimer/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Download movies - Free latest movies" />
	<meta property="og:description" content="Download the latest hd movies for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others." />
	<meta property="og:url" content="https://www.fastmovies1.com/disclaimer/" />
	<meta property="og:site_name" content="Download movies - Free latest movies" />
	<meta property="article:modified_time" content="2021-11-16T22:23:14+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/resources/images/logo.png" />

    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    <meta name="description" content= "Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
    
    <meta name="robots" content="index" />
    <title>Browse latest movies</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    
    <style>
        .container{
            width: 80%;
            height: 70vh;
            margin: auto;
            padding-top: 3vh;
        }
    </style>
</head>

<body>
    <?php
        include "partials/header.html";
        
        include "dbh.php";
        $ip = $_SERVER['REMOTE_ADDR'];
        $sqlp = "SELECT * FROM address WHERE ip = '$ip'";
        $resultp = mysqli_query($conn, $sqlp);
        $totp = mysqli_num_rows($resultp);
        if ($totp > 0) {
            echo '';
        } else {
            $sqlp2 = "INSERT INTO `address` (ip, time_Set) VALUES ('$ip', now())";
            $resultp2 = mysqli_query($conn, $sqlp2);
            if ($resultp2) {
                // echo 'Success';
                include 'popup.html';
            } else {
                echo 'Failed' . mysqli_error($conn);
            }
        }
    ?>

    <div class="container">
        <h1>Disclaimer: </h1>
        <p>
            Fastmovies1.com does not host any files on it's servers. 
            All files or contents in the website are hosted on third party websites.This 
            site does not accept responsibility for contents hosted on third party websites. 
            Fastmovies1.com just indexes those links which are already available in internet.
            
        </p>
        
    </div>
    


    

    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>

    
</body>

</html>