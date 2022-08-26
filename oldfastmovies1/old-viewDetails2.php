<?php
    include 'header.php';
    
?>

<?php
        include "dbh.php";
        if (isset($_GET['details'])) {
            $search = mysqli_real_escape_string($conn, $_GET['details']);
            $sql = "SELECT * FROM 45finished WHERE a_id = $search";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            

            if ($queryResult >0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $metades = $row['movie_name'];
                    
                }
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content= "<?php echo "$metades Download free High quality, Direct link"; ?>" />
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.3-web/css/all.min.css">
    <script src="https://fastmovies1.com/resources/jquery.js"></script> 
    <script src="https://kit.fontawesome.com/5d07b6300c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Document</title>
    <style>
        
        body{
            background-color: #1c1c1b;
        }
        .artyicle{
            position: relative;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #browse-movies{
            width: 80vw;
            height: 65vh;
            margin: auto;
            margin-top: 3vh;
            display: flex;
        }
        .imageview{
            width: 20vw;
            height: 60vh;
            margin-right: 5vw;
        }
        .imageview img{
            height: 90%;
            width: 95%;
            border: 2px solid #fff;
            border-radius: 5px;
            margin-bottom: 5%;
        }
        /* .imageview img, */
        .similar-mov-item img{
            float: left;
            width: 95%;
            height: 55vh;
            border: 2px solid #fff;
            border-radius: 5px;
            
        }
        .view-container{
            
            width: 30VW;
            height: 55vh;
        }
        .view-container h1{
            font-size: 40px;
            margin-bottom: 5%;
        }
        .date1{
            font-size: 1.0rem;
            margin-top: 3%;
            margin-bottom: 5%;
        }
        .genre{
            margin-top: 2%;
            margin-bottom: 3%;
            font-weight: 600;
        }
        .synopsis{
            margin-top: 3%;
            margin-bottom: 1%;
        }
        .time,
        .rating,
        .meta,
        .vote{
            margin: 4% 0 3% 0;
        }
        .time i,
        .rating i,
        .meta i,
        .vote i{
            color: #e67e22;
            margin-right: 3%;
            font-size: 1.3em;
        }
        p{
            margin-bottom: 4%;
            color: gray;
        }
        .viewdownloads{
            border: 1px solid #e67e22;
            padding: 3% 33% 3% 33%;
            /* padding: 7px 15px; */
            background-color: #e67e22;
            border-radius: 5px;
        }
        .synopsis-part{
            width: 80vw;
            margin: auto;
        }
         #browse-movies a{
            text-decoration: none;
            color: #fff;
        }
        #browse-movies a:hover{
            background-color: #cf6d17;
            cursor: pointer;
            transition: .35s ease-out; 
        }
        .similar-mov{
            width: 20vw;
            height: 45vh;
            /*background-color: skyblue;*/
            margin-left: 5vw;
            margin-top: 2vh;
        }
        .similar-mov-item{
            width: 49%;
            height: 50%;
            background-color: green;
            display: flex;
            margin-bottom: 1vh;
        }
        .similar-mov-item img{
            width: 100%;
            height: 100%;

        }
        .similar-mov-item:nth-child(1){
            float: right;
        }
        .similar-mov-item:nth-child(3){
            float: right;
        }
        /* -------------------trailer-------------- */
        .trailer-head{
            margin: 3vh 10vw 5vh 10vw;
            
        }
        .trailer-head h2{
            padding-top: 2vh;
        }
        .trailer{
            width: 80vw;
            height: 33vh;
            margin: auto;
            display: flex;
            flex-direction: row;
        }
        
        .trailer-img1{
            float: right;
            width: 33.3%;
            height: 100%;
            margin: 0 0.3%;
        }
        .trailer-img1:hover{
            opacity: 0.7;
        }
        .disqus-comments1{
            width: 80vw;
            margin: auto;
        }
        @media  screen and (max-width: 767px) {
            #browse-movies{
                width: 90%;
                height: 50vh;
            }
            .similar-section{
                display: none;
            }
            .imageview{
                width: 40%;
                height: 50vh;
                padding: 0;
                margin: 0;
            }.imageview img{
                width: 100%;
                height: 70%;
            }
            .view-container{
                width: 60%;
                padding-left: 5%;
            }
            .view-container h1{
            font-size: 25px;
            margin-bottom: 5%;
            }
            .date1,
            .genre,
            .time,
            .rating,
            .meta,
            .vote{
                margin: 5% 0 0 0;
                font-size: 0.9em;
            }
            .viewdownloads{
                margin-top: 35%;
                padding: 3% 18%;
            }
            .vx2{
                display: none;
            }
            .vx1{
                width: 100%;
            }
            
        }
        
    </style>
