

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .live-box{
            height: 20vh;
            background-color: black;
            display: flex;
            flex-direction: row;
            border: 1px solid #fff;
        }
        .live-box-img{
            width: 40%;
            height: 100%;
        }
        .live-box-img img{
            width: 100%;
            height: 100%;
            margin-right: 15%;
        }
        .FormId{
            width: 50%;
            height: 100%;
            float: right;
            display: flex;
            align-items: center;
            padding-left: 10%;
            font-size: 0.9em;
        }
        .FormId a:hover{
            text-decoration: none;
        }
        /* .FormId a{
            border: none;
            padding: 2vh 1vw 2vh 0;
            background-color: #fff;
            color: #fff;
            margin: 2vh 0 0 5%;
            font-size: 1.1em;
        }
        .FormId a:hover{
            cursor: pointer;
        }
         */
         .no-res{
             color: #fff;
             padding: 20px;
             background-color: black;
         }
        @media screen and (max-width: 767px) {
            .live-box{
                height: 90px;
                width: 70vw;
                margin: auto;
                font-size: 1.2em;
                font-weight: bold;
            }
            .live-box a {
                color: #fff !important;
            }
        }
    </style>
</head>
<body>
<?php

    $server = "31.22.4.240";
    $username = "fastmovi_burt";
    $password = "zy;?f9lDgBUM";
    $dbname = "fastmovi_epiz_28351378_fastMovies";

    $conn = mysqli_connect($server, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_REQUEST["term"])) {
        $searchterm = mysqli_real_escape_string($conn, $_GET['term']);
        // $searchterm = 'the';
        $sql = "SELECT * FROM 45finished WHERE movie_name LIKE '$searchterm%' LIMIT 4";
        $result = mysqli_query($conn, $sql);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $oldname = $row['movie_name'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                echo "    
                        <div class='live-box'>
                        <div class='live-box-img'><img src='/" . $row["movie_image"] . "' alt='img here'>
                        </div>
                        <div class='FormId'>
                        <h3 class='autocomplete'>" . $row["movie_name"] . "</h3>
                        </div>
                            
                        </div>
                        ";
            }
        } else {
            $sql1 = "SELECT * FROM series WHERE s_name LIKE '$searchterm%' LIMIT 4";
            $result1 = mysqli_query($conn, $sql1);

            while ($row1 = mysqli_fetch_array($result1)) {
                $oldname1 = $row1['s_name'];
                $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                echo "    
                    <div class='live-box'>
                    <div class='live-box-img'><img src='/seriesImages/" . $row1["s_img"] . "' alt='img here'>
                    </div>
                    <div class='FormId'>
                    <h3 class='autocomplete'>" . $row1["s_name"] . "</h3>
                    </div>
                        
                    </div>
             
                ";
            }
        }
    }
    ?>
    
    
    
    <script>
        $(".autocomplete").click(function(e) {
            event.preventDefault();
            var plain = $(this).text();
            // console.log(plain);
            $("#search").val(plain);
            $(".live-box").hide();
        });
    </script>
</body>
</html>


