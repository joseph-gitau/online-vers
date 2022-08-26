<?php
    include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="propeller" content="ea53b5ce4e7fca82901a9bd2c6d62b44">
    <meta name="google-site-verification" content="mVTIrPLNqTPLaHH27hKwwwo7ODMGYd75tD7TS6aTkfg" />
    <meta name="description" content= "Fastmovies - The only best free site to download all your favorite Tv shows and movies in high quality direct links" />
    <meta name="robots" content= "index, follow">
    <style>
        *{ 
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }
        center{
            /* visibility: hidden; */
            display: none;
        }
        .datalive{
            display: none;
        }
        h4{
            font-size: 1em;
        }
        body{
           overflow-x: hidden; 
        }
        html{
            color: #fff;
            font-family: 'lato', Arial;
            font-size: 18px;
            font-weight: 300;
            text-rendering: optimizeLegibility;
        }
        @media  screen and (min-width: 768px) {
            #mobile-homepage1,
            #mobile-homepage2,
            #mobile-homepage3{
                display: none;
            }
        }
        #homepage1{
            
            height: 170vh;
            width: 98.8vw;
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url("resources/images2/back1.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            background-color: #3d3c38;
        }
        
        .popular-down-head{
            display: flex;
            justify-content: center;
            justify-content: space-between;
            padding-top: 2vh;
        }
        .pop1{
            margin-left: 20%;
            color: #e67e22;
            font-size: 1.3rem;
        }
        .pop1 i{
            font-size: 1.2em;
        }
        .popular-down-head h5{
            margin-right: 10%;
            margin-top: 1%;
        }
        .popular-down-l1{
            width: 80%;
            margin: auto;
            margin-top: 1%;
            margin-bottom: 1%;
        }
        /*---------------------------------popular-down1-----------------------*/
        .popular-down1{
            margin-left: 10vw;
        }
        td{
            width: 20vw;
            height: 45vh;
            position: relative;
        } 
        td img{
            width: 80%;
            height: 90%;
            margin-left: 10%;
            border: 3px solid #fff;
            border-radius: 5px;
            
        }
        img:hover{
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
            font-size: 1.4em;
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
            font-size: 1.1em;
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
        /* --------------------------homepage2---------------------------- */
        #homepage2{
            width: 98.8vw;
            height: 115vh;
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("resources/images2/tester.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            background-color: #1c1b15;
        }
        #homepage3{
            width: 98.8vw;
            height: 65vh;
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("resources/images2/background.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover; */
            background-color: #bfbdb2;
        }
        @media  screen and (max-width: 767px) {
            #homepage1,
            #homepage2,
            #homepage3{
                display: none;
            }
            #mobile-homepage1{
                width: 100vw;
                height: 110vh;
                background-color: rgba(26, 25, 23);
                position: relative;
            }
            .popular-down-head-mob{
            display: flex;
            justify-content: center;
            justify-content: space-between;
            padding-top: 2vh;
            margin-bottom: 2vh;
            }
            .pop1-mob{
                margin-left: 10%;
                color: #e67e22;
                font-size: 1.1rem;
            }
            .pop1-mob i{
            font-size: 1.2em;
            }
            .popular-down-head-mob h5{
                margin-right: 10%;
                margin-top: 1%;
                font-size: 1.1em;
            }
            /*---------------------------------popular-down1-----------------------*/
            .popular-down1-mob{
                /* margin-left: 10vw; */
                margin-top: 4vh;
            }
            .popular-down1-mob td{
                width: 50vw;
                height: 45vh;
                position: relative;
            } 
            td img{
                width: 80%;
                height: 80%;
                margin-left: 10%;
                border: 3px solid #fff;
                border-radius: 5px;
                
            }
            img:hover{
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
                font-size: 1.2em;
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
                font-size: 0.8em;
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
            .popular-down1-mob h4{
                margin: 5px 10%;
                color: #fff;
                font-size: 0.8rem;
            }
            .popular-down1-mob .date{
                margin: 5px 10%;
                color: gray;
                font-size: 0.8rem;
            }
            /* -----------------------------mob2-------------------------------- */
            #mobile-homepage2{
                width: 100vw;
                height: 200vh;
                background-color: rgba(33, 31, 26);
            }
            /* -----------------------------mob3-------------------------------- */
            #mobile-homepage3{
                width: 100vw;
                height: 60vh;
                background-color: rgba(92, 87, 73);
            }
        }
    </style>