</head>
<body>
    <?php
        
        include 'dbh.php';

    ?>
    <div class="artyicle">
    <?php
        if (isset($_GET['details'])) {
            $search = mysqli_real_escape_string($conn, $_GET['details']);
            $sql = "SELECT * FROM 45finished WHERE a_id = $search";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            

            if ($queryResult >0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    $embedCode = $row['trailer_link'];
                        preg_match('/src="([^"]+)"/', $embedCode, $match);
                        // Extract video url from embed code
                        $videoURL = $match[1];
                        $urlArr = explode("/",$videoURL);
                        $urlArrNum = count($urlArr);
                        // YouTube video ID
                        $youtubeVideoId = $urlArr[$urlArrNum - 1];
                        // Generate youtube thumbnail url
                        $thumbURL2 = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';


                    echo "
                    <div class='artyicle' style='background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url($thumbURL2; );'>
                    <section id='browse-movies' >
                    <div class='imageview'><img src='https://fastmovies1.com/", $row['movie_image'], "' alt='", $row['movie_name'], "'>
                    <div><a href='", $row['download_link'], "' class='viewdownloads'>Download</a></div>
                    </div>
                    <div class='view-container'>
                    <h1>", $row['movie_name'], "</h1>
                    <div class='genre'><span >",$row['movie_genre'],"</span></div>
                    <div class='date1'><span >Realese year: ", $row['realese_year'], "</span></div>
                    <div class='time'><span ><i class='fas fa-hourglass-half'></i> movie time: ", $row['time_minute'], "</span></div>
                    <div class='rating'><span><i class='fab fa-imdb'></i> imdb rating: ", $row['imdb_rating'], " <i class='fas fa-star'></i></span></div>
                    <div class='meta'><span><i class='fas fa-user'></i> Metascore: ", $row['meta_score'], "</span></div>
                    <div class='meta'><span><i class='fas fa-heart'></i> Vote: ", $row['vote'], "</span></div>
                    
                    </div>
                    ";
                    $ret = $row['movie_genre'];
                }
            }
        }

    ?>
    <div class='similar-section'>
        <div class="similar-head" style="font-size: 1.3em;
            margin-left: 6vw;
            margin-top: 3vh;">
            <span >Similar movies</span>
            
        </div>

        <div class="similar-mov">
        
        <?php
        
        $per_page_record = 4;
        $sql = "SELECT * FROM 45finished WHERE movie_genre LIKE '%$ret%'
        LIMIT $per_page_record ";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        while ($trow = mysqli_fetch_assoc($result)) {
        echo "
        
        <div class='similar-mov-item'><img src='https://fastmovies1.com/", $trow['movie_image'], "' alt='", $trow['movie_name'], "'></div>
        ";
        }
        
        ?>
        </div>
        </div>
    </div>
    </section>
    <div class="trailer-head">
        <hr>
        <h2>Watch trailer</h2>
    </div>
    <div class="trailer">
    <?php
        if (isset($_GET['details'])) {
            $search = mysqli_real_escape_string($conn, $_GET['details']);
            $sql = "SELECT * FROM 45finished WHERE a_id = $search";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            

            if ($queryResult >0) {
                 while ($row = mysqli_fetch_assoc($result)) {

                    $embedCode = $row['trailer_link'];
                        preg_match('/src="([^"]+)"/', $embedCode, $match);
                        
                        // Extract video url from embed code
                        $videoURL = $match[1];
                        $urlArr = explode("/",$videoURL);
                        $urlArrNum = count($urlArr);
                        
                        // YouTube video ID
                        $youtubeVideoId = $urlArr[$urlArrNum - 1];
                        
                        // Generate youtube thumbnail url
                        $thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/2.jpg';
                        $thumbURL1 = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/3.jpg';
                        
                        // Display thumbnail image
                        // echo '<img src="'.$thumbURL.'"/>';
                    

                    echo "
                    
                    <div class='trailer-img1 vx1'>
                    ", $row['trailer_link'], "
                    
                    </div>
                    <div class='trailer-img1 vx2'>
                    <img src=".$thumbURL." width='100%' height='100%' alt='", $row['movie_name'], "'>
                    </div>
                    <div class='trailer-img1 vx2'>
                    <img src=".$thumbURL1." width='100%' height='100%' alt='", $row['movie_name'], "'>
                    </div>
                    ";
                    
                }
            }
        }
    ?>
        

    </div>
    <?php
        if (isset($_GET['details'])) {
            $search = mysqli_real_escape_string($conn, $_GET['details']);
            $sql = "SELECT * FROM 45finished WHERE a_id = $search";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            

            if ($queryResult >0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='synopsis-part'>
                    <div class='synopsis'><span >Synopsis</span></div>
                    <div><p>", $row['movie_description'], "</p></div>
                    </div>
                    
                    
                    ";
                    // $ret = $row['movie_genre'];
                    //$my_identifier = $row['a_id'];
                }
            }
        }
    ?>

    <div class="disqus-comments1"><div id="disqus_thread"></div></div>
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

    

    
<script type="text/javascript">
        $(document).ready(function() {
            document.title = 'Fast Movies Download | '+ $('h1:first').text();
        });
    </script>

    <?php
    include 'footer.html';
    ?>
    
</body>
</html>




 
