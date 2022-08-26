<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class search extends Controller
{
    public function index($id)
    {
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $all = [];
        $movies = DB::table('newfastmovies')->where('movie_name', 'like', '%' . $id . '%')->limit(8)->get();
        // dd($movies);
        foreach ($movies as $movie) {
            $movie_id = $movie->movie_id;
            $response = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $all[] = $response->json();
        }
        // dd($all);

        // $all[] = $movies;
        $series = DB::table('series')->where('s_name', 'like', '%' . $id . '%')->get();
        // $all[] = $series;
        return view('search', ['movies' => $all], ['series' => $series]);
    }
    public function result($id)
    {
        $mid = $id;

        return view('results', ['name' => $mid]);
    }
}
