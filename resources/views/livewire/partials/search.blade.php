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
    {{-- <div class="flex items-center justify-center relative mr-6">
        <form action="#" method="GET">
            <div class="normal-search flex">
                <input type="text"
                    class="px-4 py-1.5 w-60 sm:w-52 md:w-56 lg:w-60 border-2 border-gray-600 rounded-tl-3xl rounded-bl-3xl outline:none bg-gray-100 dark:bg-gray-800"
                    placeholder='Search "{{ $placeholder }}"'>
                <button
                    class="flex items-center justify-center px-4 border-2 border-gray-600 border-l-0 rounded-tr-3xl rounded-br-3xl bg-blue-400 text-white">
                     <i class="fa fa-search" aria-hidden="true"></i> 
                    <svg xmlns="https://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div> --}}
    <div class="flex align-center justify-center">
        <form action="" method="GET" class="w-full">
            <div class="flex normal-search">

                <select name="mors" id="searchOption"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-1 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-3xl border-r-0 hover:bg-gray-200 focus:ring-1 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                    <option value="movies">Movies</option>
                    <option value="series">Series</option>
                </select>
                <div class="relative w-full">
                    <input type="search" id="searchTerm" name="searchTerm"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-3xl border-l-0  border border-gray-300 focus:ring-gray-700 focus:border-gray-700 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-gray-700"
                        placeholder='Search "{{ $placeholder }}"' autocomplete="off">
                    <button type="submit"
                        class="absolute top-0 right-0 p-2.5 text-md font-medium text-white  rounded-r-3xl border-0 focus:ring-1 focus:outline-none focus:ring-blue-300 dark:bg-gray-700 dark:hover:bg-gray-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>

    </div>
    {{-- results --}}
    <div class="flex absolute">
        <div class="w-full lg:max-w-[650px] lg:min-w-2/4 pb-6 pt-4 h-auto bg-gray-300 dark:bg-slate-800 rounded z-[99998] hidden"
            id="results-wrapper">
            <div class="loader-se w-full z-[99999] py-2">
                <i class="loaderSearch"><svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px"
                        height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                        <path opacity="0.2" fill="#000"
                            d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
		s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
		c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                        <path fill="#000"
                            d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
			C22.32,8.481,24.301,9.057,26.013,10.047z">
                            <animateTransform attributeType="xml" attributeName="transform" type="rotate"
                                from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite" />
                        </path>
                    </svg></i>
            </div>
            <div class="flex flex-wrap min-h-max results" id="results">
                <!-- loader -->
                {{-- @for ($i = 0; $i < 4; $i++)
                    <div class="w-1/3 my-2 h-36 lg:h-44">
                        <div class="w-10/12 m-auto h-32">
                            <img src="/assets/movies/parallels.jpg" alt="Parrallels"
                                class="w-9/12 m-auto h-auto border rounded ">
                            <h2 class="dark:text-white">Movie name</h2>
                        </div>
                    </div>
                @endfor --}}
            </div>
            {{-- show all button --}}
            <div class="w-full flex justify-center">
                <a href="#"
                    class="w-60 sm:w-52 md:w-56 lg:w-60 bg-500 hover:bg-400 hover:cursor-pointer duration-300 text-white text-center py-2 rounded mt-4">Show
                    all</a>
            </div>
        </div>
    </div>

</div>
