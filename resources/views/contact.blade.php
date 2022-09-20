@section('meta')
    <meta name="description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Choose from your preferred quality to download">
    <meta name="keywords"
        content="Contact, Index of Fastmovies1, Index of movies Fastmovies1, Index of tv-series, direct download links Fastmovies, Fastmovies1" />
    <meta property="og:title" content="Fastmovies1 | Index of Movies and TV-series">
    <meta property="og:description"
        content="Fastmovies1, free movies and tv-series with direct download links...HD quality and diferrent download qualities. Choose from your preferred quality to download">
    <meta property="og:url" content="https://fastmovies1.com/contact">
@endsection
@section('title')
    Contact us
@endsection

<x-app-layout>
    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @livewire('posts')
    </div>
</x-app-layout>
