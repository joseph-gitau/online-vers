<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\view;


class home extends Controller
{
    public function index()
    {
        /* Cache::forget('cachekey');
        Cache::forget('seriesCache');
        Cache::forget('upcomingCache'); Cache::has('upcomingCache') and*/
        if (Cache::has('seriesCache') && Cache::has('cachekey')) {
            $jsonData1 = Cache::get('cachekey');
            $series1 = Cache::get('seriesCache');
            // $upcoming1 = Cache::get('upcomingCache');
        } else {
            // api large Container
            $apiContent = [];
            $series = DB::select('select * from series order by a_id desc limit 8');
            // $seriesJson = json_decode($series, true);
            // series
            $apiContent[] = $series;
            $users = DB::select('select * from newfastmovies order by a_id desc limit 8 ');

            $jsonData = [];
            foreach ($users as $user) {
                // defaultmovie id
                $defaultmovie_id = $user->a_id;
                $id = $user->movie_id;
                $key = "3c2fd11dc93ee3dfdcf927cc73990153";
                $response = Http::get("https://api.themoviedb.org/3/movie/$id?api_key=$key");
                // map response with id
                $map_decode = $response->json();
                $arrne['raw_id'] = $defaultmovie_id;
                array_push($map_decode, $arrne);
                $jsonData[] = $map_decode;
                // $jsonData[] = $response->json();
                // $apiContent[] = $jsonData;
                /* $json = file_get_contents("https://api.themoviedb.org/3/movie/$id?api_key=$key");
                $resultjs = json_decode($json, true); */
            }
            // upcoming
            $upcoming = Http::get("https://api.themoviedb.org/3/movie/upcoming?api_key=3c2fd11dc93ee3dfdcf927cc73990153&language=en-US&page=1");
            $upcomingJson = $upcoming->json();
            $apiContent[] = $upcomingJson;
            // nw
            Cache::put('cachekey', $jsonData, 1440);
            Cache::put('seriesCache', $apiContent, 1440);
            // Cache::put('upcomingCache', $upcomingJson, 1);
            $jsonData1 = Cache::get('cachekey');
            $series1 = Cache::get('seriesCache');
            // $upcoming1 = Cache::get('upcomingCache');
        }

        // return view('home', ['users' => $jsonData1], ['seriesraw' => $series1], ['raw' => $series1]);
        return view('home', ['users' => $jsonData1], ['seriesraw' => $series1]);
    }
}
