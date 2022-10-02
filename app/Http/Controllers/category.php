<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class category extends Controller
{
    public function index($id)
    {
        $cache_id = URL::full();
        if (Cache::has('movies' . $cache_id) && Cache::has('movies_api' . $cache_id) && Cache::has('mtype')) {
            $movies = Cache::get('movies' . $cache_id);
            $tmdb_content = Cache::get('movies_api' . $cache_id);
            $send_id = Cache::get('mtype');
        } else {


            // replace hyphens with spaces
            $dirt_id = $id;
            $id = str_replace('-', ' ', $dirt_id);
            $send_id1 = $id;
            // get all movies from db
            $api_key = "3c2fd11dc93ee3dfdcf927cc73990153";
            // get all movies from db with id as category
            $movies1 = DB::table('newfastmovies')->where('genre', 'like', '%' . $id . '%')->orderBy('a_id', 'Desc')->paginate(20);
            // dd($id);
            // dd($movies1);
            $tmdb_content = [];
            foreach ($movies1 as $key => $value) {
                $id = $value->movie_id;
                // dd($id);
                $response =
                    Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$api_key");
                $tmdb_content[] = $response->json();
                // dd($response);
            }
            // end of else
            // put in cache
            Cache::put('movies' . $cache_id, $movies1, 1440);
            Cache::put('movies_api' . $cache_id, $tmdb_content, 1440);
            Cache::put('mtype', $send_id1, 1440);
            // get cache
            $movies = Cache::get('movies' . $cache_id);
            $tmdb_content = Cache::get('movies_api' . $cache_id);
            $send_id = Cache::get('mtype');
        }

        return view('movies.category.index', ['id' => $movies, 'users' => $tmdb_content, 'cat' => $send_id]);
    }


    // series controller
    public function series($id)
    {
        // tester (Cache::has('series' . $cache_id) && Cache::has('series_type' . $cache_id))
        $api_key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $cache_id = URL::full();
        if (5 < 3) {
            $serie = Cache::get('series' . $cache_id);
            $send_id = Cache::get('series_type' . $cache_id);
        } else {
            $wrap = [];
            $all = [];
            // select all series from db where category is $id
            $serie1 = DB::table('newSeries')->where('genre', 'like', '%' . $id . '%')->orderBy('a_id', 'Desc')->paginate(20);

            foreach ($serie1 as $key => $value) {
                $sid = $value->tmdb_id;
                $old_id = $value->a_id;
                $s_response = Http::get("https://api.themoviedb.org/3/$sid?api_key=$api_key&language=en-US");
                $dec_response1 = json_decode($s_response, true);
                $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
                $all[] = $dec_response;
            }
            // dd($all);
            $wrap[] = $serie1;
            $wrap[] = $all;
            $wrap[] = "test";
            // dd($wrap);
            // serie type
            $send_id1 = $id;
            // dd($serie);
            // put in cache
            Cache::put('series' . $cache_id, $wrap, 1440);
            Cache::put('series_type' . $cache_id, $send_id1, 1440);
            // get cache
            $serie = Cache::get('series' . $cache_id);
            $send_id = Cache::get('series_type' . $cache_id);
        }
        return view('series.category.index', ['users' => $serie, 'cat' => $send_id]);
    }
}
