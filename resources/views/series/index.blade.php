@section('meta')
    <meta name="description"
        content="Index of {{ $name[0]->s_name }}. Release year: {{ $name[0]->realese_yr }}. Genres: {{ $name[0]->genre }}. Find download links for all seasons, with multiple qualities and free download.">
    <meta name="keywords"
        content="{{ $name[0]->s_name }} series download,index of {{ $name[0]->s_name }},{{ $name[0]->s_name }} all seasons">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Index of {{ $name[0]->s_name }} {{ $name[0]->realese_yr }} direct download links - Fastmovies1">
    <meta property="og:description"
        content="Genre: {{ $name[0]->genre }}. Download all seasons with direct download links...preferred quality.">
    <meta property="og:image:secure_url" itemprop="image"
        content="https://fastmovies1.com/seriesImages/{{ $name[0]->s_img }}">
    <meta property="og:url" content="http://localhost:3000/series/6-Legacies">
@endsection
@section('title')
    Index of {{ $name[0]->s_name }} download
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
                <img src="/oldfastmovies1/large-imgs/{{ $name[0]->large_img }}" alt="{{ $name[0]->s_name }}"
                    class="w-full h-auto max-h-[70vh] border border-2 border-gray-900 rounded dark:border-white border-t-0">
            </div>
            {{-- series details --}}
            <div class="w-11/12 m-auto py-6">
                <ul class="list-[upper-roman]">
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;

                        <p><b>Index of </b> {{ $name[0]->s_name }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Genre &nbsp;</b>
                        <p>{{ $name[0]->genre }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Release year &nbsp;</b>
                        <p>{{ $name[0]->realese_yr }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Rating &nbsp;</b>
                        <p>{{ $name[0]->rating }}</p>
                    </li>
                    <li class="flex flex-row text-base py-3 dark:text-white">
                        <i class="fa fa-arrow-circle-right text-500 font-sm" aria-hidden="true"></i>&nbsp;&nbsp;
                        <b>Synopsis &nbsp;</b>
                        <p>&nbsp;{{ $name[0]->details }}</p>
                    </li>
                </ul>
            </div>
            {{-- download button --}}
            <?php
            $oldname = $name[0]->s_name;
            $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
            ?>
            <div class="w-11/12 m-auto flex mb-6">
                <button class="border rounded py-2 px-4 bg-600 text-base text-white dark:text-white"><a
                        href="/series/download/{{ $name[0]->a_id }}-{{ $newname }}">Go to download</a>
                </button>
            </div>
            {{-- similar series --}}
            <div class="w-11/12 m-auto my-6">
                <div class="text-xl dark:text-white my-4">
                    <span>Similar Series</span>
                </div>
                <div class="flex flex-wrap w-11/12 m-auto">
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
                        $oldname1 = $item->s_name;
                        $newname1 = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname1);
                        ?>
                        <div class="w-full lg:w-4/12">
                            <a href="/series/{{ $item->a_id }}-{{ $newname1 }}">
                                <div class="w-full my-4 lg:w-56 border-2 border-gray-800 rounded dark:border-white">
                                    <img src="/oldfastmovies1/seriesImages/{{ $item->s_img }}" alt="{{ $item->s_name }}"
                                        class="w-full lg:w-56 h-auto max-h-56 m-auto">
                                    <div class="flex flex-col content-center">
                                        <span class="w-10/12 dark:text-white m-auto">{{ $item->genre }}</span>
                                        <span class="w-10/12 dark:text-white m-auto">{{ $item->s_name }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
