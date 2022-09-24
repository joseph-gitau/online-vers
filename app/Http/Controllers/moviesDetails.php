<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;

class moviesDetails extends Controller
{
    public function index($id)
    {
        $cache_id = URL::full();
        if (Cache::has('movies_details' . $cache_id) && Cache::has('download_response')) {
            $jsonData = Cache::get('movies_details' . $cache_id);
            $download_response = Cache::get('download_response');
        } else {
            $rawdata = strstr($id, '-', true);
            $movie_id1 = $rawdata;
            $movie_id0 = DB::select("SELECT movie_id FROM newfastmovies WHERE a_id = '$movie_id1'");
            // dd($movie_id0);      
            $movie_id = $movie_id0[0]->movie_id;
            // dd($movie_id);
            $key = "3c2fd11dc93ee3dfdcf927cc73990153";

            $jsonData = [];
            // https://api.themoviedb.org/3/movie/$movie_id?api_key=3c2fd11dc93ee3dfdcf927cc73990153&append_to_response=credits,images&language=en-US&include_image_language=en
            // ("https://api.themoviedb.org/3/movie/$movie_id/videos?api_key=3c2fd11dc93ee3dfdcf927cc73990153&language=en-US ");
            $response = Http::get("https://api.themoviedb.org/3/movie/$movie_id?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
            $jsonData[] = $response->json();
            $trailers = Http::get("https://api.themoviedb.org/3/movie/$movie_id/videos?api_key=$key&language=en-US ");
            $jsonData[] = $trailers->json();
            // downlod links
            $download_id = DB::select('select * from newfastmovies where movie_id = ?', [$movie_id]);
            $download_response = $download_id;
            // similar movies
            // get movie genre
            $genre1 = DB::select('select genre from newfastmovies where movie_id = ' . $movie_id . '');
            // dd($genre1);
            // genre array to string
            $genre = $genre1[0]->genre;
            // dd($genre);
            $movies_similar = DB::table('newfastmovies')->where('genre', 'like', '%' . $genre . '%')->where('movie_id', '!=', $movie_id)->orderBy('a_id', 'Desc')->limit(4)->get();
            // $movies_similar = DB::select('select * from newfastmovies where genre like ' . $genre . ' order by a_id desc limit 4');
            // dd($movies_similar);
            // $similar_id1 = json_decode($movies_similar, true);
            $response_similar = [];
            foreach ($movies_similar as $tm) {
                $tm1 = $tm->movie_id;
                $response_similar1 = Http::get("https://api.themoviedb.org/3/movie/$tm1?api_key=$key&append_to_response=credits,images&language=en-US&include_image_language=en");
                $response_similar[] = $response_similar1->json();
            }

            $jsonData[] = $response_similar;
            Cache::put('movies_details' . $cache_id, $jsonData, now()->addMinutes(360));
            Cache::put('download_response' . $cache_id, $download_response, now()->addMinutes(360));
            // dd($jsonData);
        }
        return view('movies.index', ['name' => $jsonData], ['download' => $download_response]);
        // get
    }
}
