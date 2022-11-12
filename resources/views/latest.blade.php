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
    {{-- display latest movies or series buttons --}}
    <div class="w-full bg-gradient-to-bl to-gray-200 from-gray-100 dark:to-slate-900 dark:from-slate-600 p-6">
        <button type="button"
            class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            id="latmov">Latest
            movies</button>
        <button type="button"
            class="text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            id="latser">Latest
            series</button>
    </div>
    <div
        class="latmov w-full lg:w-11/12 m-auto bg-gradient-to-bl from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600">
        <div class="flex flex-wrap my-4 w-full lg:w-11/12 m-auto">
            <div class="w-2/4 lg:w-2/4 m-auto my-2 pl-2">
                <i class="fas fa-star text-500 text-xl"></i>
                <span class="text-500 text-base">Latest Movies</span>
            </div>
            <div class="w-2/4 lg:w-2/4 m-auto my-4 lg:relative">
                <h5 class="lg:absolute lg:right-0 dark:text-white">Request movies
                    <a href="/contact" class="hover:text-600 text-sm mx-1 lg:mr-6 text-500 ">here.</a>
                </h5>
            </div>
        </div>

        <hr>
        <h1 class="text-xl pl-8 py-6 lg:ml-5 ">Latest movies </h1>
        <div
            class="h-42 flex flex-wrap w-full bg-gradient-to-br from-gray-200 to-gray-100 dark:from-slate-900 dark:to-slate-600 py-6">
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
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 lg:hover:scale-110">
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
        {{-- nw --}}
        <hr>
        <h1 class="text-xl pl-6 my-3 lg:ml-5 ">Latest movies uploads</h1>
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
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 lg:hover:scale-110">
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
        {{-- nw --}}
        <div class="latser flex flex-wrap my-4 w-full lg:w-11/12 m-auto">
            <div class="w-2/4 lg:w-2/4 m-auto my-2">
                <i class="fas fa-star text-500 text-xl"></i>
                <span class="text-500 text-base">Latest Series</span>
            </div>
            <div class="w-2/4 lg:w-2/4 m-auto my-4 relative">
                <h5 class="lg:absolute lg:right-0 dark:text-white">Request series
                    <a href="/contact" class="hover:text-600 text-sm mx-2 lg:mr-6 text-500 ">here.</a>
                </h5>
            </div>
        </div>
        <hr>
        <h1 class="text-xl pl-6 my-3 lg:ml-5 ">Latest series uploads</h1>
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
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 lg:hover:scale-110">
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
        <h1 class="text-xl pl-6 my-3 lg:ml-5 ">Latest series</h1>
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
                            class="w-11/12 m-auto border-2 border-gray-900 dark:border-white rounded shadow-lg transform transition duration-500 lg:hover:scale-110">
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
    {{-- scroll to top --}}
    <div
        class="top scroll fixed bottom-5 right-10 w-14 h-14 rounded-full border-2 border-500 flex justify-center items-center bg-500 hover:bg-600 cursor-pointer">
        <i class="fas fa-angle-double-up text-3xl font-bold text-white"></i>
    </div>
    @push('styles')
        <style>
            .active-btn {
                text-decoration: underline;
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            // get the #latmov button
            const latmov = $('#latmov');
            // get the #latser button
            const latser = $('#latser');
            // onclick event for latmov
            latmov.on('click', function() {
                // scroll to the latmov section
                $('html, body').animate({
                    scrollTop: $(".latmov").offset().top
                }, 1000);
            });
            // onclick event for latser
            latser.on('click', function() {
                // scroll to the latser section
                $('html, body').animate({
                    scrollTop: $(".latser").offset().top
                }, 1000);
            });
            // scroll to top
            $('.top').on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
            });
            // check if the user has scrolled down
            $(window).scroll(function() {
                // if the user has scrolled down
                if ($(this).scrollTop() > 100) {
                    // show the scroll to top button
                    $('.top').fadeIn();
                } else {
                    // hide the scroll to top button
                    $('.top').fadeOut();
                }
            });
        </script>
    @endpush
</x-app-layout>
