<?php 
//sitemap.php
$connect = mysqli_connect("31.22.4.240", "fastmovi_burt", "zy;?f9lDgBUM", "fastmovi_epiz_28351378_fastMovies");


/* $server = "";
$server = "31.22.4.240";
$username = "fastmovi_burt";
$password = "zy;?f9lDgBUM";
$dbname = "fastmovi_epiz_28351378_fastMovies"; */
$query = "SELECT * FROM newfastmovies ORDER BY a_id DESC";

$result = mysqli_query($connect, $query);

$base_url = "https://fastmovies1.com/movies/";


header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

while($row = mysqli_fetch_array($result))

{
 echo '<url>' . PHP_EOL;
//  echo '<loc> '.$base_url. 'viewDetails2?phpVariable='.$row["a_id"]. ' &submit=</loc>' . PHP_EOL;
 echo '<loc>'.$base_url. $row["a_id"].'-'.preg_replace('/[^A-Za-z0-9\-]/', '-', $row['movie_name']).'</loc>' . PHP_EOL;
 echo '<lastmod>2022-08-03T14:37:03Z</lastmod>' . PHP_EOL;
 echo '<changefreq>weekly</changefreq>' . PHP_EOL;
 echo '<priority>0.80</priority>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}
$base_url1 = "https://fastmovies1.com/series/";
$query1 = "SELECT * FROM series ORDER BY a_id DESC";
$result1 = mysqli_query($connect, $query1);
while($rows = mysqli_fetch_array($result1)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url1. $rows["a_id"].'-'.preg_replace('/[^A-Za-z0-9\-]/', '-', $rows['s_name']).'</loc>' . PHP_EOL;
    echo '<lastmod>2022-08-03T14:37:03Z</lastmod>' . PHP_EOL;
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    echo '<priority>0.80</priority>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
// nw
$base_url2 = "https://fastmovies1.com/series/download/";
$query2 = "SELECT * FROM series ORDER BY a_id DESC";
$result2 = mysqli_query($connect, $query2);
while($rows2 = mysqli_fetch_array($result2)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url2. $rows2["a_id"].'-'.preg_replace('/[^A-Za-z0-9\-]/', '-', $rows2['s_name']).'</loc>' . PHP_EOL;
    echo '<lastmod>2022-08-03T14:37:03Z</lastmod>' . PHP_EOL;
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    echo '<priority>0.80</priority>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;

?>