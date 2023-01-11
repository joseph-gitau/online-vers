<div>
    <?php
    use Illuminate\Support\Facades\DB;
    // use DB;
    
    // movies category
    $catt = [];
    // action category
    $mcat_action = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'action' . '%')
        ->count();
    $mcat1['action'] = $mcat_action;
    array_push($catt, $mcat1);
    // adventure category
    $mcat_adventure = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'adventure' . '%')
        ->count();
    $mcat2['adventure'] = $mcat_adventure;
    array_push($catt, $mcat2);
    // animation category
    $mcat_animation = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'animation' . '%')
        ->count();
    $mcat3['animation'] = $mcat_animation;
    array_push($catt, $mcat3);
    // comedy category
    $mcat_comedy = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'comedy' . '%')
        ->count();
    $mcat4['comedy'] = $mcat_comedy;
    array_push($catt, $mcat4);
    // crime category
    $mcat_crime = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'crime' . '%')
        ->count();
    $mcat5['crime'] = $mcat_crime;
    array_push($catt, $mcat5);
    // documentary category
    $mcat_documentary = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'documentary' . '%')
        ->count();
    $mcat6['documentary'] = $mcat_documentary;
    array_push($catt, $mcat6);
    // drama category
    $mcat_drama = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'drama' . '%')
        ->count();
    $mcat7['drama'] = $mcat_drama;
    array_push($catt, $mcat7);
    // family category
    $mcat_family = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'family' . '%')
        ->count();
    $mcat8['family'] = $mcat_family;
    array_push($catt, $mcat8);
    // fantasy category
    $mcat_fantasy = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'fantasy' . '%')
        ->count();
    $mcat9['fantasy'] = $mcat_fantasy;
    array_push($catt, $mcat9);
    // history category
    $mcat_history = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'history' . '%')
        ->count();
    $mcat10['history'] = $mcat_history;
    array_push($catt, $mcat10);
    // horror category
    $mcat_horror = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'horror' . '%')
        ->count();
    $mcat11['horror'] = $mcat_horror;
    array_push($catt, $mcat11);
    // music category
    $mcat_music = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'music' . '%')
        ->count();
    $mcat12['music'] = $mcat_music;
    array_push($catt, $mcat12);
    // mystery category
    $mcat_mystery = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'mystery' . '%')
        ->count();
    $mcat13['mystery'] = $mcat_mystery;
    array_push($catt, $mcat13);
    // romance category
    $mcat_romance = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'romance' . '%')
        ->count();
    $mcat14['romance'] = $mcat_romance;
    array_push($catt, $mcat14);
    // science fiction category
    $mcat_science_fiction = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'science fiction' . '%')
        ->orWhere('genre', 'like', '%' . 'sci-fi' . '%')
        ->count();
    $mcat15['science fiction'] = $mcat_science_fiction;
    array_push($catt, $mcat15);
    // tv movie category
    $mcat_tv_movie = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'tv movie' . '%')
        ->count();
    $mcat16['tv movie'] = $mcat_tv_movie;
    array_push($catt, $mcat16);
    // thriller category
    $mcat_thriller = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'thriller' . '%')
        ->count();
    $mcat17['thriller'] = $mcat_thriller;
    array_push($catt, $mcat17);
    // war category
    $mcat_war = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'war' . '%')
        ->count();
    $mcat18['war'] = $mcat_war;
    array_push($catt, $mcat18);
    // western category
    $mcat_western = DB::table('newfastmovies')
        ->where('genre', 'like', '%' . 'western' . '%')
        ->count();
    $mcat19['western'] = $mcat_western;
    array_push($catt, $mcat19);
    // end of movies category
    // dd($catt);
    
    // series
    
    $scatt = [];
    // action category
    $scat_action = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'action' . '%')
        ->count();
    $scat1['action'] = $scat_action;
    array_push($scatt, $scat1);
    // adventure category
    $scat_adventure = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'adventure' . '%')
        ->count();
    $scat2['adventure'] = $scat_adventure;
    array_push($scatt, $scat2);
    // animation category
    $scat_animation = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'animation' . '%')
        ->count();
    $scat3['animation'] = $scat_animation;
    array_push($scatt, $scat3);
    // comedy category
    $scat_comedy = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'comedy' . '%')
        ->count();
    $scat4['comedy'] = $scat_comedy;
    array_push($scatt, $scat4);
    // crime category
    $scat_crime = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'crime' . '%')
        ->count();
    $scat5['crime'] = $scat_crime;
    array_push($scatt, $scat5);
    // documentary category
    $scat_documentary = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'documentary' . '%')
        ->count();
    $scat6['documentary'] = $scat_documentary;
    array_push($scatt, $scat6);
    // drama category
    $scat_drama = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'drama' . '%')
        ->count();
    $scat7['drama'] = $scat_drama;
    array_push($scatt, $scat7);
    // family category
    $scat_family = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'family' . '%')
        ->count();
    $scat8['family'] = $scat_family;
    array_push($scatt, $scat8);
    // kids category
    $scat_kids = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'kids' . '%')
        ->count();
    $scat9['kids'] = $scat_kids;
    array_push($scatt, $scat9);
    // mystery category
    $scat_mystery = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'mystery' . '%')
        ->count();
    $scat10['mystery'] = $scat_mystery;
    array_push($scatt, $scat10);
    // news category
    $scat_news = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'news' . '%')
        ->count();
    $scat11['news'] = $scat_news;
    array_push($scatt, $scat11);
    // reality category
    $scat_reality = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'reality' . '%')
        ->count();
    $scat12['reality'] = $scat_reality;
    array_push($scatt, $scat12);
    // scifi category
    $scat_scifi = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'science fiction' . '%')
        ->orWhere('genre', 'like', '%' . 'sci-fi' . '%')
        ->count();
    $scat13['scifi'] = $scat_scifi;
    array_push($scatt, $scat13);
    // fantasy category
    $scat_fantasy = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'fantasy' . '%')
        ->count();
    $scat14['fantasy'] = $scat_fantasy;
    array_push($scatt, $scat14);
    // soap category
    $scat_soap = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'soap' . '%')
        ->count();
    $scat15['soap'] = $scat_soap;
    array_push($scatt, $scat15);
    // talk category
    $scat_talk = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'talk' . '%')
        ->count();
    $scat16['talk'] = $scat_talk;
    array_push($scatt, $scat16);
    // war category
    $scat_war = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'war' . '%')
        ->count();
    $scat17['war'] = $scat_war;
    array_push($scatt, $scat17);
    // western category
    $scat_western = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'western' . '%')
        ->count();
    $scat18['western'] = $scat_western;
    array_push($scatt, $scat18);
    // politics category
    $scat_politics = DB::table('newSeries')
        ->where('genre', 'like', '%' . 'politics' . '%')
        ->count();
    $scat19['politics'] = $scat_politics;
    array_push($scatt, $scat19);
    
    // end of series category
    
    ?>

    {{-- The Master doesn't talk, he acts. --}}
    <div class="w-full h-auto pt-8 bg-gray-200 dark:bg-slate-800" id="footer">
        <div class="w-full flex items-center m-auto">
            <h1 class="text-3xl text-500 font-bold m-auto">Fastmovies1</h1>
        </div>

        <div class="w-11/12 lg:w-10/12 mx-auto flex flex-row my-10 flex-wrap">
            <div class="w-2/4 md:w-1/3 lg:w-1/3 mx-auto">
                <div class="flex content-center items-center py-4">
                    <h1 class="text-xl font-bold dark:text-white">Sitemap</h1>
                </div>
                <ul>
                    {{-- @for ($i = 0; $i < 7; $i++)
                        <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                            <a href="#">Home</a>
                        </li>
                    @endfor --}}
                    <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/home">Home</a>
                    </li>
                    <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/movies">Movies</a>
                    </li>
                    <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/series">Series</a>
                    </li>
                    <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/latest">Latest</a>
                    </li>
                    <li class="w-2/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/contact">Contact us</a>
                    </li>

                </ul>
            </div>
            <div class="w-2/4 md:w-1/3 lg:w-1/3 mx-auto">
                <div class="flex content-center items-center py-4">
                    <h1 class="text-xl font-bold dark:text-white">Legal</h1>
                </div>
                <ul>
                    {{-- @for ($i = 0; $i < 4; $i++)
                        <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                            <a href="#">Disclaimer</a>
                        </li>
                    @endfor --}}
                    <li class="w-2/3 text-base font-bold text-500 py-2 hover:text-600 cursor-pointer">
                        <a href="/about">About us</a>
                    </li>
                    <li class="w-2/3 text-base font-bold text-500 py-2 hover:text-600 cursor-pointer">
                        <a href="/disclaimer">Disclaimer</a>
                    </li>
                    <li class="w-2/3 text-base font-bold text-500 py-2 hover:text-600 cursor-pointer">
                        <a href="/contact">Contact us</a>
                    </li>
                    <li class="w-2/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/terms">Terms and conditions</a>
                    </li>
                    <li class="w-2/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                        <a href="/terms">Privacy</a>
                    </li>
                </ul>
            </div>
            <div class="w-11/12 md:w-1/3 lg:w-1/3 mx-auto">
                <div class="flex content-center items-center py-4">
                    <h1 class="text-xl font-bold dark:text-white">Follow us on the social media</h1>
                </div>
                {{-- <ul>
                    @for ($i = 0; $i < 4; $i++)
                        <li class="w-1/3 text-base font-bold text-500 py-1.5 hover:text-600 cursor-pointer">
                            <a href="#">Disclaimer <i class="fa fa-search"></i></a>
                        </li>
                    @endfor

                </ul> --}}
                <div class="flex flex-row w-10/12 md:w-3/4 lg:w-3/4 my-8 justify-between">
                    <a href="https://web.facebook.com/Fastmovies11/">
                        <i
                            class="fa fa-facebook bg-gray-100 rounded text-3xl py-1 px-2 text-[#4267B2] hover:py-1.5 hover:px-2.5 hover:opacity-90"></i>
                    </a>
                    <a href="https://twitter.com/Fastmovies11/">
                        <i
                            class="fa fa-twitter bg-gray-100 rounded text-3xl py-1 px-2 text-[#00acee] hover:py-1.5 hover:px-2.5 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://t.me/fastmovies11/">
                        <i
                            class="fa fa-telegram bg-gray-100 rounded text-3xl py-1 px-2 text-[#e0cfb1] hover:py-1.5 hover:px-2.5 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://instagram.com/fastmovies1/">
                        <i
                            class="fa fa-instagram bg-gray-100 rounded text-3xl py-1 px-2 text-[#3f729b] hover:py-1.5 hover:px-2.5 hover:opacity-90 mx-2.5"></i>
                    </a>
                    <a href="https://chat.whatsapp.com/HPXADGL6MjW2Zz7MosgQ4v">
                        <i
                            class="fa fa-whatsapp bg-gray-100 rounded text-3xl py-1 px-2 text-[#34B7F1] hover:py-1.5 hover:px-2.5 hover:opacity-90"></i>
                    </a>
                </div>
            </div>

        </div>
        {{-- categories --}}
        <div class="w-full lg:w-10/12 m-auto flex flex-wrap">
            {{-- movies --}}
            <div class="md:w-2/4 lg:w-2/4 w-10/12 m-auto">
                <h1 class="dark:text-white text-lg underline">Movies categories</h1>
                <ul class="flex flex-wrap">
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white "><a
                            href="/movies/category/Action" class="hover:text-500 duration-500">Action
                            ({{ $catt[0]['action'] }}) </a>
                    </li>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Adventure" class="hover:text-500 duration-500">Adventure
                            ({{ $catt[1]['adventure'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Animation" class="hover:text-500 duration-500">Animation
                            ({{ $catt[2]['animation'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Comedy" class="hover:text-500 duration-500">Comedy
                            ({{ $catt[3]['comedy'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Crime" class="hover:text-500 duration-500">Crime
                            ({{ $catt[4]['crime'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Documentary" class="hover:text-500 duration-500">Documentary
                            ({{ $catt[5]['documentary'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Drama" class="hover:text-500 duration-500">Drama
                            ({{ $catt[6]['drama'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Family" class="hover:text-500 duration-500">Family
                            ({{ $catt[7]['family'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Fantasy" class="hover:text-500 duration-500">Fantasy
                            ({{ $catt[8]['fantasy'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/History" class="hover:text-500 duration-500">History
                            ({{ $catt[9]['history'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Horror" class="hover:text-500 duration-500">Horror
                            ({{ $catt[10]['horror'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Music" class="hover:text-500 duration-500">Music
                            ({{ $catt[11]['music'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Mystery" class="hover:text-500 duration-500">Mystery
                            ({{ $catt[12]['mystery'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Romance" class="hover:text-500 duration-500">Romance
                            ({{ $catt[13]['romance'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Science-fiction" class="hover:text-500 duration-500">Science
                            Fiction(sci-fi)
                            ({{ $catt[14]['science fiction'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/TV-movie" class="hover:text-500 duration-500">TV
                            Movie
                            ({{ $catt[15]['tv movie'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Thriller" class="hover:text-500 duration-500">Thriller
                            ({{ $catt[16]['thriller'] }})</li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/War" class="hover:text-500 duration-500">War
                            ({{ $catt[17]['war'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/movies/category/Western" class="hover:text-500 duration-500">Western
                            ({{ $catt[18]['western'] }}) </a></li>
                </ul>
            </div>
            {{-- movies / --}}
            {{-- series --}}
            <div class="md:w-2/4 lg:w-2/4 w-10/12 sm:m-auto">
                <h1 class="dark:text-white text-lg underline">Series categories</h1>
                <ul class="flex flex-wrap">
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white "><a
                            href="/series/category/Action" class="hover:text-500 duration-500">Action
                            ({{ $scatt[0]['action'] }}) </a>
                    </li>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Adventure" class="hover:text-500 duration-500">Adventure
                            ({{ $scatt[1]['adventure'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Animation" class="hover:text-500 duration-500">Animation
                            ({{ $scatt[2]['animation'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Comedy" class="hover:text-500 duration-500">Comedy
                            ({{ $scatt[3]['comedy'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Crime" class="hover:text-500 duration-500">Crime
                            ({{ $scatt[4]['crime'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Documentary" class="hover:text-500 duration-500">Documentary
                            ({{ $scatt[5]['documentary'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Drama" class="hover:text-500 duration-500">Drama
                            ({{ $scatt[6]['drama'] }}) </a>
                    </li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Family" class="hover:text-500 duration-500">Family
                            ({{ $scatt[7]['family'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Kids" class="hover:text-500 duration-500">Kids
                            ({{ $scatt[8]['kids'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Mystery" class="hover:text-500 duration-500">Mystery
                            ({{ $scatt[9]['mystery'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/News" class="hover:text-500 duration-500">News
                            ({{ $scatt[10]['news'] }}) </a></li>
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Reality" class="hover:text-500 duration-500">Reality
                            ({{ $scatt[11]['reality'] }}) </a></li>
                    {{-- sci fi --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Sci-fi" class="hover:text-500 duration-500">Sci-Fi
                            ({{ $scatt[12]['scifi'] }}) </a></li>
                    {{-- fantasy --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Fantasy" class="hover:text-500 duration-500">Fantasy
                            ({{ $scatt[13]['fantasy'] }}) </a></li>
                    {{-- soap --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Soap" class="hover:text-500 duration-500">Soap
                            ({{ $scatt[14]['soap'] }}) </a></li>
                    {{-- talk --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Talk" class="hover:text-500 duration-500">Talk
                            ({{ $scatt[15]['talk'] }}) </a></li>
                    {{-- war --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/War" class="hover:text-500 duration-500">War
                            ({{ $scatt[16]['war'] }}) </a></li>
                    {{-- western --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Western" class="hover:text-500 duration-500">Western
                            ({{ $scatt[17]['western'] }}) </a></li>
                    {{-- politics --}}
                    <li class="border-2 py-2 px-3 border-white mx-2 my-3 dark:text-white"><a
                            href="/series/category/Politics" class="hover:text-500 duration-500">Politics
                            ({{ $scatt[18]['politics'] }}) </a></li>
                    {{-- end --}}


                </ul>
            </div>
            {{-- <div class="md:w-2/4 lg:w-2/4 w-10/12 m-auto">
                <h1>Series categories</h1>
                <ul>
                    <li>Series 1</li>
                    <li>Series 2</li>
                    <li>Series 3</li>
                    <li>Series 4</li>
                    <li>Series 5</li>
                    <li>Series 6</li>
                    <li>Series 7</li>
                    <li>Series 8</li>
                    <li>Series 9</li>
                    <li>Series 10</li>
                </ul>
            </div> --}}
            {{-- series / --}}
        </div>
        {{-- categories / --}}
        {{-- nw --}}
        <div class="w-10/12 m-auto">
            <hr class="bg-slate-700">
            <div class="flex content-center items=center pt-2 dark:text-white">
                <h4 class="m-auto">Fastmovies1 &copy; 2022.All rights reserved.</h4>
            </div>
        </div>
    </div>
    {{-- <center style="display: none;">
        <center><a href="https://livetrafficfeed.com/hit-counter" data-root="0" data-unique="0" data-style="2" data-min="7" data-start="1" id="LTF_hitcounter">Free Hit Counter</a><script type="text/javascript" src="//cdn.livetrafficfeed.com/static/hitcounterjs/live.js"></script></center><noscript><a href="https://livetrafficfeed.com/hit-counter">Free Hit Counter</a></noscript>
    </center> --}}
</div>
