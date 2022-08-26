<html>

<head>
    <?php
        include "partials/head.php";
    ?>
    <meta name="keywords" content="download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <meta name="description" content="Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
	<link rel="canonical" href="https://fastmovies1.com/browse/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Download movies - Free latest movies" />
	<meta property="og:description" content="Download the latest hd movies for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others." />
	<meta property="og:url" content="https://www.fastmovies1.com/browse/" />
	<meta property="og:site_name" content="Download movies - Free latest movies" />
	<meta property="article:modified_time" content="2021-11-16T22:23:14+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/resources/images/logo.png" />

    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    <meta name="description" content= "Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
    
    <meta name="robots" content="index" />
    <title>Browse latest movies</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</head>

<body style="background-color: rgb(15 23 42);">
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
    <div class="container" style="background-color: rgb(15 23 42);>
        <div class="row">
            <div style="color: #e67e22; padding-top: 50px; padding-bottom: 30px; ">
               <h1><center style="margin-left: 0 !important;";>Fastmovies1</center></h1>
            </div>
            <div class="index-des">
                <p>
                    Download the latest HD movies small size for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and others.
                </p>
            </div>
        </div>
    </div>
    <section id="pagination-content">
        <div class="pagination-numbers">

            <?php

                include('dbh.php');

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



                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `45finished`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1
            ?>
                <div class="pagpage">
                    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                    
                </div>

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

        
            <?php
                include('dbh.php');

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

                

                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `45finished`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1

                

                $result = mysqli_query($conn, "SELECT * FROM `45finished` ORDER BY `a_id` DESC LIMIT $offset, $total_records_per_page ");
                echo"<div class='container'>
                <br>
                <div>
                <table class=' table-condensed table-bordered'> <tr>
                ";
                $i=1;
                while ($row = mysqli_fetch_array($result)) {
                    $oldname = $row['movie_name'];
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    echo "
                  <td data-aos='zoom-in' data-aos-offset='-80'>
                      <img src='", $row['movie_image'], "' alt=", $row['movie_name'],">
                      <span class='genre'>",$row['movie_genre'],"</span>
                      <a href='/movies/",$row['a_id'],"-",$newname,"' style='cursor: pointer;'>
                        <button type='button' class='btn'>view details</button>
                    </a>
                      
                      <h4>", $row['movie_name'], "</h4>
                      <span class='date'>", $row['realese_year'], "</span>
                      
                  </td>
                  ";
                  //Display images in rows of 3
            
                    if($i%5==0) {
                    echo "<tr></tr>";
                    }
                    //Increase counter by 1
                    $i++;
                    //Check to see rather u need to move to new row
                    if(($i%5==0)) {
                
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

                include('dbh.php');

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



                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `45finished`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1
            ?>
                <div class="pagpage">
                    <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                    
                </div>

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
                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
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

                               /*  if ($page_no <= 3) {
                                    for ($counter = 1; $counter < 4; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    // echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>";
                                } elseif ($page_no > 2 && $page_no < $total_no_of_pages - 1) {
                                    echo "<li><a href='?page_no=1' class='num-pag'>1</a></li>";
                                    // echo "<li><a href='?page_no=2' class='num-pag'>2</a></li>";
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                        if ($counter == $page_no) {
                                            // echo "<li><a class='num-pag'>...</a></li>";

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
                                   

                                    for ($counter = $total_no_of_pages - 1; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                } */
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
                        <input type="number" id="page-go" min="1" max="<?php echo $total_no_of_pages; ?>" placeholder="<?php echo $page_no. '/' .$total_no_of_pages; ?>" required>
                        <button onclick="go2Page();">Go</button>
                    </div>

        
            <?php
                include('dbh.php');

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

                

                $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM `45finished`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total page minus 1

                

                $result = mysqli_query($conn, "SELECT * FROM `45finished` ORDER BY `a_id` DESC LIMIT $offset, $total_records_per_page");
                echo"<div class='container'>
                <br>
                <div>
                <table class=' table-condensed table-bordered'> <tr>
                ";
                $i=1;
                while ($row = mysqli_fetch_array($result)) {
                    $oldnamem = $row['movie_name'];
                    $newnamem = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldnamem);
                    echo "
                  <td class='tdview' data-aos='zoom-in' data-aos-offset='-40'>
                      <img src='", $row['movie_image'], "' alt=", $row['movie_name'],">
                      <span class='genre'>",$row['movie_genre'],"</span>
                      
                      <h4>", $row['movie_name'], "</h4>
                      <span class='date'>", $row['realese_year'], "</span>
                      
                      <a href='/movies/",$row['a_id'],"-",$newnamem,"' style='cursor: pointer;'>
                        <button type='button' class='btn'>Download</button>
                    </a>
                  </td>
                  ";
                  //Display images in rows of 3
            
                    if($i%2==0) {
                    echo "<tr></tr>";
                    }
                    //Increase counter by 1
                    $i++;
                    //Check to see rather u need to move to new row
                    if(($i%2==0)) {
                
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
                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
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

                               /*  if ($page_no <= 3) {
                                    for ($counter = 1; $counter < 4; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    // echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>";
                                } elseif ($page_no > 2 && $page_no < $total_no_of_pages - 1) {
                                    echo "<li><a href='?page_no=1' class='num-pag'>1</a></li>";
                                    // echo "<li><a href='?page_no=2' class='num-pag'>2</a></li>";
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                        if ($counter == $page_no) {
                                            // echo "<li><a class='num-pag'>...</a></li>";

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
                                   

                                    for ($counter = $total_no_of_pages - 1; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                } */
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
                <input type="number" id="page-go" min="1" max="<?php echo $total_no_of_pages; ?>" placeholder="<?php echo $page_no. '/' .$total_no_of_pages; ?>" required>
                <button onclick="go2Page();">Go</button>
            </div>
    </div>
    </section>

    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>

    <script>
        function go2Page() {
        var page = document.getElementById("page-go").value;
            page = ((page><?php echo $total_no_of_pages; ?>)?<?php echo $total_no_of_pages; ?>:((page<1)?1:page));  
            window.location.href = 'https://fastmovies1.com/browse.php?page_no='+page;   
        }
        function search()
        {
        location.href = 'movies/'+document.getElementById('search_query').value.
        replace(' ','+');
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
          <script type='text/javascript' src='//argondenial.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script>

</body>

</html>