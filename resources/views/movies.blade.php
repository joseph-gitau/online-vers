@section('meta')
    <meta name="description"
        content="Index of movies free direct download. Stream/watch movies online. You'll movies direct download links here, with multiple download links and free download.">
    <meta name="keywords"
        content="index of movies download, mkv movies download,movies direct download, free movies download online">
@endsection
@section('title')
    Index of movies free download
@endsection

<x-app-layout>
    <div class="headers">
        <div class="flex items-center">
            <h1 class="text-3xl text-500 m-auto my-8 font-bold">Fastmovies1</h1>
        </div>

        <div class="flex content-center">
            <p class="w-4/5 md:w-3/4 sm:w-3/4 lg:w-3/4 m-auto text-gray-700 text-base dark:text-white my-4">
                Download the latest HD tv series for free. Stream/watch movies online. The newest genres of movies in cinemas can be downloaded
                absolutely free of charge from our website, all genres like action, sci-fi, comedy, drama, horror and
                others.
            </p>
        </div>
    </div>
    <div class="container w-full md:w-full lg:w-5/6 h-auto">
        <div class="flex content-center">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white m-auto">Download latest movies for free</h1>
        </div>

        <div class="lg:w-11/12 w-full h-auto m-auto block">
            {{-- pagination top --}}
            <div class="w-full md:w-full lg:w-9/12 m-auto py-6">
                {{-- <h5>Pagination:</h5> --}}
                {{ $movies->links('pagination::tailwind') }}
            </div>
            {{-- 1st content 8 items --}}
            <div class="w-full lg:w-11/12 m-auto flex flex-wrap">
                {{-- @for ($i = 0; $i < 8; $i++)
                    <livewire:card />
                @endfor --}}
                <?php $count = -1; ?>
                @foreach ($users[0] as $key => $data)
                    <?php
                    $oldname = $data['title'];
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    if ($key == 20) {
                        break;
                    }
                    $count++;
                    // echo $count;
                    $sid = $data['id'];
                    // $conn = new mysqli('31.22.4.240', 'fastmovi_burt', 'zy;?f9lDgBUM', 'fastmovi_epiz_28351378_fastMovies');
                    /* $server = '31.22.4.240';
                                                                                                                                                                                                                                                                                                                                                                                                                $username = 'fastmovi_burt';
                                                                                                                                                                                                                                                                                                                                                                                                                $password = 'zy;?f9lDgBUM';
                                                                                                                                                                                                                                                                                                                                                                                                                $dbname = 'fastmovi_epiz_28351378_fastMovies'; */
                    $server = 'localhost';
                    $username = 'root';
                    $password = '';
                    $dbname = 'fastmovi_epiz_28351378_fastMovies_local';
                    
                    $conn = mysqli_connect($server, $username, $password, $dbname);
                    $sql = "SELECT * FROM newfastmovies WHERE movie_id = $sid";
                    $result = $conn->query($sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $link = $row['a_id'];
                    }
                    
                    ?>
                    {{-- cards --}} 
                    <div class="relative w-36 md:w-52 lg:w-56 group my-4 m-auto" data-aos="zoom-in-up">
                        <img src="https://image.tmdb.org/t/p/w500{{ $data['poster_path'] }}" alt="{{ $data['title'] }}"
                            class="w-48 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black dark:border-white rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                        <span
                            class="absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/4 text-2xl font-bold text-white hidden group-hover:block duration-500">
                            @foreach ($data['genres'] as $genre)
                                {{ $genre['name'] }},
                            @endforeach
                        </span>
                        <a href="/movies/{{ $link }}-{{ $newname }}">
                            <button
                                class="w-32 border rounded-3xl py-1 px-2 md:py-2 lg:py-2 md:px-4 lg:px-4 bg-600 text-base text-white dark:text-white absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-2/3 hidden group-hover:block duration-500">View
                                details</button>
                        </a>
                        <h2 class="text-black dark:text-white text-base font-bold ml-6">{{ $data['title'] }}</h2>
                        <span class="text-gray-900 dark:text-white text-sm ml-6">{{ $data['release_date'] }}</span>

                    </div>
                @endforeach
            </div>

        </div>
        {{-- pagination bottom --}}
        <div class="w-full md:w-full lg:w-9/12 m-auto py-6">
            {{-- <h5>Pagination:</h5> --}}
            {{ $movies->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
