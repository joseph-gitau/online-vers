{{-- X icon --}}
<i class="fas fa-times searchres_close absolute top-0 right-0 z-50 hover:text-red-700 duration-150"
    style="transform: translate(-100%, 50%);" onclick="closeResult()"></i>
<div class="movies mb-2">
    <h2 class="search_head my-1 ml-8 underline ">Movies</h2>
    <div class="flex flex-row flex-wrap">
        @foreach ($movies['movies'] as $movie)
            <?php
            $oldname = $movie['title'];
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            ?>
            <a href="/movies/{{ $movie['init_id'] }}-{{ $newname }}">
                <div class="w-36 my-2 h-38">
                    <div class="w-10/12 m-auto h-32">
                        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                            class="w-9/12 m-auto h-28 border rounded ">
                        <h2 class="dark:text-white class ml-2">{{ $movie['title'] }}</h2>
                        <h4 class="text-gray text-sm ml-2 py-1">{{ $movie['release_date'] }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
{{-- <hr> --}}
<div class="series mb-2">
    <h2 class="search_head my-1 ml-8 underline ">Series</h2>
    <div class="flex flex-row flex-wrap">
        @foreach ($series as $serie)
            <?php
            
            // filterd name
            $oldname1 = $serie['name'];
            $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
            ?>

            <a href="/series/{{ $serie['init_id'] }}-{{ $newname1 }}">
                <div class="w-36 my-2 h-38">
                    <div class="w-10/12 m-auto h-32">
                        <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}" alt="{{ $serie['name'] }}"
                            class="w-9/12 m-auto h-28 border rounded ">
                        <h2 class="dark:text-white class ml-2">{{ $serie['name'] }}</h2>
                        <h4 class="text-gray text-sm ml-2 py-1">{{ $serie['first_air_date'] }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
{{-- show all button --}}
<div class="w-full flex justify-center ">
    <a href="results?q={{ $movies['term'] }}"
        class="w-60 sm:w-52 md:w-56 lg:w-60 bg-500 hover:bg-400 hover:cursor-pointer duration-300 text-white text-center py-2 rounded mt-4">Show
        all</a>
</div>

<?php
if ($movies == null && $series == null) {
    echo '<h1 class="w-full p-6 dark:text-white text-base">No results found! check your spelling and try again.</h1>';
}
?>
