<?php
$actual_link = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
@section('meta')
    <meta name="description"
        content="Index of {{ $name['name'] }}. Release year: {{ $name['first_air_date'] }}. Genres: 
        @foreach ($name['genres'] as $genre)
            {{ $genre['name'] }}, @endforeach
        
        . Find download links for all seasons, with multiple qualities and free download.">
    <meta name="keywords"
        content="{{ $name['name'] }} series download,index of {{ $name['name'] }},{{ $name['name'] }} all seasons">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Index of {{ $name['name'] }} {{ $name['first_air_date'] }} direct download links - Fastmovies1">
    <meta property="og:description"
        content="Genre: @foreach ($name['genres'] as $genre)
            {{ $genre['name'] }}, @endforeach. Download all seasons with direct download links...preferred quality.">
    <meta property="og:image:secure_url" itemprop="image"
        content="https://image.tmdb.org/t/p/w500{{ $name['poster_path'] }}">
    <meta property="og:url" content="{{ $actual_link }}">
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/progress_circle/progresscircle.css') }}" />
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/progress_circle/progresscircle.js') }}"></script>
@endsection
@section('title')
    Index of {{ $name['name'] }} download
@endsection
<x-app-layout>
    {{-- loader component --}}
    {{-- <livewire:loader /> --}}
    {{-- loader component --}}
    <div class="container w-full h-auto">
        {{-- main container --}}
        <div class="w-full lg:w-3/4">

            {{-- main series image --}}
            <div class="w-full h-auto min-h-58">
                <img src="https://image.tmdb.org/t/p/w780{{ $name['backdrop_path'] }}" alt="{{ $name['name'] }}"
                    class="w-full h-auto max-h-[70vh] border border-2 border-gray-900 rounded dark:border-white border-t-0">
            </div>
            {{-- series details --}}
            <div class="w-11/12 m-auto py-6">
                <ul class="list-[upper-roman]">
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;

                        <p><b>Index of </b> {{ $name['name'] }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Genre &nbsp;</b>
                        <p>
                            @foreach ($name['genres'] as $genre)
                                {{ $genre['name'] }},
                            @endforeach
                        </p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Release year &nbsp;</b>
                        <p>{{ $name['first_air_date'] }}</p>
                    </li>
                    <?php
                    $no = round($name['vote_average'] * 10);
                    ?>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <div class="my-auto">
                            <i class="fa fa-arrow-circle-right text-500 font-sm " aria-hidden="true"></i>&nbsp;&nbsp;
                            <b>User score: &nbsp;</b>
                        </div>

                        <p id="demo">
                        <div class="circlechart w-14 my-auto dark:text-white text-base bg-white border border-2 border-white rounded-[36px] "
                            data-percentage="{{ $no }}"></div>
                        </p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Synopsis &nbsp;</b>
                        <p>&nbsp;{{ $name['overview'] }}</p>
                    </li>
                </ul>
            </div>


            {{-- rating test --}}

            {{-- <div id="demo">
                <div class="circlechart w-24" data-percentage="{{ $no }}"></div>
                <div class="circlechart" data-percentage="30">Script</div>
                <div class="circlechart" data-percentage="65">.Net</div>
                <div class="circlechart" data-percentage="75"></div>
            </div> --}}
            {{-- /rating test --}}


            {{-- download button --}}
            <?php
            $oldname = $name['name'];
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            ?>
            <div class="w-11/12 m-auto flex mb-6">
                <button class="border rounded py-2 px-4 bg-600 text-base text-white dark:text-white"><a
                        href="/series/download/{{ $name['init_id'] }}-{{ $newname }}">Go to download</a>
                </button>
            </div>
            {{-- similar series --}}
            <div class="w-11/12 m-auto my-6">
                <div class="text-xl dark:text-white my-4">
                    <span>Similar Series</span>
                </div>
                <div
                    class="flex flex-row w-11/12 m-auto overflow-x-auto scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-blue-300 scrollbar-thumb-rounded-full scrollbar-track-rounded-full pb-4">
                    {{-- @for ($i = 0; $i < 3; $i++)
                        <div class="w-full lg:w-4/12">
                            <a href="#">
                                <div class="w-full my-4 lg:w-56 border-2 border-gray-800 rounded">
                                    <img src="/assets/series/large/green.jpg" alt="parallels"
                                        class="w-full lg:w-56 h-auto m-auto">
                                    <div class="flex flex-col content-center">
                                        <span class="w-2/4 m-auto">genre</span>
                                        <span class="w-2/4 m-auto">series name</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor --}}
                    @foreach ($similar as $item)
                        <?php
                        $oldname1 = $item['name'];
                        $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                        ?>
                        <div class="w-[45%] lg:w-4/12 mr-2 lg:m-0 flex-shrink-0">
                            <a href="/series/{{ $item['init_id'] }}-{{ $newname1 }}">
                                <div class="w-full my-2 lg:w-56 border-2 border-gray-800 rounded dark:border-white">
                                    <img src="https://image.tmdb.org/t/p/w500{{ $item['poster_path'] }}"
                                        alt="{{ $item['name'] }}" class="w-full lg:w-56 h-auto max-h-56 m-auto">
                                    <hr>
                                    <div class="flex flex-col content-center">
                                        <span class="w-10/12 dark:text-white m-auto">
                                            @foreach ($item['genres'] as $genre)
                                                {{ $genre['name'] }},
                                            @endforeach
                                        </span>
                                        <span class="w-10/12 dark:text-white m-auto">{{ $item['name'] }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- nw actors --}}
            <div class="w-11/12 m-auto pb-8">
                <h1 class="text-bold text-gray-800 text-2xl my-4 underline dark:text-white">Cast</h1>
                <div
                    class="flex flex-row overflow-x-auto scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-blue-300 scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
                    @foreach ($name['credits']['cast'] as $credit => $cre)
                        <?php
                        /* if ($credit == 5) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    break;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } */
                        ?>
                        <div class="w-[45%] md:w-1/3 lg:w-1/5 mr-4 md:mx-auto lg:mx-auto mb-6 flex-shrink-0">
                            <img src="https://image.tmdb.org/t/p/w300{{ $cre['profile_path'] }}"
                                alt="{{ $cre['character'] }}"
                                class="w-36 lg:w-42 h-auto border-2 border-black dark:border-white rounded hover:opacity-60 hover:cursor-pointer duration-300">
                            <h2 class="dark:text-white">{{ $cre['name'] }}</h2>
                            <h3><span class="text-sm italic dark:text-gray-400">as </span>
                                <br> <span class="dark:text-white">{{ $cre['character'] }}</span>
                            </h3>
                        </div>
                    @endforeach
                </div>
                {{-- nw --}}
                <!-- *-rounded-* utilities only work in webkit-based browsers -->
                {{-- <div
                    class="h-32 scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-blue-300 overflow-y-scroll scrollbar-thumb-rounded-full scrollbar-track-rounded-full">
                    <div class="h-64 bg-gray-400"></div>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(".circlechart").circlechart(); // Initialization
</script>
