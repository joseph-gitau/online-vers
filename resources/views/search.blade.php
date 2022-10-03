{{-- <div class="w-36 my-4 h-38">
    <div class="w-10/12 m-auto h-32">
        <img src="/assets/movies/parallels.jpg" alt="Parrallels" class="w-9/12 m-auto h-auto border rounded ">
        <h2 class="dark:text-white">Movie name</h2>
    </div>
</div> --}}
<?php
//  print_r($movies);
/* $test = $name[0]->movie_name;
 echo $test; */
/* echo '<h1>new line</h1>';
print_r($series); */
?>
{{-- limit 8 results --}}
<?php $i = 0; ?>
@foreach ($movies as $movie)
    <?php
    $i++;
    if ($i == 8) {
        break;
    }
    // old movie id
    /* $sid = $movie['id'];
                    $server = "31.22.4.240";
                    $username = "fastmovi_burt";
                    $password = "zy;?f9lDgBUM";
                    $dbname = "fastmovi_epiz_28351378_fastMovies";
                    
                    $conn = mysqli_connect($server, $username, $password, $dbname);
                    $sql = "SELECT * FROM newfastmovies WHERE movie_id = $sid";
                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $link = $row['a_id'];
                    } */
    $oldname = $movie['title'];
    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
    ?>
    {{-- <br />
    <h4>MOVIE++{{ $movie->movie_name }}</h4> --}}
    <a href="/movies/{{ $movie['init_id'] }}-{{ $newname }}">
        <div class="w-36 my-4 h-38">
            <div class="w-10/12 m-auto h-32">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                    class="w-9/12 m-auto h-28 border rounded ">
                <h2 class="dark:text-white class">{{ $movie['title'] }}</h2>
            </div>
        </div>
    </a>
@endforeach
@foreach ($series as $serie)
    <?php
    if ($i == 8) {
        break;
    }
    // filterd name
    $oldname1 = $serie['name'];
    $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
    ?>
    {{-- <br />
    <h4>SERIE+++{{ $serie->s_name }}</h4> --}}
    <a href="/series/{{ $serie['init_id'] }}-{{ $newname1 }}">
        <div class="w-36 my-4 h-38">
            <div class="w-10/12 m-auto h-32">
                <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}" alt="{{ $serie['name'] }}"
                    class="w-9/12 m-auto h-28 border rounded ">
                <h2 class="dark:text-white class">{{ $serie['name'] }}</h2>
            </div>
        </div>
    </a>
    <?php $i++; ?>
@endforeach
<?php
if ($movies == null && $series == null) {
    echo '<h1 class="w-full p-6 dark:text-white text-base">No results found! check your spelling and try again.</h1>';
}
?>
