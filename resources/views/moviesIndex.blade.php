@section('meta')
    <meta name="description"
        content="Index of movies free direct download. You'll movies direct download links here, with multiple download links and free download.">
    <meta name="keywords"
        content="index of movies download, mkv movies download,movies direct download, free movies download online">
@endsection
@section('title')
    Index of movies free download
@endsection

<x-app-layout>
    <div class="container flex flex-wrap">
        <div class="left w-full lg:w-3/4">
            <div class="main w-10/12 m-auto py-6">
                <h1 class="text-500 text-xl py-8 font-bold">Index of movies Fastmovies1</h1>
                {{-- content --}}

                {{-- display movies --}}
                @foreach ($movies as $movie)
                    <?php
                    $oldname = $movie->movie_name;
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    ?>
                    <div class="flex flex-row text-base font-medium my-2 dark:text-white group">
                        {{-- <h5>{{ $movie->movie_name }}</h5> --}}
                        <i class="fas fa-folder mr-2"></i>
                        <a href="/movies/{{ $movie->a_id }}-{{ $newname }}"
                            class="hover:text-600 hover:cursor-pointer">{{ $movie->movie_name }}</a>
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
