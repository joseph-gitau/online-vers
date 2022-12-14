<!-- site's sitemap generator -->
<!-- version: 0.1 -->
<?php
//sitemap.php
$connect = mysqli_connect("localhost", "root", "", "fastmovi_epiz_28351378_fastmovies_localv2");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM newfastmovies ORDER BY a_id DESC";

$result = mysqli_query($connect, $query);

$base_url = "https://fastmovies1.com/";
// return time stamp now in w3c format

header("Content-Type: application/xml; charset=utf-8");
header("Content-Type: text/html; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

// sitemap with varrying priority
/* echo '<url>' . PHP_EOL;
echo '<loc>https://fastmovies1.com/</loc>' . PHP_EOL;
echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
echo '<changefreq>daily</changefreq>' . PHP_EOL;
echo '<priority>1.0</priority>' . PHP_EOL;
echo '</url>' . PHP_EOL;

echo '<url>' . PHP_EOL;
echo '<loc>https://fastmovies1.com/latest</loc>' . PHP_EOL;
echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
echo '<changefreq>daily</changefreq>' . PHP_EOL;
echo '<priority>1.0</priority>' . PHP_EOL;
echo '</url>' . PHP_EOL;

echo '<url>' . PHP_EOL;
echo '<loc>https://fastmovies1.com/series</loc>' . PHP_EOL;
echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
echo '<changefreq>daily</changefreq>' . PHP_EOL;
echo '<priority>1.0</priority>' . PHP_EOL;
echo '</url>' . PHP_EOL;

echo '<url>' . PHP_EOL;
echo '<loc>https://fastmovies1.com/series/latest</loc>' . PHP_EOL;
echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
echo '<changefreq>daily</changefreq>' . PHP_EOL;
echo '<priority>1.0</priority>' . PHP_EOL;
echo '</url>' . PHP_EOL; */

// load all the movies from the database and generate the sitemap for them with varying priority
while ($row = mysqli_fetch_array($result)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . $row["a_id"] . '-' . preg_replace('/[^A-Za-z0-9\-]/', '-', $row['movie_name']) . '</loc>' . PHP_EOL;
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    echo '<priority>0.80</priority>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}

$base_url1 = "https://fastmovies1.com/series/";
$query1 = "SELECT * FROM series ORDER BY a_id DESC";
$result1 = mysqli_query($connect, $query1);
while ($rows = mysqli_fetch_array($result1)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url1 . $rows["a_id"] . '-' . preg_replace('/[^A-Za-z0-9\-]/', '-', $rows['s_name']) . '</loc>' . PHP_EOL;
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    echo '<priority>0.80</priority>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
// nw
$base_url2 = "https://fastmovies1.com/series/download/";
$query2 = "SELECT * FROM series ORDER BY a_id DESC";
$result2 = mysqli_query($connect, $query2);
while ($rows2 = mysqli_fetch_array($result2)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url2 . $rows2["a_id"] . '-' . preg_replace('/[^A-Za-z0-9\-]/', '-', $rows2['s_name']) . '</loc>' . PHP_EOL;
    echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . PHP_EOL;
    echo '<changefreq>weekly</changefreq>' . PHP_EOL;
    echo '<priority>0.80</priority>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}
echo '</urlset>' . PHP_EOL;