</head>
<body>
    <section id="homepage1" class="container-fluid">
        
        <div class="popular-down-head">
            <div class="pop1">
                <!-- <i class="bi bi-star-fill"></i> -->
                <i class="fas fa-star"></i>
                <span>popular downloads</span>
            </div>
            <h5>Request a movie <a href="https://fastmovies1.com/contact.html">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 12 OFFSET 192";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            
            // do{
            //     $tst = $row['a_id'];
            //     echo $tst;
            // }
        echo"
        <td> 
                   
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='",$row['a_id'],"' value='",$row['a_id'],"'>
            <button type='submit' class='btn' >view details</button>
            </form>
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
    <!----------------------latest realeses--------------------------->
    <section id="homepage2">
    <div class="popular-down-head">
            <div class="pop1">
                <i class="bi bi-star-fill"></i>
                <span>Latest downloads</span>
            </div>
            <h5>Request a movie <a href="https://fastmovies1.com/contact.html">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 8 OFFSET 204";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        echo"
        <td>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='search_query' value='",$row['a_id'],"'>
            <button type='submit'  class='btn' >view details</button>
            </form>
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
    <!-- -------------------------upcoming movies----------------- -->
    <section id="homepage3">
    <div class="popular-down-head">
            <div class="pop1">
                <i class="bi bi-star-fill"></i>
                <span>Upcoming Movies</span>
            </div>
            <h5>Request a movie <a href="https://fastmovies1.com/contact.html">here.</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 4 OFFSET 212";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        echo"
        <td>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='search_query' value='",$row['a_id'],"'>
            <button type='submit'  class='btn' >view details</button>
            </form>
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
            <h5><a href="https://fastmovies1.com/contact.html">More</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 4 OFFSET 192";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        echo"
        <td>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='search_query' value='",$row['a_id'],"'>
            <button type='submit' class='btn' >view details</button>
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
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>
    <!-- --------------------------------------mob2----------------------------------------------------- -->
    <section id="mobile-homepage2">
        <div class="popular-down-head-mob">
            <div class="pop1-mob">
                <i class="bi bi-star-fill"></i>
                <span>latest realeses</span>
            </div>
            <h5><a href="https://fastmovies1.com/contact.html">More</a></h5>
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 8 OFFSET 204";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        echo"
        <td>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='search_query' value='",$row['a_id'],"'>
            <button type='submit'  class='btn' >view details</button>
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
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>
    <!-- --------------------------------------mob3----------------------------------------------------- -->
    <section id="mobile-homepage3">
        <div class="popular-down-head-mob">
            <div class="pop1-mob">
                <i class="bi bi-star-fill"></i>
                <span>upcoming movies</span>
            </div>
            <!-- <h5><a href="contact.html">More</a></h5> -->
        </div>
        <hr class="popular-down-l1">

        <table class="popular-down1-mob"><tr>
        <?php
        $i=1;
        include "dbh.php";
        $query = "SELECT * FROM 45finished LIMIT 2 OFFSET 212";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        echo"
        <td>
                  
            <img class='tdimg1' src='", $row['movie_image'], "' alt='ret'>
            <span class='genre'>",$row['movie_genre'],"</span>
            <form action='viewDetails2.php?' onsubmit='search(); return false;' method='GET'>
            <input type='hidden' name='phpVariable' id='search_query' value='",$row['a_id'],"'>
            <button type='submit'  class='btn' >view details</button>
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
            
        }
        echo "</tr>";
        echo "</table>";
            
        ?>
    </section>

    <?php
        include 'footer.html';
    ?>
    
    <script>
    function search()
        {
        location.href = 'movies/'+document.getElementById('search_query').value.
        replace(' ','+');
        }
    </script>
    
</body>
</html>