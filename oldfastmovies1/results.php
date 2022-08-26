<!DOCTYPE html>
<html lang="en">
<head>
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
    <style>
        .container {
            width: 80vw;
            margin: auto;
            background-color: #1c1c19;
        }

        .results {
            width: 90%;
            margin: auto;
            /*background-color: gray;*/
            /*color: #CCCCCC !important;*/
        }

        .results .row {
            display: flex;
            width: 100%;
            height: 35vh;
            margin-bottom: 30px;
        }

        .results .row .img {
            width: 30%;
        }

        .results .row .content {
            width: 60%;
        }

        .results .row .img img {
            width: 70%;
            height: 100%;
            margin: auto;
            border: 3px solid #fff;
            border-radius: 5px;
        }

        .hidden {
            display: none;
        }

        .results h2 {
            margin: 20px;
        }

        .results .r-hr{
            margin-bottom: 15px;
        }
        .results .term{
            color: var(--light-yellow);
            text-decoration: underline;
        }
        .date-yr{
            color: gray;
            
        }
        @media screen and (max-width: 767px) {
            .container {
                width: 100vw;
                background-color: rgb(15 23 42);
            }

            .results .row {
                display: block;
                height: 55vh;
            }

            .results .row .img {
                width: 60%;
                /* height: 75%; */
            }

            .results .row .content {
                width: 90%;
                height: auto;
                margin: auto;
            }

            .results .row .img img {
                width: 70%;
                height: auto;
                margin-left: 15%;
            }
        }
        @media screen and (max-width: 768px){
            .results .row .img {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <?php
        include "partials/header.html";
    ?>
    <div class="container">
        <div class="results">

            <?php
            include 'config.php';

            $term1 = mysqli_real_escape_string($conn, $_GET['search']);
            $term = preg_replace('/[^A-Za-z0-9\-]/', '', $term1);
            // echo $term;
            $temp = $term[0];
            $search = explode(" ", $term);
            $search_string = "";
            foreach ($search as $word) {
                $search_string .= metaphone($word) . "";
            }
            // echo $temp;

            // echo $term;
            
            // echo metaphone('Robin Robin');
            $sql = "SELECT * FROM 45finished WHERE movie_name LIKE '%$term1%' LIMIT 5";
            $query = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($query);
            if ($rowcount > 0) {
                echo "<h2>Movies tagged: <span class='term'>$term1</span></h2>";
                while ($row = mysqli_fetch_array($query)) {
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $row['movie_name']);
                    echo '
                        <div class="row">
                            <div class="img">
                                <a href="/movies/',$row['a_id'],'-',$newname,'"><img src="' . $row['movie_image'] . '" alt="' . $row['movie_name'] . '"></a>
                            </div>
                            <div class="content">
                                <a href="/movies/',$row['a_id'],'-',$newname,'"><h3>' . $row['movie_name'] . '</h3></a>
                                <p>' . $row['movie_description'] . '</p><br>
                                <span class="date-yr">Release year: '.$row['realese_year'].'</span>
                            </div>
                        </div>
                        <hr class="r-hr">
                        ';
                }
            } else {
                $sql1 = "SELECT * FROM 45finished WHERE movie_name LIKE '%$temp%' LIMIT 5";
                echo "<h2>Movies tagged: <span class='term'>$term1</span></h2>";
                $query1 = mysqli_query($conn, $sql1);
                $rowcount1 = mysqli_num_rows($query1);
                while ($row1 = mysqli_fetch_array($query1)) {
                    $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $row1['movie_name']);
                    echo '
                        <div class="row">
                            <div class="img">
                            
                                <a href="/movies/',$row1['a_id'],'-',$newname1,'"><img src="' . $row1['movie_image'] . '" alt="' . $row1['movie_name'] . '"></a>
                            </div>
                            <div class="content">
                                <a href="/movies/',$row1['a_id'],'-',$newname1,'"><h3>' . $row1['movie_name'] . '</h3></a>
                                <p>' . $row1['movie_description'] . '</p><br>
                                <span class="date-yr">Release year: '.$row1['realese_year'].'</span>
                            </div>
                        </div>
                        <hr class="r-hr">
                        ';
                }
                // echo "no results Found";
            }
            echo "<hr>";
            echo "<hr>";
            echo "<hr>";
            // series
            
            $sqls = "SELECT * FROM series WHERE s_name LIKE '%$term1%' LIMIT 5";
            $querys = mysqli_query($conn, $sqls);
            $rowcounts = mysqli_num_rows($querys);
            if ($rowcounts > 0) {
                echo "<h2>Series tagged: <span class='term'>$term1</span></h2>";
                while ($rows = mysqli_fetch_array($querys)) {
                    $newname2 = preg_replace('/[^A-Za-z0-9\-]/', '-', $rows['s_name']);
                    echo '
                        <div class="row">
                            <div class="img">
                                <a href="/series/',$rows['a_id'],'-',$newname2,'"><img src="seriesImages/' . $rows['s_img'] . '" alt="' . $rows['s_name'] . '"></a>
                            </div>
                            <div class="content">
                                <a href="/series/',$rows['a_id'],'-',$newname2,'"><h3>' . $rows['s_name'] . '</h3></a>
                                <p>' . $rows['details'] . '</p><br>
                                <span class="date-yr">Release year: '.$rows['realese_yr'].'</span>
                            </div>
                        </div>
                        <hr class="r-hr">
                        ';
                }
            } else {
                $sqls1 = "SELECT * FROM series WHERE s_name LIKE '%$temp%' LIMIT 5";
                echo "<h2>Series tagged: <span class='term'>$term1</span></h2>";
                $querys1 = mysqli_query($conn, $sqls1);
                $rowcounts1 = mysqli_num_rows($querys1);
                while ($rows1 = mysqli_fetch_array($querys1)) {
                    $newname3 = preg_replace('/[^A-Za-z0-9\-]/', '-', $rows1['s_name']);
                    echo '
                        <div class="row">
                            <div class="img">
                                <a href="/series/',$rows1['a_id'],'-',$newname3,'"><img src="seriesImages/' . $rows1['s_img'] . '" alt="' . $rows1['s_name'] . '"></a>
                            </div>
                            <div class="content">
                                <a href="/series/',$rows1['a_id'],'-',$newname3,'"><h3>' . $rows1['s_name'] . '</h3></a>
                                <p>' . $rows1['details'] . '</p><br>
                                <span class="date-yr">Release year: '.$rows1['realese_yr'].'</span>
                            </div>
                        </div>
                        <hr class="r-hr">
                        ';
                }
                // echo "no results Found";
            }

            ?>
            <span class="hidden" id="inputz"><?php echo $term1; ?></span>

        </div>
    </div>

    <?php
        include 'partials/footer.html';
        include 'partials/footer-scripts.php';
    ?>
    
  <!--social axd  -->
  <script type='text/javascript' src='//argondenial.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script>
<!--<script type='text/javascript' src='//argondenial.com/aa/b3/e8/aab3e88ddf1b758eaba892dbb3a32ce9.js'></script>-->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>  
    <script>
        $(document).ready(function() {
            var txt = $('#inputz').text();
            $('#search').val(txt);
            console.log("ret");
        });
    </script>
</body>

</html>