<div>
    {{-- The Master doesn't talk, he acts. --}}
    {{-- get a search term from search placeholders to use as placeholder --}}
    <?php
    include '../dbh.php';
    $sql = 'SELECT * FROM search_placeholders order by id DESC Limit 2';
    $result = mysqli_query($conn, $sql);
    $search_placeholder = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $search_placeholder[] = $row['term'];
    }
    // choose random search placeholder
    $placeholder = $search_placeholder[array_rand($search_placeholder)];
    // $placeholder = $row['term'];
    ?>
    <div class="flex items-center justify-center relative mr-6">
        <form action="#" method="GET">
            <div class="normal-search flex">
                <input type="text"
                    class="px-4 py-1.5 w-60 sm:w-52 md:w-56 lg:w-60 border-2 border-gray-600 rounded-tl-3xl rounded-bl-3xl outline:none bg-gray-100 dark:bg-gray-800"
                    placeholder='Search "{{ $placeholder }}"'>
                <button
                    class="flex items-center justify-center px-4 border-2 border-gray-600 border-l-0 rounded-tr-3xl rounded-br-3xl bg-blue-400 text-white">
                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                    <svg xmlns="https://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
    {{-- results --}}
    <div class="flex absolute">
        <div class="flex w-auto lg:max-w-[650px] lg:min-w-2/4 pb-6 pt-4 h-auto bg-gray-300 dark:bg-slate-800 flex flex-wrap rounded z-[99998] results"
            id="results">
            <div class="loader-se hidden w-60 sm:w-52 md:w-56 lg:w-60 z-[99999]">
                <img src="https://fastmovies1.com/oldfastmovies1/resources/images/Spinner.gif" alt="Spinner"
                    class="h-11 m-auto">
            </div>
            <!-- loader -->
            {{-- @for ($i = 0; $i < 4; $i++)
                <div class="w-1/3 m-auto my-4 h-36">
                    <div class="w-10/12 m-auto h-32">
                        <img src="/assets/movies/parallels.jpg" alt="Parrallels"
                            class="w-9/12 m-auto h-auto border rounded ">
                        <h2 class="dark:text-white">Movie name</h2>
                    </div>
                </div>
            @endfor --}}
        </div>
    </div>

</div>
