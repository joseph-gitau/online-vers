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
    <meta name="description" content="Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
	<link rel="canonical" href="https://fastmovies1.com/tvseries/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Download movies - Free latest movies" />
	<meta property="og:description" content="Download the latest hd movies for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others." />
	<meta property="og:url" content="https://www.fastmovies1.com/tvseries/" />
	<meta property="og:site_name" content="Download movies - Free latest movies" />
	<meta property="article:modified_time" content="2021-11-16T22:23:14+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/resources/images/logo.png" />

    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    <meta name="description" content= "Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
    
    <meta name="robots" content="index" />
    <title>Download latest Series</title>
    
    <style>
        body{
            overflow-x: hidden;
        }
        .owl-1,
        .owl-stage-outer {
            width: 100vw;
            height: 40vh;
        }
        .owl-wrapper-outer,
        .owl-wrapper{
            height: 100%;
        }
        .item-n {
            width: 100%;
            height: 50%;
            background-color: indianred;
        }

        .item-n img {
            width: 100%;
            height: auto;
        }

        @media screen and (min-width: 768px) {
            #pagination-content-mob {
                display: none;
            }
        }

        #pagination-content {
            width: 98.7vw;
            height: 230vh;
            margin-top: 10vh;
            background: black;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://fastmovies1.com/resources/images/backt3.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .pagination {
            /* background: skyblue; */
            width: 70vw;
            height: 7vh;
            margin: auto;
            margin-top: 7vh;
            padding-bottom: 5vh;
            padding-top: 2vh;
            list-style: none;
            display: flex;
            flex-direction: row;
        }

        .num-pag,
        .next,
        .prev {
            border: 1px solid #e67e22;
            border-radius: 3px;
            padding: 8px 16px;
            color: #fff;
            margin: 5px;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .pagination li.active a {
            border: 1px solid #e67e22;
            border-radius: 3px;
            padding: 8px 16px;
            color: #fff;
            margin: 5px;
            font-size: 1.1rem;
            font-weight: bold;
            background-color: #e67e22;
        }

        .pagpage {
            width: 20vw;
            margin: auto;
            margin-top: 2vh;
        }

        .total-movies {
            font-size: 1.3rem;
            margin-left: 30%;
            padding-top: 2%;
        }

        /* ---------------------------------td,tr,table-------------------------- */
        table {
            margin-left: 7vw;
        }

        td {
            width: 17vw;
            height: 45vh;
            /* background-color: aquamarine; */
            position: relative;
        }

        td img {
            width: 80%;  
            height: 80%;
            margin-left: 10%;
            border: 3px solid #fff;
            border-radius: 5px;

        }

        .table-condensed img:hover {
            opacity: 0.6;
            cursor: pointer;
            border: 3px solid #e67e22;
            transition: .35s ease-in-out;
        }

        .genre {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 1.8em;
            font-weight: 550;
            opacity: 0;
        }

        .btn {
            position: absolute;
            top: 50%;
            left: 25%;
            border: 1px solid #e67e22;
            border-radius: 50px;
            padding: 5px 8px;
            background-color: #e67e22;
            color: #fff;
            font-size: 1.1rem;
            opacity: 0;
            text-decoration: none;
        }

        td:hover .genre {
            opacity: 1;
            transition: .35s ease-in-out;
        }

        td:hover .btn {
            opacity: 1;
            transition: .35s ease-in-out;
        }

        h4 {
            margin: 5px 10%;
            color: #fff;
        }

        .date {
            margin: 5px 10%;
            color: gray;
        }

        .inline-go {
            margin: 4vh 5vw;
            /* color: black; */
        }
        .inline-go input:focus{
            background-color: black;
        }
        .inline-go input,
        .inline-go button {
            color: #fff;
            padding: 2px 4px;
            font-size: 1.2em;
        }

        .inline-go button {
            border: 1px solid #e67e22;
            border-radius: 5px;
            background-color: #e67e22;
            color: #fff;
        }

        .inline-go button:hover {
            background-color: #cf6d17;
            transition: .35s ease-out;
        }

        @media screen and (max-width: 767px) {
            #pagination-content {
                display: none;
            }

            #pagination-content-mob,
            .pagination-numbers-mob {
                width: 100vw;
            }

            .pagination {
                width: 100vw;
            }

            .num-pag,
            .next,
            .prev {
                padding: 4px 6px;
            }

            .pagination li.active a {
                padding: 4px 8px;
            }

            .pagpage {
                width: 80vw;
            }

            table {
                width: 100vw;
                margin: 0;
            }

            .genre {
                font-size: 1.2em;
            }

            td {
                width: 50vw;

            }
            .btn {
                left: 15%;
                border-radius: 40px;
                padding: 3px 4px;
                font-size: 1rem;
            }
            /* .tdview a .btn{
                position: relative;
                opacity: 1;
                left: 12%
            } */

            .tdview {
                margin: 10vh 0;
            }

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
        <div class="row">
            <div style="color: #e67e22; margin-top: 50px; margin-bottom: 30px;">
                <center><h1>Fastmovies1</h1></center>
            </div>
            <div class="index-des">
                <p>
                    Download the latest HD tv series for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others.
                </p>
            </div>
        </div>
    </div>
    <!--<div class="owl-carousel owl-theme owl-1">
        <?php
            $sqcar = "SELECT * FROM upcomingseries";
            $resultcar = mysqli_query($conn, $sqcar);
            while($rowcar = mysqli_fetch_array($resultcar)) {
                echo '
                <div class="item-n"><img src="resources/upcoming-series-images/'.$rowcar['img_src'].'" alt="baby_driver"></div>
                ';
            }
        ?>
        <div class="item"><img src="images/baby_driver.jpg" alt="baby_driver"></div>
        <div class="item"><img src="images/blade_runner.jpg" alt="blade_runner"></div>
        <div class="item"><img src="images/deadpol_1.jfif" alt="deadpol_1"></div>
        <div class="item"><img src="images/drishyam_2.jpg" alt="drishyam_2"></div>
        <div class="item"><img src="images/guardians_of_the_galaxy_vol_2.jfif" alt="guardians_of_the_galaxy_vol_2"></div>
        <div class="item"><img src="images/inception.jfif" alt="inception"></div>
        <div class="item"><img src="images/joker.jfif" alt="joker"></div>
         <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div>
        <div class="item"><img src="images/baby_driver.jpg" alt="ret"></div> 
    </div>-->


    <!-- ----------------------------------------------------------------------------- -->
    <section id="pagination-content">
        <div class="pagination-numbers">

            <?php
            include('dbhs.php');


            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 20;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";



            $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `series`");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1
            ?>
            <?php
            include('dbhs.php');

            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 20;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";



            $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `series`");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1



            $result = mysqli_query($conn, "SELECT * FROM `series` ORDER BY `a_id` DESC LIMIT $offset, $total_records_per_page ");
            echo "<div class='container'>
    <br>
    <div>
    <center><h1 style='color: #fff;'>Download latest series for free</h1></center>
    <table class=' table-condensed table-bordered'> <tr>
    ";
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
                $oldname = $row['s_name'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                echo "
        <td class='tdview' data-aos='zoom-in' data-aos-offset='-60'>  
                   
        <img class='tdimg1' src='seriesImages/".$row['s_img']."' alt='", $row['s_name'], "'>
        <span class='genre'>", $row['genre'], "</span>
        <a href='https://fastmovies1.com/series/", $row['a_id'], "-", $newname, "' style='cursor: pointer;'>
            <button type='button' class='btn'>view details</button>
        </a>
        <h4>", $row['s_name'], "</h4>
        <span class='date'>", $row['realese_yr'], "</span>
                  
    </td>
      ";
                //Display images in rows of 3

                if ($i % 5 == 0) {
                    echo "<tr></tr>";
                }
                //Increase counter by 1
                $i++;
                //Check to see rather u need to move to new row
                if (($i % 5 == 0)) {
                }
            }
            echo "</tr>";
            echo "</table>";
            mysqli_close($conn);
            ?>




            <ul class="pagination">
                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
                ?>

                <li <?php if ($page_no <= 1) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no > 1) {
                            echo "href='?page_no=$previous_page'";
                        } ?> class='prev'>Previous</a>
                </li>


                <?php
                if ($total_no_of_pages <= 10) {
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active' ><a class='num-pag'>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                        }
                    }
                } elseif ($total_no_of_pages > 10) {

                    if ($page_no <= 4) {
                        for ($counter = 1; $counter < 8; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                            }
                        }
                        echo "<li><a class='num-pag'>...</a></li>";
                        echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>";
                    } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                        echo "<li><a href='?page_no=1' class='num-pag'>1</a></li>";
                        echo "<li><a href='?page_no=2' class='num-pag'>2</a></li>";
                        echo "<li><a class='num-pag'>...</a></li>";
                        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                            }
                        }
                        echo "<li><a class='num-pag'>...</a></li>";
                        echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>";
                    } else {
                        echo "<li><a href='?page_no=1' class='num-pag'>1</a></li>";
                        echo "<li><a href='?page_no=2' class='num-pag'>2</a></li>";
                        echo "<li><a class='num-pag'>...</a></li>";

                        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                            }
                        }
                    }
                }
                ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                            echo "href='?page_no=$next_page'";
                        } ?> class='next'>Next</a>
                </li>
                <?php if ($page_no < $total_no_of_pages) {
                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
            </ul>
        </div>
    </section>
    <div class="tv-adbot">
        <script async="async" data-cfasync="false" src="//argondenial.com/572fcecf63bd4b77a425cb92789722f3/invoke.js"></script>
<div id="container-572fcecf63bd4b77a425cb92789722f3"></div>
    </div>
    <!-- --------------------------mobile------------------------------- -->


    <section id="pagination-content-mob">
        <div class="pagination-numbers-mob">

            <?php

            include('dbhs.php');

            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 10;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";



            $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `series`");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1
            ?>
            <div class="pagpage">
                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>

            </div>




            <?php
            include('dbhs.php');

            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            $total_records_per_page = 10;
            $offset = ($page_no - 1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";



            $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `series`");
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total page minus 1



            $result = mysqli_query($conn, "SELECT * FROM `series` ORDER BY `a_id` DESC LIMIT $offset, $total_records_per_page");
            echo "<div class='container'>
                <br>
                <div>
                <table class=' table-condensed table-bordered'> <tr>
                ";
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
                $oldname = $row['s_name'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                echo "
                    <td class='tdview' data-aos='zoom-in' data-aos-offset='-30'>  
                   
                    <img class='tdimg1' src='seriesImages/", $row['s_img'], "' alt='ret'>
                    <span class='genre'>", $row['s_name'], "</span>
                    <a href='./series/", $row['a_id'], "-", $newname, "' style='cursor: pointer;'>
                        <button type='button' class='btn'>view details</button>
                    </a>
                    <h4>", $row['s_name'], "</h4>
                    <span class='date'>", $row['realese_yr'], "</span>
                              
                </td>
                  ";
                //Display images in rows of 3

                if ($i % 2 == 0) {
                    echo "<tr></tr>";
                }
                //Increase counter by 1
                $i++;
                //Check to see rather u need to move to new row
                if (($i % 2 == 0)) {
                }
            }
            echo "</tr>";
            echo "</table>";
            mysqli_close($conn);
            ?>




            <ul class="pagination">
                <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
                ?>

                <li <?php if ($page_no <= 1) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no > 1) {
                            echo "href='?page_no=$previous_page'";
                        } ?> class='prev'>Prev</a>
                </li>


                <?php
                if ($total_no_of_pages <= 4) {
                    for ($counter = 1; $counter <= $total_no_of_pages-1; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active' ><a class='num-pag'>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                        }
                    }
                } elseif ($total_no_of_pages > 4) {
                    echo "<li><a class='num-pag'>";
                    echo $page_no . " of " . $total_no_of_pages;
                    echo "</a></li>";
                }
                ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                        echo "class='disabled'";
                    } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                            echo "href='?page_no=$next_page'";
                        } ?> class='next'>Next</a>
                </li>
                <?php if ($page_no < $total_no_of_pages) {
                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>Last &rsaquo;&rsaquo;</a></li>";
                } ?>
            </ul>
            <div class="inline-go">
                <input type="number" id="page-go" min="1" max="<?php echo $total_no_of_pages; ?>" placeholder="<?php echo $page_no . '/' . $total_no_of_pages; ?>" required>
                <button onclick="go2Page();">Go</button>
            </div>
        </div>
    </section>
    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>
    <script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
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
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
        /* $('.owl-carousel').owlCarousel({
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
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        }) */

        function go2Page() {
            var page = document.getElementById("page-go").value;
            page = ((page > <?php echo $total_no_of_pages; ?>) ? <?php echo $total_no_of_pages; ?> : ((page < 1) ? 1 : page));
            window.location.href = 'https://fastmovies1.com/tvseries.php?page_no=' + page;
        }

        function search() {
            location.href = 'movies/' + document.getElementById('search_query').value.
            replace(' ', '+');
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
          <script type='text/javascript' src='//argondenial.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script>

   
</body>

</html>