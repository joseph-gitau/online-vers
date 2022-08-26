<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: Wed, 1 Jan 2020 00:00:00 GMT"); // Anytime in the past
        include "../dbh.php";
        
        if (isset($_GET['details'])) {
            $searchrawm = mysqli_real_escape_string($conn, $_GET['details']);
            $searchm = strstr($searchrawm, '-', true);
            $sqlmm = "SELECT * FROM 45finished WHERE `a_id` = '$searchm'";
            $resultm = mysqli_query($conn, $sqlmm);
            $queryResultm = mysqli_num_rows($resultm);
            $rowm = mysqli_fetch_assoc($resultm);
            $metades = $rowm['movie_name'];
            $des = $rowm['movie_description'];
            $mi = $rowm['movie_image'];
            
        }
        
        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "../partials/head.php";
    ?>
    <meta name="description" content="<?php echo $des; ?>" />
    <meta name="keywords" content="Index of <?php echo $metades; ?> free dowmload, download movies, free download movies, download tv series, tv series low size, tv series 480p, newest tv series, direct download movies, direct download series, high quality movies, high quality series, fast movies download">
    <link rel="canonical" href="https://fastmovies1.com/movies/<?php echo $searchrawm;?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Index of <?php echo $metades; ?>" />
	<meta property="og:description" content="<?php echo $des; ?>" />
	<meta property="og:url" content="https://www.fastmovies1.com/movies/<?php echo $searchrawm;?>/" />
	<meta property="og:site_name" content="Download latest movies - Free download new movies" />
	<meta property="article:published_time" content="2021-11-15T07:08:00+00:00" />
	<meta property="article:modified_time" content="2021-11-20T07:09:30+00:00" />
	<meta property="og:image" content="https://www.fastmovies1.com/<?php echo $mi; ?>" />
    <link rel="stylesheet" href="resources/fontawesome-free-5.15.3-web/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <title><?php echo $metades; ?> | Fast Movies Download</title>
    <style>
    
    /*broken*/
    .broken-url {
            background-color: #827144;
            border: none;
            color: white;
            padding: 16px 16px;
            text-decoration: none;
            margin: auto;
            cursor: pointer;
            width: 50%;
            height: 50%;

        }

        .savealert {
            background-color: #e67e22;
            color: white;
            padding: 10px 16px;
            border: 1px solid white;
            border-radius: 5px;

        }
        .savealert:hover{
            cursor: pointer;
            background-color: #cf6d17;
        }

        .broken-url input[type="email"] {
            padding: 12px 8px;

        }
        .broken-url a:hover{
            background: #cf6d17;
        }
        @media screen and (max-width: 767px) {
            .streamer {
                position: relative;
                bottom: 20% !important;
            }
            /*broken*/
            .broken-url {
                width: 100%;
                display: flex;
                flex-direction: column;
                font-size: 1rem;
            }

            .broken-url input[type="email"] {
                margin: 3vh 3vw;
                /*font-size: 1.rem;*/
                background-color: #fff;
            }

            .broken-url input[type="submit"] {

                font-size: 1.4rem;
            }

            .broken-url input[type="checkbox"] {

                height: 20px;
                width: 20px;
            }

            .broken-url label {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php
        include "../partials/header.html";
        include '../dbh.php';
        
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
    
    <div class="artyicle">
    <?php
        if (isset($_GET['details'])) {
            $searchraw = mysqli_real_escape_string($conn, $_GET['details']);
            $search = strstr($searchraw, '-', true);
            $sql = "SELECT * FROM 45finished WHERE a_id = $search";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            

            if ($queryResult >0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    $embedCode = $row['trailer_link'];
                    $p480 = $row['480p'];
                    $p720 = $row['720p'];
                    $p1080 = $row['1080p'];
                    $k4 = $row['4k'];
                    $hdcam = $row['HDcam'];
                        preg_match('/src="([^"]+)"/', $embedCode, $match);
                        // Extract video url from embed code
                        $videoURL = $match[1];
                        $urlArr = explode("/",$videoURL);
                        $urlArrNum = count($urlArr);
                        // YouTube video ID
                        $youtubeVideoId = $urlArr[$urlArrNum - 1];
                        // Generate youtube thumbnail url
                        $thumbURL2 = 'https://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';


                    echo "
                    <div class='artyicle' style='background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url($thumbURL2; );'>
                    <section id='browse-movies' >
                    <div class='imageview'><img src='https://fastmovies1.com/", $row['movie_image'], "' alt='", $row['movie_name'], "'>
                    ";
                    // check to display initial download btn
                    if (empty($p480) && empty($p720) && empty($p1080) && empty($k4) && empty($hdcam)) {
                        echo "
                        <div><a href='",$row['download_link'],"' target='blank' class='viewdownloads'>Download</a></div>
                        ";
                    } else {
                        echo "
                        <div><a href='#ex1' rel='modal:open' class='viewdownloads'>Download</a></div>
                        ";
                    }
                    
                    // <div><a href='", $row['download_link'], "' target='blank' class='viewdownloads'>Stream</a></div>#e67e22#cf6d17
                    echo "</div>
                    <div class='view-container'>
                    <h1>", $row['movie_name'], "</h1>
                    <div class='genre'><span >",$row['movie_genre'],"</span></div>
                    <div class='date1'><span >Realese year: ", $row['realese_year'], "</span></div>
                    <div class='time'><span ><i class='fas fa-hourglass-half'></i> movie time: ", $row['time_minute'], "</span></div>
                    <div class='rating'><span><i class='fab fa-imdb'></i> imdb rating: ", $row['imdb_rating'], " <i class='fas fa-star'></i></span></div>
                    <div class='meta'><span><i class='fas fa-user'></i> Metascore: ", $row['meta_score'], "</span></div>";
                    $stream_link = $row['stream'];
                    if(strpos($stream_link, 'http') !== false) {
                        echo "<div class='slink' style='a:hover{background: #cf6d17;}'><a href='",$stream_link,"' class='streamer' target='blank' style='position: absolute; bottom: 8%; background: #e67e22; padding: 1% 10%; border-radius: 5px; '>Stream Movie</a></div>";
                    } else {
                        echo "";
                    }
                    echo "</div>
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
        $oldname = $trow['movie_name'];
        $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
        echo "
        
        <div class='similar-mov-item'><a href='/movies/",$trow['a_id'],"-",$newname,"' style='cursor: pointer;'><img src='https://fastmovies1.com/", $trow['movie_image'], "' alt='", $trow['movie_name'], "'></a></div>
        ";
        }
        
        ?>
        </div>
        </div>
    </div>
    </section>
    <!--broken links-->
    <div>
        <?php
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . 
                "://" . $_SERVER['HTTP_HOST'] . 
                $_SERVER['REQUEST_URI'];
         
        // echo $url;  Outputs: Full URL
        $trim = substr($url, 32);

        ?>

        <form action="process.php" method="GET" class="broken-url" id="broken-url">
            <h3>Report the link is not working.</h3><br>&nbsp;
            <input type="hidden" name="url" value="<?php echo $url; ?>" id="broken-1" class="url-broken">
            <input type="hidden" name="urlTrim" value="<?php echo $trim; ?>" id="broken-2" class="url-broken">
            <div>
                <input type="checkbox" id="broken-3" name="send" value="send me an email when link is repared" checked=?yes? />
                <label>send me an email when link is repaired</label>
            </div> <br>

            <label for="email">Enter your email:</label>
            <input type="email" id="email" name="email" placeholder="Email (optional)" class="">

            <button type="submit" class="savealert" name="report-link">Report</button>


        </form>
    </div>
    <div class="trailer-head">
        <hr>
        <h2>Watch trailer</h2>
    </div>
    <div class="trailer">
    <?php
        if (isset($_GET['details'])) {
            $searchraw3 = mysqli_real_escape_string($conn, $_GET['details']);
            $search = strstr($searchraw3, '-', true);
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
                        $thumbURL = 'https://img.youtube.com/vi/'.$youtubeVideoId.'/2.jpg';
                        $thumbURL1 = 'https://img.youtube.com/vi/'.$youtubeVideoId.'/3.jpg';
                        $thumbtest = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/maxresdefault.jpg';
                        $thumbtest2 = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/hqdefault.jpg';
                        $thumbtest3 = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/mqdefault.jpg';
                        
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

    
        <div class="ads">
        <!--<h5>Ad</h5>-->
        <div>
         <script type="text/javascript">
// 	atOptions = {
// 		'key' : '581bc201a057d32e8fe24be7b7546951',
// 		'format' : 'iframe',
// 		'height' : 90,
// 		'width' : 728,
// 		'params' : {}
// 	};
// 	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/581bc201a057d32e8fe24be7b7546951/invoke.js"></scr' + 'ipt>');
 </script>
        </div>
        
    </div>
        <div class="ads-mb">
        <!--<h5>Ad</h5>-->
        <div>
//             <script type="text/javascript">
// 	atOptions = {
// 		'key' : '80929bfa57b692636b75c01451758d40',
// 		'format' : 'iframe',
// 		'height' : 50,
// 		'width' : 320,
// 		'params' : {}
// 	};
// 	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/80929bfa57b692636b75c01451758d40/invoke.js"></scr' + 'ipt>');
</script>
        </div>
        
    </div>
    <?php
        if (isset($_GET['details'])) {
            $searchraw4 = mysqli_real_escape_string($conn, $_GET['details']);
            $search = strstr($searchraw4, '-', true);
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
    <!--nw-->
    <div id="ex1" class="modal movie-modal">
    <div class="movie-modal-container">
        <?php
            if($p480 != ""){
                echo '
                <div class="movie-modal-element">
                <div class="movie-svg">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="100%" height="100%"
                        viewBox="0 0 100.999 66" enable-background="new 0 0 100.999 66"
                        xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path fill="#DBDBDB"
                                    d="M99.795,0H1C0.683,0,0,0.676,0,1v56c0,0.324,0.683,1,1,1h46v4H35v4h28.999v-4H53v-4h46.999 c0.316,0,1-0.676,1-1V1.212C100.999,0.887,100.113,0,99.795,0z M50.846,0.563c0.036,0,0.064,0.029,0.064,0.066 s-0.028,0.066-0.064,0.066c-0.035,0-0.064-0.03-0.064-0.066S50.811,0.563,50.846,0.563z M50.176,0.499 c0.071,0,0.128,0.058,0.127,0.13c0,0.071-0.057,0.13-0.127,0.13c-0.07,0-0.127-0.058-0.127-0.13 C50.049,0.557,50.106,0.499,50.176,0.499z M49.298,56.942V55.73H50.5v1.212H49.298z M96.999,54H4V4h92.999V54z" />
                            </g>
                        </g>
                        <g>
                            <text
                                style="fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 27.5px; font-weight: 700; letter-spacing: 1px; white-space: pre; opacity: 0.2;"
                                x="20.118" y="27.725" dx="-0.501 -0.401 -1.648 -1.176"
                                dy="10.281 0.471 -0.235 -0.117">480p</text>
                            <text
                                style="white-space: pre; fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 3.3px;"
                                x="27.765" y="26.667"> </text>
                        </g>
                    </svg>
                </div>

                <div class="modal-movie-download">
                    <a href="'.$p480.'" class="movie-modal-btn">Download</a>
                </div>
            </div>
                ';
            } else {
                echo '';
            }
            // 2
            if($p720 != "") {
                echo '
                <div class="movie-modal-element">
                <div class="movie-svg">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="100%" height="100%" viewBox="0 0 100.999 66" enable-background="new 0 0 100.999 66" xml:space="preserve">
                        <g>
                            <g>
                                <path fill="#DBDBDB" d="M99.795,0H1C0.683,0,0,0.676,0,1v56c0,0.324,0.683,1,1,1h46v4H35v4h28.999v-4H53v-4h46.999
                                    c0.316,0,1-0.676,1-1V1.212C100.999,0.887,100.113,0,99.795,0z M50.846,0.563c0.036,0,0.064,0.029,0.064,0.066
                                    s-0.028,0.066-0.064,0.066c-0.035,0-0.064-0.03-0.064-0.066S50.811,0.563,50.846,0.563z M50.176,0.499
                                    c0.071,0,0.128,0.058,0.127,0.13c0,0.071-0.057,0.13-0.127,0.13c-0.07,0-0.127-0.058-0.127-0.13
                                    C50.049,0.557,50.106,0.499,50.176,0.499z M49.298,56.942V55.73H50.5v1.212H49.298z M96.999,54H4V4h92.999V54z"/>
                            </g>
                        </g>
                        <g>
                            <path fill="#CCCCCC" d="M34.701,22.507c-3.968,3.455-6.127,10.554-6.181,15.602h-4.103c0.432-5.587,2.753-11.013,6.343-15.332
                                h-8.961v-3.563h12.902V22.507z"/>
                            <path fill="#CCCCCC" d="M34.731,26.476c-0.135-4.319,2.322-7.639,6.856-7.639c3.455,0,6.478,2.213,6.478,5.912
                                c0,2.834-1.512,4.4-3.374,5.722c-1.862,1.323-4.076,2.402-5.453,4.346h8.935v3.293H34.3c0.027-4.373,2.699-6.235,5.965-8.449
                                c1.674-1.134,3.941-2.294,3.968-4.616c0-1.782-1.188-2.916-2.834-2.916c-2.268,0-2.996,2.349-2.996,4.346H34.731z"/>
                            <path fill="#CCCCCC" d="M56.221,18.836c3.779,0,6.965,2.375,6.965,9.745c0,7.531-3.186,9.906-6.965,9.906
                                c-3.725,0-6.91-2.375-6.91-9.906C49.311,21.212,52.497,18.836,56.221,18.836z M56.221,35.329c3.132,0,3.132-4.616,3.132-6.748
                                c0-1.971,0-6.586-3.132-6.586c-3.077,0-3.077,4.616-3.077,6.586C53.144,30.713,53.144,35.329,56.221,35.329z"/>
                            <path fill="#CCCCCC" d="M65.215,24.154h3.644v1.781h0.054c0.918-1.484,2.43-2.159,4.157-2.159c4.373,0,6.344,3.536,6.344,7.504
                                c0,3.725-2.052,7.207-6.128,7.207c-1.674,0-3.266-0.729-4.184-2.105h-0.054v6.64h-3.833V24.154z M75.581,31.172
                                c0-2.213-0.892-4.508-3.348-4.508c-2.51,0-3.32,2.24-3.32,4.508c0,2.267,0.864,4.427,3.348,4.427
                                C74.77,35.599,75.581,33.439,75.581,31.172z"/>
                        </g>
                        </svg>
                </div>

                <div class="modal-movie-download">
                    <a href="'.$p720.'" class="movie-modal-btn">Download</a>
                </div>
            </div>
                ';
            } else {
                echo '';
            }
            // 3
            if($p1080 != "") {
                echo '
                <div class="movie-modal-element">
                <div class="movie-svg">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="100%" height="100%" viewBox="0 0 130.999 81" enable-background="new 0 0 130.999 81" xml:space="preserve">
                        <g>
                            <path fill="#DBDBDB" d="M131.101,72c0,0.324-0.684,1-1,1h-129c-0.316,0-1-0.676-1-1V1c0-0.324,0.684-1,1-1h128.798
                                c0.316,0,1.201,0.887,1.201,1.212V72z M127.101,4h-123v65h123V4z M65.602,70.73h-1.203v1.212h1.203V70.73z M65.278,0.499
                                c-0.07,0-0.127,0.058-0.127,0.131c0,0.071,0.057,0.13,0.127,0.13s0.127-0.059,0.127-0.13C65.405,0.557,65.348,0.499,65.278,0.499z
                                M65.948,0.563c-0.035,0-0.064,0.029-0.064,0.066c0,0.036,0.029,0.065,0.064,0.065s0.064-0.029,0.064-0.065
                                C66.012,0.593,65.983,0.563,65.948,0.563z"/>
                            <path fill="#DBDBDB" d="M68.103,77h-6.001v-4h6.001V77z"/>
                            <path fill="#DBDBDB" d="M79.101,81h-29v-4h29V81z"/>
                        </g>
                        <g>
                            <path fill="#CCCCCC" d="M38.921,45.792h-3.833V33.537h-4.75v-2.888c2.672,0.054,5.128-0.864,5.533-3.752h3.05V45.792z"/>
                            <path fill="#CCCCCC" d="M48.804,26.519c3.779,0,6.964,2.375,6.964,9.745c0,7.531-3.185,9.906-6.964,9.906
                                c-3.725,0-6.91-2.375-6.91-9.906C41.894,28.895,45.079,26.519,48.804,26.519z M48.804,43.012c3.131,0,3.131-4.616,3.131-6.748
                                c0-1.971,0-6.586-3.131-6.586c-3.077,0-3.077,4.616-3.077,6.586C45.727,38.396,45.727,43.012,48.804,43.012z"/>
                            <path fill="#CCCCCC" d="M63.87,26.519c4.697,0,6.317,3.239,6.317,5.075c0,1.862-0.972,3.374-2.754,3.968v0.054
                                c2.24,0.513,3.536,2.24,3.536,4.616c0,3.968-3.563,5.938-7.072,5.938c-3.644,0-7.18-1.836-7.18-5.912
                                c0-2.402,1.35-4.103,3.563-4.643v-0.054c-1.835-0.513-2.78-2.024-2.78-3.887C57.5,28.273,60.793,26.519,63.87,26.519z
                                M63.897,43.281c1.835,0,3.239-1.295,3.239-3.185c0-1.809-1.458-3.023-3.239-3.023c-1.863,0-3.347,1.053-3.347,2.996
                                S62.062,43.281,63.897,43.281z M63.87,34.509c1.566,0,2.834-0.864,2.834-2.483c0-0.972-0.459-2.619-2.834-2.619
                                c-1.539,0-2.888,0.945-2.888,2.619C60.982,33.672,62.332,34.509,63.87,34.509z"/>
                            <path fill="#CCCCCC" d="M78.828,26.519c3.779,0,6.965,2.375,6.965,9.745c0,7.531-3.186,9.906-6.965,9.906
                                c-3.725,0-6.91-2.375-6.91-9.906C71.918,28.895,75.104,26.519,78.828,26.519z M78.828,43.012c3.132,0,3.132-4.616,3.132-6.748
                                c0-1.971,0-6.586-3.132-6.586c-3.077,0-3.077,4.616-3.077,6.586C75.751,38.396,75.751,43.012,78.828,43.012z"/>
                            <path fill="#CCCCCC" d="M87.822,31.837h3.644v1.781h0.054c0.918-1.484,2.43-2.159,4.157-2.159c4.373,0,6.344,3.536,6.344,7.504
                                c0,3.725-2.052,7.207-6.128,7.207c-1.674,0-3.266-0.729-4.184-2.105h-0.054v6.641h-3.833V31.837z M98.188,38.855
                                c0-2.213-0.892-4.508-3.348-4.508c-2.51,0-3.32,2.24-3.32,4.508c0,2.267,0.864,4.426,3.348,4.426
                                C97.377,43.281,98.188,41.122,98.188,38.855z"/>
                        </g>
                        </svg>
                </div>

                <div class="modal-movie-download">
                    <a href="'.$p1080.'" class="movie-modal-btn">Download</a>
                </div>
            </div>
                ';
            } else {
                echo '';
            }
            // 4
            if($k4 != "") {
                echo '
                <div class="movie-modal-element">
                <div class="movie-svg">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 100.999 66" enable-background="new 0 0 100.999 66" xmlns="http://www.w3.org/2000/svg">
                        <g>
                        <g>
                            <path fill="#DBDBDB" d="M99.795,0H1C0.683,0,0,0.676,0,1v56c0,0.324,0.683,1,1,1h46v4H35v4h28.999v-4H53v-4h46.999 c0.316,0,1-0.676,1-1V1.212C100.999,0.887,100.113,0,99.795,0z M50.846,0.563c0.036,0,0.064,0.029,0.064,0.066 s-0.028,0.066-0.064,0.066c-0.035,0-0.064-0.03-0.064-0.066S50.811,0.563,50.846,0.563z M50.176,0.499 c0.071,0,0.128,0.058,0.127,0.13c0,0.071-0.057,0.13-0.127,0.13c-0.07,0-0.127-0.058-0.127-0.13 C50.049,0.557,50.106,0.499,50.176,0.499z M49.298,56.942V55.73H50.5v1.212H49.298z M96.999,54H4V4h92.999V54z"/>
                        </g>
                        </g>
                        <g>
                        <text style="fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 27.5px; font-weight: 700; letter-spacing: 1px; white-space: pre; opacity: 0.2;" x="14.118" y="27.725" dx="18.558 -0.401" dy="9.993 0.471">4k</text>
                        <text style="white-space: pre; fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 3.3px;" x="27.765" y="26.667"> </text>
                        </g>
                    </svg>
                </div>

                <div class="modal-movie-download">
                    <a href="'.$k4.'" class="movie-modal-btn">Download</a>
                </div>
            </div>
                ';
            } else {
                echo '';
            }
            // 5
            if($hdcam != "") {
                echo '
                <div class="movie-modal-element">
                <div class="movie-svg">
                    <svg version="1.1" id="Layer_1" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 100.999 66" enable-background="new 0 0 100.999 66" xmlns="http://www.w3.org/2000/svg">
                            <g>
                        <g>
                          <path fill="#DBDBDB" d="M99.795,0H1C0.683,0,0,0.676,0,1v56c0,0.324,0.683,1,1,1h46v4H35v4h28.999v-4H53v-4h46.999 c0.316,0,1-0.676,1-1V1.212C100.999,0.887,100.113,0,99.795,0z M50.846,0.563c0.036,0,0.064,0.029,0.064,0.066 s-0.028,0.066-0.064,0.066c-0.035,0-0.064-0.03-0.064-0.066S50.811,0.563,50.846,0.563z M50.176,0.499 c0.071,0,0.128,0.058,0.127,0.13c0,0.071-0.057,0.13-0.127,0.13c-0.07,0-0.127-0.058-0.127-0.13 C50.049,0.557,50.106,0.499,50.176,0.499z M49.298,56.942V55.73H50.5v1.212H49.298z M96.999,54H4V4h92.999V54z"/>
                        </g>
                      </g>
                      <g>
                        <text style="fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 27.5px; font-weight: 700; letter-spacing: 1px; white-space: pre; opacity: 0.2;" x="3.965" y="27.069" dx="-0.501 -0.401 -1.648 -1.176" dy="10.281 0.471 -0.235 -0.117" transform="matrix(0.906051, 0, 0, 0.968455, 3.385043, 0.392292)">HDcam</text>
                        <text style="white-space: pre; fill: rgb(51, 51, 51); font-family: Arial, sans-serif; font-size: 3.3px;" x="27.765" y="26.667"> </text>
                      </g>
                    </svg>
                </div>

                <div class="modal-movie-download">
                    <a href="'.$hdcam.'" class="movie-modal-btn">Download</a>
                </div>
            </div>
                ';
            } else {
                echo '';
            }
        ?>    
    </div>
    <a href="#" rel="modal:close" class="modal-movie-close">Close</a>
</div>

    <div class="disqus-comments1"><div id="disqus_thread"></div></div>
    <div class="ads">
    <!--<h5>Ad</h5>-->
        <div>
<!--            <script type="text/javascript">-->
<!--	atOptions = {-->
<!--		'key' : 'dfb0f9f4de562e49aa2ade8e84309eb2',-->
<!--		'format' : 'iframe',-->
<!--		'height' : 60,-->
<!--		'width' : 468,-->
<!--		'params' : {}-->
<!--	};-->
<!--	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/dfb0f9f4de562e49aa2ade8e84309eb2/invoke.js"></scr' + 'ipt>');-->
<!--</script>-->
<!--            <script type="text/javascript">-->
<!--	atOptions = {-->
<!--		'key' : 'dfb0f9f4de562e49aa2ade8e84309eb2',-->
<!--		'format' : 'iframe',-->
<!--		'height' : 60,-->
<!--		'width' : 468,-->
<!--		'params' : {}-->
<!--	};-->
<!--	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://argondenial.com/dfb0f9f4de562e49aa2ade8e84309eb2/invoke.js"></scr' + 'ipt>');-->
<!--</script>-->
        </div>
    </div>
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

    <?php
        include '../partials/footer.html';
        include '../partials/footer-scripts.php';
    ?>

    
<script>
        /* $(document).ready(function() {
            document.title = $('h1:first').text() + ' | Fast Movies Download';
        }); */
    </script>

    

</body>
</html>




 
