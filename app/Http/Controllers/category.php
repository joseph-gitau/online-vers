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
}
