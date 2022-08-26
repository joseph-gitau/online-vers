{{-- section title --}}
@section('title', 'Index of Series free direct download links')
{{-- section meta --}}
@section('meta')
    <meta name="description"
        content="Index of series. Get direct download links to your favourite TV Shows and Series with your preferred quality. Multiple free download links with your preferred quality">
    <meta name="keywords" content="index of tv shows,index of series, Fastmovies1 series" />

    <meta property="og:title" content="Index of series free direct download links - Fastmovies1">
    <meta property="og:description"
        content="Index of series. Get direct download links to your favourite TV Shows and Series with your preferred quality. Multiple free download links with your preferred quality">
    <meta property="og:url" content="http://localhost:3000/series">
@endsection



<x-app-layout>
    <div class="container flex flex-wrap">
        <div class="left w-full lg:w-3/4">
            <div class="main w-10/12 m-auto py-6">
                <h1 class="text-500 text-xl py-8 font-bold">Index of series Fastmovies1</h1>
                {{-- content --}}

                {{-- display movies --}}
                @foreach ($series as $serie)
                    <?php
                    $oldname = $serie->s_name;
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    ?>
                    <div class="flex flex-row text-base font-medium my-2 dark:text-white group">
                        {{-- <h5>{{ $movie->movie_name }}</h5> --}}
                        <i class="fas fa-folder mr-2"></i>
                        <a href="/series/{{ $serie->a_id }}-{{ $newname }}"
                            class="hover:text-600 hover:cursor-pointer">{{ $serie->s_name }}</a>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="right w-full lg:w-1/4"></div>
    </div>
    {{-- scroll to top --}}
    <div
        class="top scroll fixed bottom-5 right-5 w-14 h-14 rounded-full border-2 border-500 flex justify-center items-center">
        <i class="fas fa-angle-double-up text-3xl font-bold text-600"></i>
    </div>

    @push('scripts')
        <script>
            if (!$(window).scrollTop()) { //abuse 0 == false :)
                $(".scroll").hide();
            }
            window.onscroll = function(e) {
                if (!$(window).scrollTop()) { //abuse 0 == false :)
                    $(".scroll").fadeOut();
                } else {
                    $(".scroll").fadeIn();
                }
            }
            $(".top").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                return false;
            });
        </script>
    @endpush

</x-app-layout>
