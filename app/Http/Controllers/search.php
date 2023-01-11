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
        // save search term to db
        DB::table('search_terms')->insert([
            'name' => $id,
            'type' => "Search"
        ]);
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $all = [];
        $tmp = [];
        // use full text search
        $movies = DB::select("select * from newfastmovies where match (movie_name) against (? IN NATURAL LANGUAGE MODE) limit 4", [$id]);
        // dd($movies);
        foreach ($movies as $movie) {
            $movie_id = $movie->movie_id;
            $old_id = $movie->a_id;
            $response1 = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $response2 = json_decode($response1, true);
            $response = array_merge($response2, array("init_id" => $old_id));
            // $all[] = $response->json();
            $tmp[] = $response;
        }
        // $all[] = $movies;
        $all['movies'] = $tmp;

        $seriesall = [];
        // $series = DB::table('newSeries')->where('s_name', 'like', '%' . $id . '%')->get();
        $series = DB::select("select * from newSeries where match (s_name, year) against (? IN NATURAL LANGUAGE MODE) limit 4", [$id]);
        // dd($series);
        foreach ($series as $ser) {
            $ser_id = $ser->tmdb_id;
            $old_id = $ser->a_id;
            $ser_response = Http::get("https://api.themoviedb.org/3/$ser_id?api_key=$key&language=en-US");
            $dec_response1 = json_decode($ser_response, true);
            $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
            $seriesall[] = $dec_response;
        }
        $all['term'] = $id;
        // $all[] = $series;
        // dd($all);
        // dd($seriesall);
        return view('search', ['movies' => $all], ['series' => $seriesall]);
    }
    public function result(Request $request)
    {
        $id = $request->input('q');

        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $tmp = [];
        $all = [];

        $movies = DB::table('newfastmovies')->whereRaw("match (movie_name) against (? IN NATURAL LANGUAGE MODE)", [$id])->paginate(8);
        // dd($movies);
        foreach ($movies as $movie) {
            $movie_id = $movie->movie_id;
            $old_id = $movie->a_id;
            $response1 = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $response2 = json_decode($response1, true);
            $response = array_merge($response2, array("init_id" => $old_id));
            // $all[] = $response->json();
            $tmp[] = $response;
        }
        $all['pag_movies'] = $movies;
        $all['movies'] = $tmp;

        $series = DB::table('newSeries')->whereRaw("match (s_name, year) against (? IN NATURAL LANGUAGE MODE)", [$id])->paginate(8);
        $seriesall = [];
        foreach ($series as $ser) {
            $ser_id = $ser->tmdb_id;
            $old_id = $ser->a_id;
            $ser_response = Http::get("https://api.themoviedb.org/3/$ser_id?api_key=$key&language=en-US");
            $dec_response1 = json_decode($ser_response, true);
            $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
            $seriesall[] = $dec_response;
        }
        $all['pag_series'] = $series;
        $all['series'] = $seriesall;
        $all['term'] = $id;

        // dd($all);
        // dd($id);
        return view('results', ['name' => $all]);
    }
}
