@auth
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-jet-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('home') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('movies') }}" :active="request()->routeIs('movies')">
                            {{ __('movies') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('series') }}" :active="request()->routeIs('series')">
                            {{ __('series') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('latest') }}" :active="request()->routeIs('latest')">
                            {{ __('latest') }}
                        </x-jet-nav-link>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('home') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('movies') }}" :active="request()->routeIs('movies')">
                    {{ __('movies') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('series') }}" :active="request()->routeIs('series')">
                    {{ __('series') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('latest') }}" :active="request()->routeIs('latest')">
                    {{ __('latest') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                            :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </nav>
@else
    {{-- ts bg-white dark:bg-slate-700 --}}
    <nav x-data="{ open: false }"
        class=" border-b border-gray-100 bg-gradient-to-br from-gray-100 to-gray-200  dark:from-slate-900 dark:to-slate-800">

        <!-- Primary Navigation Menu v2 -->
        <div class="max-w-7xl md:w-screen sm:w-screen mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex relative ">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="/home" class="">
                            <img src="{{ asset('/assets/images/logo.ico') }}" alt="Logo" class="block h-12 w-auto">
                            {{-- <x-jet-application-mark class="block h-9 w-auto" /> --}}
                        </a>
                    </div>
                    {{-- search --}}
                    <div
                        class="hidden space-x-8 sm:-my-px sm:ml-10 ml-24 items-center xl:ml-24 sm:hidden md:hidden lg:flex">
                        <livewire:partials.search />

                    </div>
                    {{-- <div @click="open = ! open"
                        class="lg:hidden text-gray-800 dark:text-white text-3xl space-x-10 sm:-my-px sm:ml-6 sm:flex content-center py-4 px-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <svg xmlns="https://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div> --}}

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex md:ml-8 ml-32 sm:mr-16 mr-24">
                        <x-jet-nav-link href="/home" :active="request()->routeIs('/home')">
                            {{ __('Home') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="/movies" :active="request()->routeIs('movies')">
                            {{ __('movies') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="/series" :active="request()->routeIs('series')">
                            {{ __('series') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="/latest" :active="request()->routeIs('latest')">
                            {{ __('latest') }}
                        </x-jet-nav-link>
                        {{-- <x-jet-nav-link> --}}
                        <div
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-bold leading-5 text-500 hover:text-600 hover:border-400 focus:outline-none focus:text-700 focus:border-300 transition">
                            <div class="dropdown inline-block relative group">
                                <button
                                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-bold leading-5 text-500 ">
                                    <span class="mr-0">Index of:</span>
                                    <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu absolute hidden text-gray-700 pt-2 group-hover:block z-[9999]">
                                    <li class="">
                                        <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap dark:bg-gray-600 dark:hover-bg-gray-900 text-base leading-6 font-medium text-gray-900 dark:text-white hover:underline"
                                            href="/moviesIndex">Movies</a>
                                    </li>
                                    <hr>
                                    <li class="">
                                        <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap dark:bg-gray-600 dark:hover-bg-gray-900 text-base leading-6 font-medium text-gray-900 dark:text-white hover:underline"
                                            href="/seriesIndex">series</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        {{-- </x-jet-nav-link> --}}
                        {{-- <x-jet-responsive-nav-link> --}}
                        <div class="group content-center">
                            <div class="relative w-11 h-auto">
                                <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom"
                                    id="theme-toggle" type="button"
                                    class="place-content-evenly w-11 h-auto mt-3.5 has-tooltip text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 dark:border-2">
                                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                    </svg>
                                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div id="tooltip-bottom" role="tooltip"
                                class="invisible group-hover:visible tooltip flex absolute mt-4 -mx-6 z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-1 dark:bg-gray-700">
                                Toggle Dark mode
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        {{-- </x-jet-responsive-nav-link> --}}
                    </div>
                </div>
                <div @click="open = ! open"
                    class="lg:hidden text-gray-800 dark:text-white text-3xl space-x-10 sm:-my-px sm:ml-6 sm:flex content-center py-4 px-4 ">
                    {{-- <i class="fa fa-search" aria-hidden="true"></i> --}}
                    <svg xmlns="https://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
                <div class="md:hidden sm:hidden lg:hidden group content-center pb-8">
                    <div class="relative w-10 h-auto -mt-1">
                        <button data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" id="theme-toggle2"
                            type="button"
                            class="place-content-evenly w-11 h-auto mt-3.5 has-tooltip text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2 dark:border-2">
                            <svg id="theme-toggle-dark-icon2" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon2" class="hidden w-5 h-5" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="tooltip-bottom2" role="tooltip"
                        class="invisible group-hover:visible tooltip flex absolute mt-4 -mx-6 z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-1 dark:bg-gray-700">
                        Toggle Dark mode
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            {{-- sub menu --}}
            {{-- hr --}}
            <hr class="w-full m-auto lg:hidden md:hidden sm:hidden">
            <div class="w-screen flex  py-2 my-3 lg:hidden md:hidden sm:hidden">

                {{-- @for ($i = 0; $i < 5; $i++)
                    <a href="/home"
                        class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Home
                    </a>
                @endfor --}}
                <a href="/home"
                    class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-3 py-2 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Home
                </a>
                <a href="/movies"
                    class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-3 py-2 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Movies
                </a>
                <a href="/series"
                    class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-3 py-2 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Series
                </a>
                <a href="/latest"
                    class="active:underline-offset-1 text-gray-900 dark:text-500 bg-gray-200 hover:bg-gray-300 active:bg-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-3 py-2 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Latest
                </a>
            </div>
        </div>

        <!-- Responsive Navigation Menu 2 -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div>
                <livewire:partials.search />
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="/home" :active="request()->routeIs('home')">
                    {{ __('home') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="/movies" :active="request()->routeIs('movies')">
                    {{ __('movies') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="/series" :active="request()->routeIs('series')">
                    {{ __('series') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="/latest" :active="request()->routeIs('latest')">
                    {{ __('latest') }}
                </x-jet-responsive-nav-link>
                {{-- <x-jet-nav-link> --}}
                <div
                    class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-bold leading-5 text-500 hover:text-600 hover:border-400 focus:outline-none focus:text-700 focus:border-300 transition">
                    <div class="dropdown inline-block relative group">
                        <button
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-xl font-bold leading-5 text-500 ">
                            <span class="mr-0">Index of:</span>
                            <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-2 group-hover:block z-[9999]">
                            <li class="">
                                <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap dark:bg-gray-600 dark:hover-bg-gray-900 text-base leading-6 font-medium text-gray-900 dark:text-white hover:underline"
                                    href="/moviesIndex">Movies</a>
                            </li>
                            <hr>
                            <li class="">
                                <a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap dark:bg-gray-600 dark:hover-bg-gray-900 text-base leading-6 font-medium text-gray-900 hover:underline dark:text-white"
                                    href="/seriesIndex">series</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>

        </div>
        {{-- nav2 --}}
        <livewire:add-header />
        {{-- nav2 --}}
    </nav>

    {{-- <div wire:loading>
        <livewire:loader />
    </div> --}}

@endauth
