<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KKHER6ELWS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KKHER6ELWS');
</script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
     crossorigin="anonymous"></script>
    <?php
        include "partials/head.php";
    ?>
    <meta name="keywords" content="download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <meta name="description" content="Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
	<link rel="canonical" href="https://fastmovies1.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Download movies - Free latest movies" />
	<meta property="og:description" content="Download the latest hd movies for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others." />
	<meta property="og:url" content="https://www.fastmovies1.com/" />
	<meta property="og:site_name" content="Download movies - Free latest movies" />
	<meta property="article:modified_time" content="2021-11-16T22:23:14+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/resources/images/logo.png" />

    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    
    <meta name="robots" content="index" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Free Movies Download</title>

</head>
<body >
    <!--<div id="babasbmsgx" style="visibility: visible !important;">Please disable your adblock and script blockers to view this page</div>-->
    <?php
        include "partials/header.html";
        
        include "dbh.php";
        // echo '<div style="width: 100vw; height: 100vh;">';
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
        // echo '</div>';
    ?>
    <div class="container" style="background-color: rgb(15 23 42);">
        <div class="row">
            <div style="color: #e67e22; margin-top: 50px; margin-bottom: 30px;">
                <center><h1>Fastmovies1</h1></center>
            </div>
            <div class="index-des">
                <p>
                     Welcome to Fastmovies1.com. Download the latest movies and series with different qualities: 480p, 720p, 1080p and 4k for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others.
                </p>
            </div>
        </div>
    </div>
    <section id="homepage1" class="container-fluid">

        
        <div class="popular-down-head">
            <div class="pop1">
                <!-- <i class="bi bi-star-fill"></i> -->
                <i class="fas fa-star"></i>
                <span>popular downloads</span>
            </div>
            <h5>Request a movie <a href="contact">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $sq = "SELECT * FROM 45finished";
        $resql=mysqli_query($conn,$sq);
        $rowcount=mysqli_num_rows($resql);
        $rowofset = $rowcount-12;
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 12";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname = $row['movie_name'];
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            
        echo"
        <td data-aos='zoom-in' data-aos-offset='-70'> 
                   
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                 
        ";
         //Display images in rows of 3
            
         if($i%4==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
        // echo $rowcount;
        // echo $rowoff;
        ?>
        
    </section>
    <div class="adbot">
        <center>
            <script type="text/javascript">
	atOptions = {
		'key' : '581bc201a057d32e8fe24be7b7546951',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/581bc201a057d32e8fe24be7b7546951/invoke.js"></scr' + 'ipt>');
</script>
        </center>
    </div>
    
    <!----------------------latest realeses--------------------------->
    <section id="homepage2">
    <div class="popular-down-head">
            <div class="pop1">
                <i class="bi bi-star-fill"></i>
                <span>Latest downloads</span>
            </div>
            <h5>Request a movie <a href="contact">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 8 OFFSET 12";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname1 = $row['movie_name'];
            $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                    
        echo"
        <td data-aos='zoom-in' data-aos-offset='-70'>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname1,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                
        ";
         //Display images in rows of 3
            
         if($i%4==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
        
    </section>
    <div class="adbot">
        <center>
            <script type="text/javascript">
	atOptions = {
		'key' : '581bc201a057d32e8fe24be7b7546951',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/581bc201a057d32e8fe24be7b7546951/invoke.js"></scr' + 'ipt>');
</script>
        </center>
    </div>
    <!-- -------------------------upcoming movies----------------- -->
    <section id="homepage3">
    <div class="popular-down-head">
            <div class="pop1">
                <i class="bi bi-star-fill"></i>
                <span>Upcoming Movies</span>
            </div>
            <h5>Request a movie <a href="contact">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 4 OFFSET 20";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname2 = $row['movie_name'];
            $newname2 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname2);
        echo"
        <td data-aos='zoom-in' data-aos-offset='-70'>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname2,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                
        ";
         //Display images in rows of 3
            
         if($i%4==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>
    <!-- ------------------------------mobile staff--------------------------------------------------------- -->
    
    <section id="mobile-homepage1">
        <div class="popular-down-head-mob">
            <div class="pop1-mob">
                <i class="bi bi-star-fill"></i>
                <span>popular downloads</span>
            </div>
            <h5><a href="contact">More</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 4";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname3 = $row['movie_name'];
            $newname3 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname3);
        echo"
        <td data-aos='zoom-in' data-aos-offset='-30'>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname3,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                
        ";
         //Display images in rows of 3
            
         if($i%2==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>
    <div class="adbot2">
        
            <script type="text/javascript">
	atOptions = {
		'key' : '80929bfa57b692636b75c01451758d40',
		'format' : 'iframe',
		'height' : 50,
		'width' : 320,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/80929bfa57b692636b75c01451758d40/invoke.js"></scr' + 'ipt>');
</script>
        
    </div>
    <!-- --------------------------------------mob2----------------------------------------------------- -->
    <section id="mobile-homepage2">
        <div class="popular-down-head-mob">
            <div class="pop1-mob">
                <i class="bi bi-star-fill"></i>
                <span>latest realeses</span>
            </div>
            <h5><a href="contact">More</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 8 OFFSET 4";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname4 = $row['movie_name'];
            $newname4 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname4);
        echo"
        <td data-aos='zoom-in' data-aos-offset='-30'>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname4,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                
        ";
         //Display images in rows of 3
            
         if($i%2==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>
    <div class="adbot2">
        
            <script type="text/javascript">
	atOptions = {
		'key' : '80929bfa57b692636b75c01451758d40',
		'format' : 'iframe',
		'height' : 50,
		'width' : 320,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/80929bfa57b692636b75c01451758d40/invoke.js"></scr' + 'ipt>');
</script>
        
    </div>
    <!-- --------------------------------------mob3----------------------------------------------------- -->
    <section id="mobile-homepage3">
        <div class="popular-down-head-mob">
            <div class="pop1-mob">
                <i class="bi bi-star-fill"></i>
                <span>upcoming movies</span>
            </div>
            <!-- <h5><a href="contact">More</a></h5> -->
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished ORDER BY `a_id` DESC LIMIT 2 OFFSET 12";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $oldname5 = $row['movie_name'];
            $newname5 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname5);
        echo"
        <td data-aos='zoom-in' data-aos-offset='-30'>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt=", $row['movie_name'],">
            <span class='genre'>",$row['movie_genre'],"</span>
            <a href='/movies/",$row['a_id'],"-",$newname5,"' style='cursor: pointer;'>
                <button type='button' class='btn'>view details</button>
            </a>
            <h4>", $row['movie_name'], "</h4>
            <span class='date'>", $row['realese_year'], "</span>
                      
        </td>
                
        ";
         //Display images in rows of 3
            
         if($i%2==0) {
            echo "<tr></tr>";
            }
            //Increase counter by 1
            $i++;
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>

    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>
    
  <!--social axd  -->
  <script type='text/javascript' src='//argondenial.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>  
    
</body>
</html>