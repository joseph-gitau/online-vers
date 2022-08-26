<?php
include 'dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include "partials/head.php";
    ?>
    <meta name="keywords" content="download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <meta name="description" content="Fastmovies - recently added, The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
	<link rel="canonical" href="https://fastmovies1.com/Latest/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Download movies - Free latest movies" />
	<meta property="og:description" content="Download the latest hd movies for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others." />
	<meta property="og:url" content="https://www.fastmovies1.com/trending/" />
	<meta property="og:site_name" content="Download movies - Free latest movies" />
	<meta property="article:modified_time" content="2021-11-16T22:23:14+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/resources/images/logo.png" />

    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    
    <meta name="robots" content="index" />
    <title>Recently added - Free Movies Download</title>
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
    <div class="container trending">
        <center class="headrec">
            <h1>Recently added</h1>
        </center>

        <div class="row">
            <div class=" movies">
                <h2>recently added movies</h2>
                <?php
                $sq = "SELECT * FROM recentmovies ORDER BY a_id DESC LIMIT 40";
                $res = mysqli_query($conn, $sq);
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '
                        <div class="moviesr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z" />
                        </svg>
                        <span class="mitems">' . $row['movie_name'] . '</span>&nbsp;&nbsp;
                        <span class="mdate">' . $row['realese_yr'] . '</span>
                        </div>
                        ';
                }
                ?>
                <!-- <div class="moviesr">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z" />
                    </svg>
                    <span class="mitems">movie name</span>
                    <span class="mdate">movie date</span>
                </div> -->

            </div>
            <hr class="divide">
            <div class="series">
                <h2>Recently added series</h2>
                <?php
                $sql = "SELECT * FROM recentseries ORDER BY a_id DESC LIMIT 40";
                $resql = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($resql)) {
                    echo '
                        <div class="seriesr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 24 24">
                        <path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z" />
                        </svg>
                        <span class="sname">'.$rows['series_name'].'</span>&nbsp;
                        <span class="sname">'.$rows['episode'].'</span>&nbsp;
                        <span class="seasonname">'.$rows['season_episode'].'</span>&nbsp;&nbsp;
                        <span class="rsdate">'.$rows['date_yr'].'</span>
                        </div>
                    ';
                }
                ?>
                <!-- <div class="seriesr">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.024 4h6.015l7.961 8-7.961 8h-6.015l7.961-8-7.961-8zm-10.024 16h6.015l7.961-8-7.961-8h-6.015l7.961 8-7.961 8z" />
                    </svg>
                    <span class="sname">series name</span>
                    <span class="seasonname">download season</span>
                    <span class="rsdate">realese date</span>
                </div> -->


            </div>
        </div>
    </div>
    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>
</body>

</html>