<?php
include 'dbhs.php';                
$searchraw1m = mysqli_real_escape_string($conn, $_GET['details']);
$movieidm = strstr($searchraw1m, '-', true);
$sqllgm = "SELECT * FROM series WHERE a_id='$movieidm'";
$resultlgm = mysqli_query($conn, $sqllgm);
$rowlgm = mysqli_fetch_assoc($resultlgm);
$metades = $rowlgm['s_name'];
$des = $rowlgm['details'];
$mi = $rowlgm['s_img'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include "../partials/head.php";
    ?>
    <meta name="description" content="<?php echo $des; ?>" />
    <meta name="keywords" content="Index of <?php echo $metades; ?> free dowmload, download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <link rel="canonical" href="https://www.fastmovies1.com/series/<?php echo $searchraw1m;?>/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Index of <?php echo $metades; ?>" />
	<meta property="og:description" content="<?php echo $des; ?>" />
	<meta property="og:url" content="https://www.fastmovies1.com/series/<?php echo $searchraw1m;?>/" />
	<meta property="og:site_name" content="Download latest movies - Free download new movies" />
	<meta property="article:published_time" content="2021-11-15T07:08:00+00:00" />
	<meta property="article:modified_time" content="2021-11-20T07:09:30+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/seriesImages/<?php echo $mi; ?>" />
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.3-web/css/all.min.css">
    
    <title><?php echo $metades; ?> | Fast Movies Download</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

</head>

<body style="background-color: #2b2b29;">
    <?php
        include "../partials/header.html";
        
        include "../dbh.php";
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
                include '../popup.html';
            } else {
                echo 'Failed' . mysqli_error($conn);
            }
        }
    ?>
    <div class="containerfi">
        <div class="row">

            <div class="col span-4-of-6 main-right">
                <?php
                $searchraw1 = mysqli_real_escape_string($conn, $_GET['details']);
                $movieid = strstr($searchraw1, '-', true);
                $sqllg = "SELECT * FROM series WHERE a_id='$movieid'";
                $resultlg = mysqli_query($conn, $sqllg);
                while ($rowlg = mysqli_fetch_array($resultlg)) {
                    $lgimg = $rowlg['large_img'];
                }
                ?>
                <img src="../large-imgs/<?php echo "$lgimg"; ?>" alt="ret">
                <div class="row">
                    <!-- <div class="col span-4-of-6"> -->
                    <div class="series-info">
                        <?php
                        $searchraw0 = mysqli_real_escape_string($conn, $_GET['details']);
                        $movieid = strstr($searchraw0, '-', true);
                        // echo $movieid;
                        $sqn = "SELECT * FROM series WHERE a_id='$movieid'";
                        $resultn = mysqli_query($conn, $sqn);
                        while ($row = mysqli_fetch_array($resultn)) {
                            $s_name = $row['s_name'];
                            $details = $row['details'];
                            $genre = $row['genre'];
                            $rating = $row['rating'];
                            $yr = $row['realese_yr'];
                        }
                        ?>
                        <h1 class="mov-header"><?php echo $s_name; ?></h1>
                        <div class="minfo">
                            <span class="mov-genre"><?php echo $genre; ?></span><br>
                            <span class="mov-rating">Rating: <?php echo $rating; ?></span><br><br>
                            <span class="mov-rating">Release Year: <?php echo $yr; ?></span>
                        </div>


                        <h3 style="padding-top: 30px;">Synopsis</h3>
                        <p class="description-s"><?php echo $details; ?></p>

                    </div>
                    <!-- </div> -->

                </div>
                <div class="join-telegram" style="width: 60%; height: 100px; margin: auto; margin-bottom: 30px;">
                    <a href="https://t.me/fastmovies11" target="_blank"><img src="/resources/images/telegram.jpg" alt="telegram"></a>
                </div>
                <!-- new------------- -->
                <?php
                if (isset($_GET['details'])) {

                    $searchraw = mysqli_real_escape_string($conn, $_GET['details']);
                    $search = strstr($searchraw, '-', true);
                    // $namesearch = mysqli_real_escape_string($conn, $_GET['names']);
                    $query = "SELECT * FROM seriesons WHERE parent_id = '$search' ORDER BY `season` DESC";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="row series-items">
                            
                            <button class="accordion"><?php echo $row['season']; ?> </button>
                            <div class="panel">
                                <?php $ret = $row['season'];?>

                                <?php
                                $query1 = "SELECT * FROM seriesdetails WHERE `parent_id`='$search' AND `s_season`='$ret' ORDER BY `s_episode` ASC";
                                $result1 = mysqli_query($conn, $query1);
                                while ($row1 = mysqli_fetch_array($result1)) {
                                ?>
                                    <div class="menu-item__sub">
                                        <span><?php echo $row1['s_episode']; ?></span>
                                        <?php 
                                            // nw
                                            // $p4320 = $row1['4320p']; 
                                            // if (empty($p4320)) {
                                            //     echo '';
                                            // } else {
                                            //     echo "<a href='".$p4320."' class='download-linkss'>4320p</a>";
                                            // }
                                            // // nw
                                            // $p2160 = $row1['2160p']; 
                                            // if (empty($p2160)) {
                                            //     echo '';
                                            // } else {
                                            //     echo "<a href='".$p2160."' class='download-linkss'>2160p</a>";
                                            // }
                                            // // nw
                                            // $p1440 = $row1['1440p']; 
                                            // if (empty($p1440)) {
                                            //     echo '';
                                            // } else {
                                            //     echo "<a href='".$p1440."' class='download-linkss'>1440p</a>";
                                            // }
                                            // nw
                                            $p1080 = $row1['1080p']; 
                                            if (empty($p1080)) {
                                                echo '';
                                            } else {
                                                echo "<a href='".$p1080."' class='download-linkss'>1080p</a>";
                                            }
                                            // nw
                                            $p720 = $row1['720p']; 
                                            if (empty($p720)) {
                                                echo '';
                                            } else {
                                                echo "<a href='".$p720."' class='download-linkss'>720p</a>";
                                            }
                                            // nw
                                            $p480 = $row1['480p']; 
                                            if (empty($p480)) {
                                                echo '';
                                            } else {
                                                echo "<a href='".$p480."' class='download-linkss'>480p</a>";
                                            }
                                            
                                            // check to display initial download btn
                                            if (empty($p480) && empty($p720) && empty($p1080)) {
                                                echo "<a href='".$row1['down_link']."' class='download-linkss'>Download</a>";
                                            } else {
                                                echo "";
                                            }
                                        ?>
                                        <!--<a href="#"> test</a>-->
                                        
                                    </div>
                                <?php } ?>



                            </div>
                            

                        </div>

                    <?php } ?>
                <?php } ?>
                              

            </div>
            <!-- ---------------------------courosel----------------------------------------- -->
            <div class="col span-2-of-6">
                <div class="owl-carousel owl-theme np2">
                <?php
                    $sqcar = "SELECT * FROM series where rating='8.1' ORDER BY a_id DESC LIMIT 10";
                    $resultcar = mysqli_query($conn, $sqcar);
                    while($rowcar = mysqli_fetch_array($resultcar)) {
                        echo '
                            <div class="item-s">
                            <center>
                            <h3>'.$rowcar['s_name'].'</h3>
                            </center>
                            <img src="../large-imgs/'.$rowcar['large_img'].'" alt="ret">
                            </div>
                        ';
                    }
                ?>
                    <!--<div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>
                    <div class="item">
                        <center>
                            <h3>Movie name</h3>
                        </center>
                        <img src="../seriesImages/loki.jpg" alt="ret">
                    </div>-->
                </div>
                <!-- meh similar seies-->
                <div class="row similar-series">
                    <h2 class="pop-series">Popular series</h2>
                    <div class="col span-3-of-6">
                        <?php
                        include "dbhs.php";
                        $sqlsim1 = "SELECT * FROM series ORDER BY a_id DESC LIMIT 3";
                        $resultsim = mysqli_query($conn, $sqlsim1);
                        while ($rowsim = mysqli_fetch_array($resultsim)) {
                            $oldname = $rowsim['s_name'];
                            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                            echo "
                                    <div class='sim-series1'>
                                    <div class='sim-series'>
                                    <a href='/series/", $rowsim['a_id'], "-", $newname, "' style='cursor: pointer;'>
                                    <img src='../seriesImages/" . $rowsim['s_img'] . "' alt='ret'>
                                    </a>
                                    </div>
                                    <span class='similarm-name'>".$oldname."</span>
                                    </div>
                                    ";
                        }
                        ?>

                    </div>
                    <div class="col span-3-of-6">
                        <?php
                        include "dbhs.php";
                        $sqlsim1 = "SELECT * FROM series ORDER BY a_id DESC LIMIT 3 OFFSET 3";
                        $resultsim = mysqli_query($conn, $sqlsim1);
                        while ($rowsim = mysqli_fetch_array($resultsim)) {
                            $oldname1 = $rowsim['s_name'];
                            $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                            echo "
                                    <div class='sim-series1'>
                                    <div class='sim-series'>
                                    <a href='/series/", $rowsim['a_id'], "-", $newname1, "' style='cursor: pointer;'>
                                    <img src='../seriesImages/" . $rowsim['s_img'] . "' alt='ret'>
                                    </a>
                                    </div>
                                    <span class='similarm-name'>".$oldname1."</span>
                                    </div>
                                    ";
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <!--disqus-->
        <div class="disqus-ser">
            <div class="disqus-comments1"><div id="disqus_thread"></div></div>
        </div>
        
    </div>
    <?php
        include '../partials/footer.html';
        include '../partials/footer-scripts.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

        $('.np2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
        
    </script>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
    
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://fastmovies1-com.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    

</body>

</html>