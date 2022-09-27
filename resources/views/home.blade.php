@section('meta')
    <meta name="description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Choose from your preferred quality to download">
    <meta name="keywords"
        content="index of Fastmovies1, Index of movies Fastmovies1, Index of tv-series, direct download links Fastmovies, Fastmovies1" />
    <meta property="og:title" content="Fastmovies1 | Index of Movies and TV-series">
    <meta property="og:description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Choose from your preferred quality to download">
    <meta property="og:url" content="https://fastmovies1.com">
@endsection
@section('title')
    Index of movies and tv-series
@endsection

<x-app-layout>
    {{-- <livewire:loader /> --}}

    {{-- <livewire:dbh /> --}}
    <div class="w-screen">
        <h1 class="text-center text-600 text-2xl py-8">Fastmovies1</h1>
        <p class="w-9/12 md:w-10/12 lg:w-9/12 py-6 text-base m-auto dark:text-white">
            Welcome to Fastmovies1.com. Download the latest movies and series with different qualities: 480p, 720p,
            1080p and 4k for free. The newest genres of movies in cinemas can be downloaded absolutely free of charge
            from our website, all genres like action, sci-fi, comedy, drama, horror and others.
        </p>
    </div>
    <hr class="lg:hidden">
    <div class="flex flex-wrap my-4 w-11/12 m-auto">
        <div class="w-10/12 lg:w-2/4 m-auto my-2">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Popular Movies</span>
        </div>
        <div class="w-9/12 lg:w-2/4 m-auto my-4">
            <h5 class="lg:absolute lg:right-0 dark:text-white">Request a movie
                <a href="/contact" class="text-500 hover:text-600 text-2xl mx-2 lg:mr-6">here.</a>
            </h5>
        </div>
    </div>
    <hr>
    {{-- popular movies --}}
    <div class="flex w-screen md:w-4/5 lg:w-9/12 flex-wrap py-6">
        {{-- echo api results --}}
        @foreach ($users as $user)
            <?php
            $oldname = $user['title'];
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            $sid = $user['id'];
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'fastmovi_epiz_28351378_fastMovies_local';
            /* $server = "31.22.4.240";
                                                                                                                                                                                                                                                                                                                                                                                    $username = "fastmovi_burt";
                                                                                                                                                                                                                                                                                                                                                                                    $password = "zy;?f9lDgBUM";
                                                                                                                                                                                                                                                                                                                                                                                    $dbname = "fastmovi_epiz_28351378_fastMovies"; */
            
            $conn = mysqli_connect($server, $username, $password, $dbname);
            $sql = "SELECT * FROM newfastmovies WHERE movie_id = $sid";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $link = $row['a_id'];
            }
            
            ?>
            <div class="relative w-36 md:w-52 lg:w-56 group m-auto mb-6">
                <img src="https://image.tmdb.org/t/p/w500{{ $user['poster_path'] }}" alt="{{ $user['title'] }}"
                    class="w-36 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black dark:border-white rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                <span
                    class="absolute top-[15%] left-[15%] text-xl font-bold text-white hidden group-hover:block duration-500">
                    @foreach ($user['genres'] as $genre)
                        {{ $genre['name'] }},
                    @endforeach
                </span>
                <a href="/movies/{{ $link }}-{{ $newname }}">
                    <button
                        class="border rounded-3xl py-1 px-2 lg:py-2 lg:px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View
                        details</button>
                </a>
                <h2 class="text-black dark:text-white text-base font-bold ml-2 truncate">{{ $user['title'] }}</h2>
                <span class="text-gray-900 dark:text-white text-sm ml-6">{{ $user['release_date'] }}</span>

            </div>
            {{-- <h1>{{ $user['backdrop_path']}}</h1><br> --}}
        @endforeach
        {{-- <h1>{{ $ret}}</h1> --}}
        {{-- <h1>{{print_r($users);}}</h1><br> --}}
        {{-- <h1>ret ff{{ $users['backdrop_path']}}</h1> --}}


    </div>
    {{-- popular series --}}
    <hr class="lg:hidden">
    <div class="flex flex-wrap my-4 w-11/12 m-auto">
        <div class="w-10/12 lg:w-2/4 m-auto my-2">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Popular Series</span>
        </div>
        <div class="w-9/12 lg:w-2/4 m-auto my-4">
            <h5 class="lg:absolute lg:right-0 dark:text-white">Request a series
                <a href="/contact" class="text-500 hover:text-600 text-2xl mx-2 lg:mr-6">here.</a>
            </h5>
        </div>
    </div>
    {{-- <div class="inline-flex lg:w-9/12 w-screen m-auto relative">
        <div class="inline-flex lg:ml-32">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Popular Series</span>
        </div>
        <h5 class="absolute right-0 dark:text-white">Request a movie <a href="/contact"
                class="text-500 hover:text-600 text-base">here.</a></h5>

    </div> --}}
    <hr>
    <div class="flex w-screen md:w-4/5 lg:w-9/12 flex-wrap py-6">
        {{-- <h1>{{print_r($seriesraw[0]['s_name'])}}</h1><br> --}}
        <?php $tser = 0; ?>
        @foreach ($seriesraw[0] as $serie)
            <?php
            $oldname2 = $serie['name'];
            $newname2 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname2);
            ?>
            <div class="relative w-36 md:w-52 lg:w-56 group m-auto mb-6">
                <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}" alt="{{ $serie['name'] }}"
                    class="w-36 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black dark:border-white rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                <span
                    class="absolute top-[15%] left-[18%] text-2xl font-bold text-white hidden group-hover:block duration-500">
                    @foreach ($serie['genres'] as $genre)
                        {{ $genre['name'] }},
                    @endforeach
                </span>
                <a href="/series/{{ $serie['init_id'] }}-{{ $newname2 }}">
                    <button
                        class="border rounded-3xl py-2 px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View
                        details</button>
                </a>
                <h2 class="text-black dark:text-white text-base font-bold ml-2 truncate">{{ $serie['name'] }}</h2>
                <span class="text-gray-900 dark:text-white text-sm ml-6">{{ $serie['first_air_date'] }}</span>

            </div>
        @endforeach
    </div>
    {{-- upcomingk --}}
    <hr class="lg:hidden">
    <div class="flex flex-wrap my-4 w-11/12 m-auto">
        <div class="w-10/12 lg:w-2/4 m-auto my-2">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Upcoming Movies</span>
        </div>
        <div class="w-10/12 lg:w-2/4 m-auto my-4">
            <h5 class="lg:absolute lg:right-0 dark:text-white">Request a movie/series
                <a href="/contact" class="text-500 hover:text-600 text-2xl mx-2 lg:mr-6">here.</a>
            </h5>
        </div>
    </div>
    <hr>
    {{-- <div class="inline-flex lg:w-9/12 w-screen relative">
        <div class="inline-flex lg:ml-32">
            <i class="fas fa-star text-500 text-3xl"></i>
            <span class="text-500 text-xl pl-2">Upcoming movies</span>
        </div>
        <h5 class="absolute right-0 dark:text-white">Request a movie <a href="/contact"
                class="text-500 hover:text-600 text-base">here.</a></h5>

    </div> --}}
    <div class="flex w-screen md:w-4/5 lg:w-9/12 flex-wrap py-6">

        {{-- <h1>{{print_r($seriesraw)}}</h1><br> --}}
        {{-- <h1>{{print_r($seriesraw[1]['results'][0]['poster_path'][0])}}</h1><br> --}}

        <?php $t = 0; ?>
        @for ($j = 1; $j <= 4; $j++)
            {{-- <h1 class="bg-gray-600 text-base">{{ $users[$t]['poster_path']}}</h1><br> --}}
            <div class="relative w-36 md:w-52 lg:w-56 group m-auto mb-6">
                <img src="https://image.tmdb.org/t/p/w500{{ $seriesraw[1]['results'][$t]['poster_path'] }}"
                    alt="{{ $seriesraw[1]['results'][$t]['title'] }}"
                    class="w-36 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black dark:border-white rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                <?php
                $genre = $seriesraw[1]['results'][$t]['genre_ids'];
                // get genre_ids
                $genes = '';
                if (in_array('28', $genre)) {
                    $genes .= 'Action, ';
                } else {
                    $genes .= '';
                }
                if (in_array('12', $genre)) {
                    $genes .= 'Adventure, ';
                } else {
                    $genes .= '';
                }
                if (in_array('16', $genre)) {
                    $genes .= 'Animation, ';
                } else {
                    $genes .= '';
                }
                if (in_array('35', $genre)) {
                    $genes .= 'Comedy, ';
                } else {
                    $genes .= '';
                }
                if (in_array('80', $genre)) {
                    $genes .= 'Crime, ';
                } else {
                    $genes .= '';
                }
                if (in_array('99', $genre)) {
                    $genes .= 'Documentary, ';
                } else {
                    $genes .= '';
                }
                if (in_array('18', $genre)) {
                    $genes .= 'Drama, ';
                } else {
                    $genes .= '';
                }
                if (in_array('10751', $genre)) {
                    $genes .= 'Family, ';
                } else {
                    $genes .= '';
                }
                if (in_array('14', $genre)) {
                    $genes .= 'Fantasy';
                } else {
                    $genes .= '';
                }
                if (in_array('36', $genre)) {
                    $genes .= 'History, ';
                } else {
                    $genes .= '';
                }
                if (in_array('27', $genre)) {
                    $genes .= 'Horror, ';
                } else {
                    $genes .= '';
                }
                if (in_array('10402', $genre)) {
                    $genes .= 'Music, ';
                } else {
                    $genes .= '';
                }
                if (in_array('9648', $genre)) {
                    $genes .= 'Mystery, ';
                } else {
                    $genes .= '';
                }
                if (in_array('10749', $genre)) {
                    $genes .= 'Romance, ';
                } else {
                    $genes .= '';
                }
                if (in_array('878', $genre)) {
                    $genes .= 'Science Fiction, ';
                } else {
                    $genes .= '';
                }
                if (in_array('10770', $genre)) {
                    $genes .= 'TV Movie, ';
                } else {
                    $genes .= '';
                }
                if (in_array('53', $genre)) {
                    $genes .= 'Thriller, ';
                } else {
                    $genes .= '';
                }
                if (in_array('10752', $genre)) {
                    $genes .= 'War, ';
                } else {
                    $genes .= '';
                }
                if (in_array('37', $genre)) {
                    $genes .= 'Western, ';
                } else {
                    $genes .= '';
                }
                ?>
                <span
                    class="absolute top-[15%] left-[18%] text-2xl font-bold text-white hidden group-hover:block duration-500">{{ $genes }}</span>
                <a href="#">
                    <button
                        class="border rounded-3xl py-2 px-4 bg-600 text-base text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View
                        details</button>
                </a>
                <h2 class="text-black dark:text-white text-base font-bold ml-6">
                    {{ $seriesraw[1]['results'][$t]['title'] }}</h2>
                <span
                    class="text-gray-900 dark:text-white text-sm ml-6">{{ $seriesraw[1]['results'][$t]['release_date'] }}</span>

            </div>

            <?php $t++; ?>
        @endfor
        {{-- {{$ts++;}} --}}
    </div>

</x-app-layout>
