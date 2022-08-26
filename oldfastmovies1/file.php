<?php
include 'header.php';
?>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content= "Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
    <meta name="robots" content= "index, follow">
    <title></title>
    <link rel="stylesheet" href="css/boootstrap.min.css">
    <style>
        @media  screen and (min-width: 768px) {
            #pagination-content-mobile{
                display: none;
            }
        }
        #pagination-content{
            width: 98.7vw;
            height: 240vh;
            background: black;
        }
        .pagination{
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
        .prev{
            border: 1px solid #e67e22;
            border-radius: 3px;
            padding: 8px 16px;
            color: #fff;
            margin: 5px;
            font-size: 1.1rem;
            font-weight:bold;
        }
        .pagination li.active a{
            border: 1px solid #e67e22;
            border-radius: 3px;
            padding: 8px 16px;
            color: #fff;
            margin: 5px;
            font-size: 1.1rem;
            font-weight:bold;
            background-color: #e67e22;
        }
        .pagpage{
            width: 20vw;
            margin: auto;
            margin-top: 2vh;
        }
        .total-movies{
            font-size: 1.3rem;
            margin-left: 30%;
            padding-top: 2%;
        }
        /* ---------------------------------td,tr,table-------------------------- */
        table{
            margin-left: 7vw;
        }
        td{
            width: 17vw;
            height: 45vh;
            /* background-color: aquamarine; */
            position: relative;
        }
        td img{
            width: 80%;
            height: 80%;
            margin-left: 10%;
            border: 3px solid #fff;
            border-radius: 5px;
            
        }
        .table-condensed img:hover{
            opacity: 0.6;
            cursor: pointer;
            border: 3px solid #e67e22;
            transition: .35s ease-in-out;
        }
        .genre{
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 1.8em;
            font-weight: 550;
            opacity: 0;
        }
        .btn{
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
        td:hover .genre{
           opacity: 1;
           transition: .35s ease-in-out;
        }
        td:hover .btn{
           opacity: 1;
           transition: .35s ease-in-out;
        }
        h4{
            margin: 5px 10%;
            color: #fff;
        }
        .date{
            margin: 5px 10%;
            color: gray;
        }
        @media  screen and (max-width: 767px) {
            #pagination-content{
                display: none;
            }
            #pagination-content-mob,
            .pagination-numbers-mob{
                width: 100vw;
            }
            .pagination{
                width: 100vw;
            }
            .num-pag,
            .next,
            .prev{
                padding: 4px 8px;
            }
            .pagination li.active a{
                padding: 4px 8px;
            }
            .pagpage{
                width: 80vw;
            }
            table{
                width: 100vw;
                margin: 0;
            }
           /*  body{
                width: 100vw;
                margin: 0;
            }
            #pagination-content{
                display: none;
            }
            #pagination-content-mob{
                background: black;
                
                width: 100vw;
            }
            table{
                width: 100vw;
                margin: 0;
            }
            .pag-wrapper-mob{
            width: 90vw;
            height: 7vh;
            margin: auto;
            padding-top: 2vh;
            }
            .num-pag-mob,
            .next-mob,
            .prev-mob{
                border: 1px solid #e67e22;
                border-radius: 3px;
                padding: 4px 8px;
                color: #fff;
                margin: 3px;
                font-size: 1.1rem;
                font-weight:bold;
            }
            .pagination-mob a.active{
                border: 1px solid #e67e22;
                border-radius: 3px;
                padding: 4px 8px;
                color: #fff;
                margin: 3px;
                font-size: 1.1rem;
                font-weight:bold;
                background-color: #e67e22;
            } */
            
            
        }
    </style>
</head>

<body>
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
                    <strong>there are <?php echo $total_records ."movies" ?></strong>
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

                

                $result = mysqli_query($conn, "SELECT * FROM `45finished` LIMIT $offset, $total_records_per_page");
                echo"<div class='container'>
                <br>
                <div>
                <table class=' table-condensed table-bordered'> <tr>
                ";
                $i=1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "
                  <td>
                      <img src='", $row['movie_image'], "' alt='ret'>
                      <span class='genre'>",$row['movie_genre'],"</span>
                      <form action='viewDetails2.php?name=",$row['movie_name'],"' method='GET'>
                      <input type='hidden' name='phpVariable' value='",$row['a_id'],"'>
                      <button type='submit' name='submit' class='btn' >view details</button>
                     </form>
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
                    <strong>there are <?php echo $total_records ."movies" ?></strong>
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

                                if ($page_no <= 3) {
                                    for ($counter = 1; $counter < 4; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>";
                                } elseif ($page_no > 3 && $page_no < $total_no_of_pages - 1) {
                                    echo "<li><a href='?page_no=1' class='num-pag'>1</a></li>";
                                    // echo "<li><a href='?page_no=2' class='num-pag'>2</a></li>";
                                    echo "<li><a class='num-pag'>...</a></li>";
                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li><a class='num-pag'>...</a></li>";

                                            // echo "<li class='active'><a class='num-pag'>$counter</a></li>";
                                        } else {
                                             
                                            echo "<li><a href='?page_no=$counter' class='num-pag'>$counter</a></li>";
                                        }
                                    }
                                    /* echo "<li><a class='num-pag'>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last' class='num-pag'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages' class='num-pag'>$total_no_of_pages</a></li>"; */
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

                

                $result = mysqli_query($conn, "SELECT * FROM `45finished` LIMIT $offset, $total_records_per_page");
                echo"<div class='container'>
                <br>
                <div>
                <table class=' table-condensed table-bordered'> <tr>
                ";
                $i=1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "
                  <td>
                      <img src='", $row['movie_image'], "' alt='ret'>
                      <span class='genre'>",$row['movie_genre'],"</span>
                      <form action='viewDetails2.php?name=",$row['movie_name'],"' method='GET'>
                      <input type='hidden' name='phpVariable' value='",$row['a_id'],"'>
                      <button type='submit' name='submit' class='btn' >view details</button>
                     </form>
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

    <?php
        include 'footer.html';
    ?>
</body>

</html>