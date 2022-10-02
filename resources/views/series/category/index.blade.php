<x-app-layout>
    {{-- test{{ $id }} --}}
    <div class="container w-full md:w-full lg:w-5/6 h-auto">
        <div class="flex content-center">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white m-auto my-6">{{ $cat }} series</h1>
        </div>

        <div class="lg:w-11/12 w-full h-auto m-auto block">
            {{-- pagination top --}}
            <div class="w-full md:w-full lg:w-9/12 m-auto py-6">
                {{-- <h5>Pagination:</h5> --}}
                {{ $users[0]->links('pagination::tailwind') }}
            </div>
            {{-- 1st content 8 items --}}
            <div class="w-full lg:w-11/12 m-auto flex flex-wrap">
                {{-- @for ($i = 0; $i < 8; $i++)
                    <livewire:card />
                @endfor --}}
                <?php $count = -1; ?>
                @foreach ($users[1] as $key => $data)
                    <?php
                    $oldname = $data['name'];
                    $newname = preg_replace('/[^A-Za-z0-9\-]/', '-', $oldname);
                    if ($key == 20) {
                        break;
                    }
                    
                    $count++;
                    // echo $count;
                    ?>
                    {{-- cards --}}
                    <div class="relative w-44 md:w-52 lg:w-56 group my-4 m-auto">
                        <img src="https://image.tmdb.org/t/p/w500{{ $data['poster_path'] }}" alt="{{ $data['name'] }}"
                            class="w-48 md:w-48 lg:w-48 h-auto md:h-60 lg:h-64 m-auto border-2 border-black dark:border-white rounded group-hover:opacity-60 group-hover:cursor-pointer duration-300">
                        <span
                            class="absolute top-[15%] left-[18%] text-2xl font-bold text-white hidden group-hover:block duration-500">
                            @foreach ($data['genres'] as $genre)
                                {{ $genre['name'] }},
                            @endforeach
                        </span>
                        <a href="/series/{{ $data['init_id'] }}-{{ $newname }}">
                            <button
                                class="border rounded-3xl py-2 px-4 bg-600 text-base text-white dark:text-white absolute top-2/4 left-[20%] hidden group-hover:block duration-500">View
                                details</button>
                        </a>
                        <h2 class="text-black dark:text-white text-base font-bold ml-6">{{ $data['name'] }}</h2>
                        <span class="text-gray-900 dark:text-white text-sm ml-6">{{ $data['first_air_date'] }}</span>

                    </div>
                @endforeach
            </div>
            {{-- ads section --}}
            {{-- <div class="ad w-11/12 m-auto my-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed dolore eius pariatur magni, corrupti
                laborum a expedita explicabo veniam illum nostrum dicta obcaecati optio minus sequi excepturi odio
                aperiam blanditiis!
            </div> --}}
            {{-- 2nd content 12 items --}}
            {{-- <div class="w-11/12 m-auto flex flex-wrap">
                 @for ($i = 0; $i < 12; $i++)
                    <livewire:card />
                @endfor --}}

        </div>
        {{-- pagination bottom --}}
        <div class="w-full md:w-full lg:w-9/12 m-auto py-6">
            {{-- <h5>Pagination:</h5> --}}
            {{ $users[0]->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>
