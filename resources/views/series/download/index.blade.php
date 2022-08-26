@section('meta')
    <meta name="description"
        content="Index of {{ $name[3]['series'][0]->s_name }} all Seasons free download links. Release year: {{ $name[3]['series'][0]->realese_yr }}. You'll find all index of{{ $name[3]['series'][0]->s_name }} all Seasons free download links here, .mkv files for {{ $name[3]['series'][0]->s_name }} Seasons, multiple mirror links, and free download.">
    <meta name="keywords"
        content="{{ $name[3]['series'][0]->s_name }} all seasons,{{ $name[3]['series'][0]->s_name }} Fastmovies1">

    <meta property="og:title" content="{{ $name[3]['series'][0]->s_name }}">
    <meta property="og:description" content="{{ $name[3]['series'][0]->details }}">
    <meta property="og:image" itemprop="image"
        content="https://fastmovies1.com/seriesImages/{{ $name[3]['series'][0]->s_img }}">
    <meta property="og:url" content="http://localhost:3000/series/{{ $name[3]['series'][0]->s_name }}">
@endsection
@section('title')
    Index of {{ $name[3]['series'][0]->s_name }} all Seasons free download links
@endsection
<x-app-layout>
    {{-- loader component --}}
    {{-- <livewire:loader /> --}}
    {{-- loader component --}}
    <div class="container">
        <div class="w-10/12 lg:w-2/4 py-6 border-l-2 border-600 rounded ml-[10%] my-8">
            <p class="ml-4 dark:text-white">Index of {{ $name[3]['series'][0]->s_name }} all Seasons free download
                links.
                Release year: {{ $name[3]['series'][0]->realese_yr }}. You'll
                find
                all index of {{ $name[3]['series'][0]->s_name }} Seasons free download links here, .mkv files for
                {{ $name[3]['series'][0]->s_name }} all Seasons, multiple mirror
                links, and free download.</p>
        </div>
        <div class="w-10/12 lg:w-10/12 content-center my-6 m-auto">
            <h1 class="text-xl font-bold text-gray-800 ml-8 dark:text-white">Download {{ $name[2][0]['name'] }}</h1>

            {{-- <h1 class="text-xl font-bold text-500">Download Series name</h1> --}}
        </div>
        {{-- <?php print_r($name); ?> --}}
        {{-- <h1>boy</h1> --}}
        @foreach ($name[0] as $sea)
            {{-- <?php $mains = $sea->season; ?> --}}
            {{-- <h1>{{ $sea->a_id->season }}</h1> --}}
            {{-- {{ $sea }} --}}
            {{-- @foreach ($mains as $main)
                <h4>{{ $main->s_episode }}</h4>
            @endforeach --}}
        @endforeach
        {{-- @foreach ($name[1] as $downs)
            {{ $downs }}
        @endforeach --}}
        {{-- <h1>bot</h1>
        @foreach ($name[2] as $episodes)
            {{ $episodes['season'] }}
            @foreach ($episodes['content'] as $episode)
                <h4>{{ $episode->a_id }}</h4>
            @endforeach
        @endforeach --}}
        {{-- {{ $name[0]->season }} --}}
        <div class="w-full lg:w-3/4">
            <div class="w-full lg:w-3/4 m-auto my-4">
                {{-- <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button> --}}
                @foreach ($name[2] as $episodes)
                    <div x-data={show:false} class="rounded-sm">
                        <div class="" id="headingOne">
                            <button @click="show=!show"
                                class="w-10/12 ml-[8%] lg:w-full h-auto text-white bg-400 hover:bg-600 focus:ring-4 focus:ring-700 font-medium rounded-lg text-base px-5 py-2.5 mr-2 mb-2 dark:bg-400 dark:hover:bg-700 focus:outline-none dark:focus:ring-700 ease-in-out duration-300 delay-300"
                                type="button">
                                {{ $episodes['season'] }}
                            </button>
                        </div>
                        <div x-show="show" class="px-10 py-6">
                            {{-- start sub container --}}
                            @foreach ($episodes['content'] as $episode)
                                <div class="w-11/12 m-auto bg-gray-300 dark:bg-slate-800 flex flex-row py-4 px-3 mb-2">
                                    <div class="w-1/3">
                                        <span class="py-2 px-2 dark:text-white">{{ $episode->s_episode }}</span>
                                    </div>
                                    <div class="w-2/3 flex relative">
                                        {{-- download links --}}
                                        <?php
                                        $p480 = $episode->p480;
                                        if (empty($p480)) {
                                            echo '';
                                        } else {
                                            echo '
                                            <div class="absolute left-0 justify-evenly top-[-35%]">
                                                <div class=" border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                                    <a href="' .$p480 .'">480p</a>
                                                </div>
                                            </div>
                                            ';
                                        }
                                        $p720 = $episode->p720;
                                        if (empty($p720)) {
                                            echo '';
                                        } else {
                                            echo '
                                            <div class="absolute left-1/3 justify-evenly top-[-35%]">
                                                <div class=" border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                                    <a href="' .$p720 .'">720p</a>
                                                </div>
                                            </div>
                                            ';
                                        }
                                        $p1080 = $episode->p1080;
                                        if (empty($p1080)) {
                                            echo '';
                                        } else {
                                            echo '
                                            <div class="absolute left-2/3 top-[-35%]">
                                                <div class="border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                                    <a href="' .$p1080 .'">1080p</a>
                                                </div>
                                            </div>    
                                            ';
                                        }
                                        if (empty($p480) && empty($p720) && empty($p1080)) {
                                            echo '<div class="border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold"><a href="' .$episode->down_link .'">Download</a></div>
                                            ';
                                        } else {
                                            echo '';
                                        }
                                        ?>

                                        {{-- <div
                                            class="border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                            <a href="#">720p</a>
                                        </div>
                                        <div
                                            class="border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                            <a href="#">1080p</a>
                                        </div>
                                        <div
                                            class="border py-2 px-2 bg-white dark:bg-slate-600 rounded text-blue-500 hover:text-blue-700 dark:text-500 border-1-200 hover:font-bold">
                                            <a href="#">4k</a>
                                        </div> --}}
                                    </div>
                                </div>
                            @endforeach
                            {{-- end sub container --}}
                        </div>
                    </div>
                @endforeach
                {{-- nw --}}
                <div class="flex justify-between my-12 w-11/12 m-auto">
                    <div class="img ">
                        <?php
                        $oldname = $next[0]['next'][0]->s_name;
                        $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                        ?>
                        <a href="/series/{{ $next[0]['next'][0]->a_id }}-{{ $newname }}"
                            class="hover:opacity-80 duration-300">
                            <img src="/oldfastmovies1/seriesImages/{{ $next[0]['next'][0]->s_img }}"
                                alt="{{ $next[0]['next'][0]->s_name }}"
                                class="w-36 lg:w-32 h-auto border rounded border-gray-400 dark:border-white">
                            <span class="justify-center text-xl dark:text-white italic">Previous</span>

                        </a>
                    </div>
                    <div class="img">

                        <?php
                        $oldname1 = $next[1]['previous'][0]->s_name;
                        $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                        ?>
                        <a href="/series/{{ $next[1]['previous'][0]->a_id }}-{{ $newname1 }}"
                            class="hover:opacity-80 duration-300">
                            <img src="/oldfastmovies1/seriesImages/{{ $next[1]['previous'][0]->s_img }}"
                                alt="{{ $next[1]['previous'][0]->s_name }}"
                                class="w-36 lg:w-32 h-auto border rounded border-gray-400 dark:border-white">
                            <span class="justify-center text-xl dark:text-white italic">Next</span>
                        </a>
                    </div>

                </div>
                {{-- nw --}}
                <div class="w-full my-8">
                    <div class="w-11/12 m-auto my-6">
                        <h1 class="dark:text-white text-2xl underline">Latest series</h1>
                    </div>
                    <div class="flex flex-wrap">
                        @foreach ($next[2]['latest'] as $latest)
                            <?php
                            $oldname2 = $latest->s_name;
                            $newname2 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname2);
                            ?>
                            <a href="/series/{{ $latest->a_id }}-{{ $newname2 }}"
                                class="w-2/4 lg:w-1/4 m-auto hover:opacity-80 duration-300">
                                <img src="/oldfastmovies1/seriesImages/{{ $latest->s_img }}"
                                    alt="{{ $latest->s_name }}"
                                    class="w-52 m-auto my-4 lg:w-48 lg:min-w-full h-52 min-h-fit border rounded border-gray-400 dark:border-white">
                            </a>
                            {{-- {{ $latest->s_name }} --}}
                        @endforeach
                        {{-- <a href="#" class="w-1/4 m-auto hover:opacity-80 duration-300">
                            <img src="/assets/movies/parallels.jpg" alt="parralels"
                                class="w-48 h-auto border rounded border-gray-400 dark:border-white">
                        </a>
                        <a href="#" class="w-1/4 m-auto hover:opacity-80 duration-300">
                            <img src="/assets/movies/parallels.jpg" alt="parralels"
                                class="w-48 h-auto border rounded border-gray-400 dark:border-white">
                        </a>
                        <a href="#" class="w-1/4 m-auto hover:opacity-80 duration-300">
                            <img src="/assets/movies/parallels.jpg" alt="parralels"
                                class="w-48 h-auto border rounded border-gray-400 dark:border-white">
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <h1>{{ $name }}</h1> --}}
</x-app-layout>
