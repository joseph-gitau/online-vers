<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class latest extends Controller
{
    public function index()
    {
        if (Cache::has('latestData')) {
            $jsonData = Cache::get('latestData');
        } else {
            $key = "3c2fd11dc93ee3dfdcf927cc73990153";
            $jsonData = [];
            // uploads
            $uploads = [];
            // latest movies
            $latest = [];
            // latest series uploads
            $latseries = [];
            // latest series
            $series = [];
            // latest series seasons
            $latseasons = [];
            // get the latest 8 movies from newfastmovies
            $latuploads = DB::table('newfastmovies')->orderBy('a_id', 'desc')->limit(8)->get();
            foreach ($latuploads as $latupload) {
                $id = $latupload->movie_id;
                $response = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$key");
                $map_decode = $response->json();
                $arrne['raw_id'] = $latupload->a_id;
                array_push($map_decode, $arrne);
                $uploads[] = $map_decode;
            }
            // get the latest 8 movies from newfastseries by date 
            $latupdate = DB::table('newfastmovies')->orderBy('realese_year', 'desc')->limit(8)->get();
            foreach ($latupdate as $latupdat) {
                $id1 = $latupdat->movie_id;
                $response = Http::get("https://api.themoviedb.org/3/movie/$id1?api_key=$key");
                $map_decode = $response->json();
                $arrne['raw_id'] = $latupdat->a_id;
                array_push($map_decode, $arrne);
                $latest[] = $map_decode;
            }

            // get the latest 8 series from newseries by date
            $latser1 = DB::table('newseries')->orderBy('year', 'desc')->limit(8)->get();
            foreach ($latser1 as $latse1) {
                $id3 = $latse1->tmdb_id;
                $response = Http::get("https://api.themoviedb.org/3/$id3?api_key=$key");
                $map_decode = $response->json();
                $arrne['raw_id'] = $latse1->a_id;
                array_push($map_decode, $arrne);
                $series[] = $map_decode;
            }
            // get the latest 8 series from newseries by a_id but serie not in $latser1 
            $latser2 = DB::table('newseries')->whereNotIn('a_id', DB::table('newseries')->orderBy('year', 'desc')->limit(8)->pluck('a_id'))->orderBy('a_id', 'desc')->limit(8)->get();
            foreach ($latser2 as $latse) {
                $id2 = $latse->tmdb_id;
                $response = Http::get("https://api.themoviedb.org/3/$id2?api_key=$key");
                $map_decode = $response->json();
                $arrne['raw_id'] = $latse->a_id;
                array_push($map_decode, $arrne);
                $latseries[] = $map_decode;
            }
            /* $latser = DB::table('newseries')->orderBy('a_id', 'desc')->limit(8)->get();
        foreach ($latser as $latse) {
            $id2 = $latse->tmdb_id;
            $response = Http::get("https://api.themoviedb.org/3/$id2?api_key=$key");
            $map_decode = $response->json();
            $arrne['raw_id'] = $latse->a_id;
            array_push($map_decode, $arrne);
            $latseries[] = $map_decode;
        } */
            // get the latest 8 series seasons from newseries by date

            $jsonData['uploads'] = $uploads;
            $jsonData['latest'] = $latest;
            $jsonData['latseries'] = $latseries;
            $jsonData['series'] = $series;
            // put the data in cache for 1 day
            Cache::put('latestData', $jsonData, 1440);

            // get the data from cache
            $jsonData = Cache::get('latestData');
        }
        // dd($jsonData);
        return view('latest', ['name' => $jsonData]);
    }
}
