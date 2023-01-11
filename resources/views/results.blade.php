@section('meta')
    <meta name="description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Watch/Stream movies online with your preffered qualities  Choose from your preferred quality to download">
    <meta name="keywords"
        content="index of Fastmovies1, Index of movies Fastmovies1, Stream movies online, Watch movies online, Index of tv-series, direct download links Fastmovies, Fastmovies1" />
    <meta property="og:title" content="Fastmovies1 | Index of Movies and TV-series">
    <meta property="og:description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Watch/Stream movies online with your preffered qualities  Choose from your preferred quality to download">
    <meta property="og:url" content="https://fastmovies1.com">
@endsection
@section('title')
    Search results for: {{ $name['term'] }}
@endsection

<x-app-layout>

    <div class="container">
        <div class="flex items-center">
            <h1 class="text-3xl text-500 m-auto my-8 font-bold">Search results for: {{ $name['term'] }}</h1>
        </div>

        <div class="movies w-full p-4">
            <h1 class="text-2xl font-bold my-2">Movies</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                {{-- check if movies is empty --}}
                @if (empty($name['movies']))
                    <h1 class="w-full p-6 dark:text-white text-base">No results found! check your spelling and try
                        again.
                    </h1>
                @endif
                {{-- movie card --}}
                @foreach ($name['movies'] as $movie)
                    <?php
                    $oldname = $movie['title'];
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    $link_no = $movie['init_id'];
                    ?>
                    <div class="mcard">
                        <div class="mcard__img">
                            <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                                alt="{{ $movie['title'] }}">
                        </div>
                        <div class="mcard__info">
                            <h2 class="mcard__title hover:text-500 duration-300 underline"><a
                                    href="/movies/{{ $link_no }}-{{ $newname }}">{{ $movie['title'] }}</a>
                            </h2>
                            <div class="mcard__year text-sm">
                                <span class="mcard__year__date">{{ $movie['release_date'] }}</span>
                            </div>
                            <div class="mcard__rating">
                                <span class="mcard__rating__star">⭐</span>
                                <span class="mcard__rating__score">{{ $movie['vote_average'] }}</span>
                            </div>
                            <div class="mcard__genres">
                                <span class="mcard__genres__genre">
                                    @foreach ($movie['genres'] as $genre)
                                        {{ $genre['name'] }},
                                    @endforeach
                                </span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- pagination bottom --}}
        {{-- <div class="w-full md:w-full lg:w-9/12 m-auto py-6">
            {{ $name['pag_movies']->links('pagination::tailwind') }}
        </div> --}}
        <div class="series w-full p-4">
            <h1 class="text-2xl font-bold my-2">Series</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                {{-- check if series is empty --}}
                @if (empty($name['series']))
                    <h1 class="w-full p-6 dark:text-white text-base">No results found! check your spelling and try
                        again.
                    </h1>
                @endif
                {{-- series card --}}
                @foreach ($name['series'] as $serie)
                    <?php
                    $oldname = $serie['name'];
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    $link_no = $serie['init_id'];
                    ?>
                    <div class="mcard">
                        <div class="mcard__img">
                            <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}"
                                alt="{{ $serie['name'] }}">
                        </div>
                        <div class="mcard__info">
                            <h2 class="mcard__title hover:text-500 duration-300 underline"><a
                                    href="/series/{{ $link_no }}-{{ $newname }}">{{ $serie['name'] }}</a>
                            </h2>
                            <div class="mcard__year text-sm">
                                <span class="mcard__year__date">{{ $serie['first_air_date'] }}</span>
                            </div>
                            <div class="mcard__rating">
                                <span class="mcard__rating__star">⭐</span>
                                <span class="mcard__rating__score">{{ $serie['vote_average'] }}</span>
                            </div>

                            <div class="mcard__genres">
                                <span class="mcard__genres__genre">
                                    @foreach ($serie['genres'] as $genre)
                                        {{ $genre['name'] }},
                                    @endforeach
                                </span>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- pagination bottom --}}
        {{-- <div class="w-full md:w-full lg:w-9/12 m-auto py-6 pagination">
            {{ $name['pag_series']->links('pagination::tailwind') }}
        </div> --}}
    </div>

    {{-- push scripts --}}
    @push('scripts')
        <script></script>
    @endpush
</x-app-layout>
