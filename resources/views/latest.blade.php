@section('meta')
    <meta name="description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Watch/Stream movies online with your preffered qualities  Choose from your preferred quality to download">
    <meta name="keywords"
        content="index of Fastmovies1, Index of movies Fastmovies1, Stream movies online, Watch movies online, Index of tv-series, direct download links Fastmovies, Fastmovies1" />
    <meta property="og:title" content="Fastmovies1 | Index of Movies and TV-series">
    <meta property="og:description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Watch/Stream movies online with your preffered qualities  Choose from your preferred quality to download">
    <meta property="og:url" content="https://fastmovies1.com/latest">
@endsection
@section('title')
    Latest movies and tv-series
@endsection

<x-app-layout>
    <div
        class="w-full lg:w-11/12 m-auto bg-gradient-to-bl from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600">
        <div class="flex flex-wrap my-4 w-11/12 m-auto">
            <div class="w-10/12 lg:w-2/4 m-auto my-2">
                <i class="fas fa-star text-500 text-3xl"></i>
                <span class="text-500 text-xl pl-2">Latest Movies</span>
            </div>
            <div class="w-9/12 lg:w-2/4 m-auto my-4 lg:relative">
                <h5 class="lg:absolute lg:right-0 dark:text-white">Request a movie
                    <a href="/contact" class="hover:text-600 text-base mx-2 lg:mr-6 text-500 ">here.</a>
                </h5>
            </div>
        </div>
        <hr>
        <h1 class="text-xl my-3 lg:ml-5 ">Latest movies uploads</h1>
        <div
            class=" h-42 flex flex-wrap w-full bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600">
            {{-- display 3 test  --}}
            {{-- header Latest movies uploads --}}

            @foreach ($name['uploads'] as $movie)
                <?php
                $oldname = $movie['title'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                ?>
                <div class="w-full lg:w-1/4 m-auto my-4 group" data-aos="zoom-in-up">
                    <a href="/movies/{{ $movie[0]['raw_id'] }}-{{ $newname }}" class="">
                        <div
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 hover:scale-110">
                            <div class="w-full h-64">
                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="movie poster"
                                    class="w-full h-full object-cover">
                            </div>
                            <div
                                class="w-full p-2 bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-700 ">
                                <h3 class="text-sm underline py-2"><b>{{ $movie['title'] }}</b></h3>
                                <p class="text-sm class">{{ $movie['overview'] }}</p>
                                <span class="text-gray-900 dark:text-white text-sm">{{ $movie['release_date'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{-- @for ($i = 0; $i < 8; $i++)
            <div class="w-full lg:w-1/4 m-auto my-4">
                <a href="#">
                    <div class="w-11/12 m-auto border-2 border-white rounded shadow-lg">
                        <div class="w-full h-64">
                            <img src="https://image.tmdb.org/t/p/w500/6CoRTJTmijhBLJTUNoVSUNxZMEI.jpg"
                                alt="movie poster" class="w-full h-full object-cover">
                        </div>
                        <div
                            class="w-full lg:p-2 bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600 ">
                            <h3 class="text-xl">Movie Title</h3>
                            <p class="text-sm class">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Blanditiis, voluptates possimus quia dicta error beatae ex id corrupti voluptatum
                                molestias
                                ducimus tempore non nostrum officia aut earum! Pariatur, commodi impedit!</p>
                            <span class="text-gray text-sm">release year</span>
                        </div>
                    </div>
                </a>
            </div>
        @endfor --}}
        </div>
        <hr>
        <h1 class="text-xl py-6 lg:ml-5 ">Latest movies </h1>
        <div
            class=" h-42 flex flex-wrap w-full bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600 py-6">
            {{-- display 3 test  --}}
            {{-- header Latest movies uploads --}}

            @foreach ($name['latest'] as $movie)
                <?php
                $oldname = $movie['title'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                ?>
                <div class="w-full lg:w-1/4 m-auto my-4 group" data-aos="zoom-in-up">
                    <a href="/movies/{{ $movie[0]['raw_id'] }}-{{ $newname }}" class="">
                        <div
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 hover:scale-110">
                            <div class="w-full h-64">
                                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="movie poster"
                                    class="w-full h-full object-cover">
                            </div>
                            <div
                                class="w-full lg:p-2 bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-700 ">
                                <h3 class="text-sm underline py-2"><b>{{ $movie['title'] }}</b></h3>
                                <p class="text-sm class">{{ $movie['overview'] }}</p>
                                <span class="text-gray-900 dark:text-white text-sm">{{ $movie['release_date'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="flex flex-wrap my-4 w-11/12 m-auto">
            <div class="w-10/12 lg:w-2/4 m-auto my-2">
                <i class="fas fa-star text-500 text-3xl"></i>
                <span class="text-500 text-xl pl-2">Latest Series</span>
            </div>
            <div class="w-9/12 lg:w-2/4 m-auto my-4 relative">
                <h5 class="lg:absolute lg:right-0 dark:text-white">Request a serie
                    <a href="/contact" class="hover:text-600 text-base mx-2 lg:mr-6 text-500 ">here.</a>
                </h5>
            </div>
        </div>
        <hr>
        <h1 class="text-xl my-3 lg:ml-5 ">Latest series uploads</h1>
        <div
            class=" h-42 flex flex-wrap w-full bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600 py-6">
            {{-- display 3 test  --}}
            {{-- header Latest movies uploads --}}

            @foreach ($name['latseries'] as $serie)
                <?php
                $oldname = $serie['name'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                ?>
                <div class="w-full lg:w-1/4 m-auto my-4 group" data-aos="zoom-in-up">
                    <a href="/series/{{ $serie[0]['raw_id'] }}-{{ $newname }}" class="">
                        <div
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 hover:scale-110">
                            <div class="w-full h-64">
                                <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}"
                                    alt="{{ $serie['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div
                                class="w-full lg:p-2 bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-700 ">
                                <h3 class="text-sm underline py-2"><b>{{ $serie['name'] }}</b></h3>
                                <p class="text-sm class">{{ $serie['overview'] }}</p>
                                <span
                                    class="text-gray-900 dark:text-white text-sm">{{ $serie['first_air_date'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
        <h1 class="text-xl my-3 lg:ml-5 ">Latest series</h1>
        <div
            class=" h-42 flex flex-wrap w-full bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600 py-6">
            {{-- display 3 test  --}}
            {{-- header Latest movies uploads --}}

            @foreach ($name['series'] as $serie)
                <?php
                $oldname = $serie['name'];
                $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                ?>
                <div class="w-full lg:w-1/4 m-auto my-4 group" data-aos="zoom-in-up">
                    <a href="/series/{{ $serie[0]['raw_id'] }}-{{ $newname }}" class="">
                        <div
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 hover:scale-110">
                            <div class="w-full h-64">
                                <img src="https://image.tmdb.org/t/p/w500{{ $serie['poster_path'] }}"
                                    alt="{{ $serie['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div
                                class="w-full lg:p-2 bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-700 ">
                                <h3 class="text-sm underline py-2"><b>{{ $serie['name'] }}</b></h3>
                                <p class="text-sm class">{{ $serie['overview'] }}</p>
                                <span
                                    class="text-gray-900 dark:text-white text-sm">{{ $serie['first_air_date'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
