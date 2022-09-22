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
    <div class="container flex flex-wrap relative">
        {{-- left --}}
        <div class="left w-full lg:w-8/12">
            <div class="main w-10/12 m-auto py-6">
                <h1 class="text-500 text-xl py-8 font-bold">Index of movies Fastmovies1</h1>
                {{-- ads --}}
                <div class="">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                        data-ad-format="fluid" data-adtest="on" data-ad-client="ca-pub-2614330797623180"
                        data-ad-slot="2073940206"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
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


                {{-- ads --}}
                <div class="w-full lg:w-10/12 m-auto py-2">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
                        crossorigin="anonymous"></script>
                    <!-- Horizontal -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2614330797623180"
                        data-ad-slot="7247602228" data-ad-format="auto" data-adtest="on"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
        {{-- right --}}
        <div class="right w-full lg:w-4/12 relative lg:fixed lg:top-15 lg:right-10" id="rightIndex">
            {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
                crossorigin="anonymous"></script>
            <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-adtest="on"
                data-ad-client="ca-pub-2614330797623180" data-ad-slot="5474240531"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script> --}}
            {{-- 2 --}}
            <div class="my-2">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
                    crossorigin="anonymous"></script>
                <!-- index hor recc -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2614330797623180"
                    data-ad-slot="3057667042" data-adtest="on" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            {{-- 2 --}}
            <div class="my-2">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2614330797623180"
                    crossorigin="anonymous"></script>
                <!-- index hor recc -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2614330797623180"
                    data-ad-slot="3057667042" data-adtest="on" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
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
            // this function runs every time you are scrolling

            $(window).scroll(function() {
                var top_of_element = $("#footer").offset().top;
                var bottom_of_element = $("#footer").offset().top + $("#footer").outerHeight();
                var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
                var top_of_screen = $(window).scrollTop();

                if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)) {
                    // the element is visible, do something
                    console.log('visible');
                    $("#rightIndex").removeClass('lg:fixed');
                } else {
                    // the element is not visible, do something else
                    console.log('not visible');
                    $("#rightIndex").addClass('lg:fixed');
                }
            });
        </script>
    @endpush

</x-app-layout>
