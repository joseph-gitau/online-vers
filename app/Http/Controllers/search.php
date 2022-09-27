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
            $old_id = $movie->a_id;
            $response1 = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $response2 = json_decode($response1, true);
            $response = array_merge($response2, array("init_id" => $old_id));
            // $all[] = $response->json();
            $all[] = $response;
        }
        // $all[] = $movies;

        $series = [];
        $series = DB::table('newSeries')->where('s_name', 'like', '%' . $id . '%')->get();
        foreach ($series as $ser) {
            $ser_id = $ser->tmdb_id;
            $old_id = $ser->a_id;
            $ser_response = Http::get("https://api.themoviedb.org/3/$ser_id?api_key=$key&language=en-US");
            $dec_response1 = json_decode($ser_response, true);
            $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
            $series[] = $dec_response;
        }
        // $all[] = $series;
        // dd($all);
        // dd($series);
        return view('search', ['movies' => $all], ['series' => $series]);
    }
    public function result($id)
    {
        $mid = $id;

        return view('results', ['name' => $mid]);
    }
}
