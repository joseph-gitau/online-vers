<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    {{-- nav v2 --}}
    <hr class="w-10/12 m-auto">
    <div class="hidden md:block lg:block">
        {{-- contents --}}
        <div class="w-10/12 m-auto ">
            <div class="flex justify-between">
                <ul class="inline-flex justify-between my-5">
                    <li class="group cursor-pointer relative" id="category"><a
                            class="inline-flex items-center px-6 py-1 border-b-2 border-transparent text-base leading-5 dark:text-white hover:text-500 hover:border-400 focus:outline-none focus:text-700 focus:border-300 transition ">Category
                            <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>

                        </a>
                        {{-- test --}}
                        <div
                            class="categoryms w-auto m-auto bg-blue-100 hidden group-hover:block absolute left-0 divide-x-2 z-[9999] transition-opacity duration-1000 ease-in opacity-0 group-hover:opacity-100">
                            <div class="md:w-[750px] lg:w-[1000px] m-auto flex flex-row bg-gray-200 dark:bg-slate-600">
                                <div
                                    class="movies w-2/4 bg-gray-200 dark:bg-slate-600 py-4 m-4 border-r-2 border-white">
                                    <h1 class="text-base dark:text-white my-2 w-2/4 m-auto">Movies Categories</h1>
                                    <div class="flex flex-wrap">
                                        {{-- @for ($i = 0; $i < 20; $i++)
                                            <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white "><a
                                                    href="/movies/category/Action"
                                                    class="hover:text-500 duration-500">Action</a>
                                            </span>
                                        @endfor --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white "><a
                                                href="/movies/category/Action"
                                                class="hover:text-500 duration-500">Action
                                                ({{ $catt[0]['action'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Adventure"
                                                class="hover:text-500 duration-500">Adventure
                                                ({{ $catt[1]['adventure'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Animation"
                                                class="hover:text-500 duration-500">Animation
                                                ({{ $catt[2]['animation'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Comedy"
                                                class="hover:text-500 duration-500">Comedy
                                                ({{ $catt[3]['comedy'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Crime" class="hover:text-500 duration-500">Crime
                                                ({{ $catt[4]['crime'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Documentary"
                                                class="hover:text-500 duration-500">Documentary
                                                ({{ $catt[5]['documentary'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Drama" class="hover:text-500 duration-500">Drama
                                                ({{ $catt[6]['drama'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Family"
                                                class="hover:text-500 duration-500">Family
                                                ({{ $catt[7]['family'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Fantasy"
                                                class="hover:text-500 duration-500">Fantasy
                                                ({{ $catt[8]['fantasy'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/History"
                                                class="hover:text-500 duration-500">History
                                                ({{ $catt[9]['history'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Horror"
                                                class="hover:text-500 duration-500">Horror
                                                ({{ $catt[10]['horror'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Music" class="hover:text-500 duration-500">Music
                                                ({{ $catt[11]['music'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Mystery"
                                                class="hover:text-500 duration-500">Mystery
                                                ({{ $catt[12]['mystery'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Romance"
                                                class="hover:text-500 duration-500">Romance
                                                ({{ $catt[13]['romance'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Science-fiction"
                                                class="hover:text-500 duration-500">Science
                                                Fiction(sci-fi)
                                                ({{ $catt[14]['science fiction'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/TV-movie" class="hover:text-500 duration-500">TV
                                                Movie
                                                ({{ $catt[15]['tv movie'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Thriller"
                                                class="hover:text-500 duration-500">Thriller
                                                ({{ $catt[16]['thriller'] }})</a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/War" class="hover:text-500 duration-500">War
                                                ({{ $catt[17]['war'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/movies/category/Western"
                                                class="hover:text-500 duration-500">Western
                                                ({{ $catt[18]['western'] }}) </a>
                                        </span>
                                    </div>

                                </div>
                                <div class="movies w-2/4 bg-gray-200 dark:bg-slate-600  py-4 my-4">
                                    <h1 class="text-base dark:text-white my-2 w-2/4 m-auto">Series Categories</h1>
                                    <div class="flex flex-wrap">
                                        {{-- @for ($i = 0; $i < 20; $i++)
                                            <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white "><a
                                                    href="/movies/category/Action"
                                                    class="hover:text-500 duration-500">Action</a>
                                            </span>
                                        @endfor --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white "><a
                                                href="/series/category/Action"
                                                class="hover:text-500 duration-500">Action
                                                ({{ $scatt[0]['action'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Adventure"
                                                class="hover:text-500 duration-500">Adventure
                                                ({{ $scatt[1]['adventure'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Animation"
                                                class="hover:text-500 duration-500">Animation
                                                ({{ $scatt[2]['animation'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Comedy"
                                                class="hover:text-500 duration-500">Comedy
                                                ({{ $scatt[3]['comedy'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Crime" class="hover:text-500 duration-500">Crime
                                                ({{ $scatt[4]['crime'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Documentary"
                                                class="hover:text-500 duration-500">Documentary
                                                ({{ $scatt[5]['documentary'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Drama"
                                                class="hover:text-500 duration-500">Drama
                                                ({{ $scatt[6]['drama'] }}) </a>
                                        </span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Family"
                                                class="hover:text-500 duration-500">Family
                                                ({{ $scatt[7]['family'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Kids" class="hover:text-500 duration-500">Kids
                                                ({{ $scatt[8]['kids'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Mystery"
                                                class="hover:text-500 duration-500">Mystery
                                                ({{ $scatt[9]['mystery'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/News" class="hover:text-500 duration-500">News
                                                ({{ $scatt[10]['news'] }}) </a></span>
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Reaspanty"
                                                class="hover:text-500 duration-500">Reality
                                                ({{ $scatt[11]['reality'] }}) </a></span>
                                        {{-- sci fi --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Sci-fi"
                                                class="hover:text-500 duration-500">Sci-Fi
                                                ({{ $scatt[12]['scifi'] }}) </a></span>
                                        {{-- fantasy --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Fantasy"
                                                class="hover:text-500 duration-500">Fantasy
                                                ({{ $scatt[13]['fantasy'] }}) </a></span>
                                        {{-- soap --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Soap" class="hover:text-500 duration-500">Soap
                                                ({{ $scatt[14]['soap'] }}) </a></span>
                                        {{-- talk --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Talk" class="hover:text-500 duration-500">Talk
                                                ({{ $scatt[15]['talk'] }}) </a></span>
                                        {{-- war --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/War" class="hover:text-500 duration-500">War
                                                ({{ $scatt[16]['war'] }}) </a></span>
                                        {{-- western --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Western"
                                                class="hover:text-500 duration-500">Western
                                                ({{ $scatt[17]['western'] }}) </a></span>
                                        {{-- pospantics --}}
                                        <span class="border-2 py-2 px-2 border-white mx-1 my-3 dark:text-white"><a
                                                href="/series/category/Politics"
                                                class="hover:text-500 duration-500">Politics
                                                ({{ $scatt[18]['politics'] }}) </a></span>
                                        {{-- end --}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </li>
                    <li><a href="/contact/"
                            class="inline-flex items-center px-6 py-1 border-b-2 border-transparent text-base leading-5 dark:text-white hover:text-500 hover:border-400 focus:outline-none focus:text-700 focus:border-300 transition">Contact
                            us </a>
                    </li>
                    <li><a href="/about/"
                            class="inline-flex items-center px-6 py-1 border-b-2 border-transparent text-base leading-5 dark:text-white hover:text-500 hover:border-400 focus:outline-none focus:text-700 focus:border-300 transition">About
                            us </a>
                    </li>
                </ul>

                {{-- follow on social media --}}
                <div class="flex flex-row justify-between m-auto mr-5">
                    <a href="https://web.facebook.com/Fastmovies11/">
                        <i
                            class="fa fa-facebook bg-transparent rounded-3xl text-xl py-1 px-3 text-[#4267B2] hover:text-500 hover:opacity-90"></i>
                    </a>
                    <a href="https://twitter.com/Fastmovies11/">
                        <i
                            class="fa fa-twitter bg-transparent rounded-3xl text-xl py-1 px-2 text-[#00acee] hover:text-500 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://t.me/fastmovies11/">
                        <i
                            class="fa fa-telegram bg-transparent rounded-3xl text-xl py-1 px-2 text-[#e0cfb1] hover:text-500 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://instagram.com/fastmovies1/">
                        <i
                            class="fa fa-instagram bg-transparent rounded-3xl text-xl py-1 px-2 text-[#3f729b] hover:text-500 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://chat.whatsapp.com/HPXADGL6MjW2Zz7MosgQ4v">
                        <i
                            class="fa fa-whatsapp bg-transparent rounded-3xl text-xl py-1 px-2 text-[#34B7F1] hover:text-500 hover:opacity-90"></i>
                    </a>
                </div>

            </div>
            {{-- end --}}
        </div>
        {{-- tags/categories section --}}
        <div class="categoryms w-10/12 m-auto bg-blue-100 hidden group-hover:block">
            <div class="w-3/4 flex flex-row bg-green-200">
                <div class="movies w-2/4 bg-teal-100">
                    <span>test</span>
                </div>
                <div class="series w-/2/4">
                    <span>test</span>
                </div>
            </div>
        </div>
    </div>
</div>
