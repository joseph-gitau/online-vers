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
            $apiSeries = [];
            $series = DB::select('select * from newSeries order by id desc limit 8');
            foreach ($series as $ser) {
                $old_id = $ser->a_id;
                $s_id = $ser->tmdb_id;
                $key = "3c2fd11dc93ee3dfdcf927cc73990153";
                $s_response = Http::get("https://api.themoviedb.org/3/$s_id?api_key=$key&language=en-US");
                // dd($s_response);
                $dec_response1 = json_decode($s_response, true);
                $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
                $apiSeries[] = $dec_response;
            }
            $apiContent[] = $apiSeries;
            // dd($apiContent);
            // $seriesJson = json_decode($series, true);
            // series
            // $apiContent[] = $series;
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
            // end foreach
            // movies category
            $catt = [];
            // action category
            $mcat_action = DB::table('newfastmovies')->where('genre', 'like', '%' . 'action' . '%')->count();
            $mcat1['action'] = $mcat_action;
            array_push($catt, $mcat1);
            // adventure category
            $mcat_adventure = DB::table('newfastmovies')->where('genre', 'like', '%' . 'adventure' . '%')->count();
            $mcat2['adventure'] = $mcat_adventure;
            array_push($catt, $mcat2);
            // animation category
            $mcat_animation = DB::table('newfastmovies')->where('genre', 'like', '%' . 'animation' . '%')->count();
            $mcat3['animation'] = $mcat_animation;
            array_push($catt, $mcat3);
            // comedy category
            $mcat_comedy = DB::table('newfastmovies')->where('genre', 'like', '%' . 'comedy' . '%')->count();
            $mcat4['comedy'] = $mcat_comedy;
            array_push($catt, $mcat4);
            // crime category
            $mcat_crime = DB::table('newfastmovies')->where('genre', 'like', '%' . 'crime' . '%')->count();
            $mcat5['crime'] = $mcat_crime;
            array_push($catt, $mcat5);
            // documentary category
            $mcat_documentary = DB::table('newfastmovies')->where('genre', 'like', '%' . 'documentary' . '%')->count();
            $mcat6['documentary'] = $mcat_documentary;
            array_push($catt, $mcat6);
            // drama category
            $mcat_drama = DB::table('newfastmovies')->where('genre', 'like', '%' . 'drama' . '%')->count();
            $mcat7['drama'] = $mcat_drama;
            array_push($catt, $mcat7);
            // family category
            $mcat_family = DB::table('newfastmovies')->where('genre', 'like', '%' . 'family' . '%')->count();
            $mcat8['family'] = $mcat_family;
            array_push($catt, $mcat8);
            // fantasy category
            $mcat_fantasy = DB::table('newfastmovies')->where('genre', 'like', '%' . 'fantasy' . '%')->count();
            $mcat9['fantasy'] = $mcat_fantasy;
            array_push($catt, $mcat9);
            // history category
            $mcat_history = DB::table('newfastmovies')->where('genre', 'like', '%' . 'history' . '%')->count();
            $mcat10['history'] = $mcat_history;
            array_push($catt, $mcat10);
            // horror category
            $mcat_horror = DB::table('newfastmovies')->where('genre', 'like', '%' . 'horror' . '%')->count();
            $mcat11['horror'] = $mcat_horror;
            array_push($catt, $mcat11);
            // music category
            $mcat_music = DB::table('newfastmovies')->where('genre', 'like', '%' . 'music' . '%')->count();
            $mcat12['music'] = $mcat_music;
            array_push($catt, $mcat12);
            // mystery category
            $mcat_mystery = DB::table('newfastmovies')->where('genre', 'like', '%' . 'mystery' . '%')->count();
            $mcat13['mystery'] = $mcat_mystery;
            array_push($catt, $mcat13);
            // romance category
            $mcat_romance = DB::table('newfastmovies')->where('genre', 'like', '%' . 'romance' . '%')->count();
            $mcat14['romance'] = $mcat_romance;
            array_push($catt, $mcat14);
            // science fiction category
            $mcat_science_fiction = DB::table('newfastmovies')->where('genre', 'like', '%' . 'science fiction' . '%')->count();
            $mcat15['science fiction'] = $mcat_science_fiction;
            array_push($catt, $mcat15);
            // tv movie category
            $mcat_tv_movie = DB::table('newfastmovies')->where('genre', 'like', '%' . 'tv movie' . '%')->count();
            $mcat16['tv movie'] = $mcat_tv_movie;
            array_push($catt, $mcat16);
            // thriller category
            $mcat_thriller = DB::table('newfastmovies')->where('genre', 'like', '%' . 'thriller' . '%')->count();
            $mcat17['thriller'] = $mcat_thriller;
            array_push($catt, $mcat17);
            // war category
            $mcat_war = DB::table('newfastmovies')->where('genre', 'like', '%' . 'war' . '%')->count();
            $mcat18['war'] = $mcat_war;
            array_push($catt, $mcat18);
            // western category
            $mcat_western = DB::table('newfastmovies')->where('genre', 'like', '%' . 'western' . '%')->count();
            $mcat19['western'] = $mcat_western;
            array_push($catt, $mcat19);
            // end of movies category

            // upcoming
            $upcoming = Http::get("https://api.themoviedb.org/3/movie/upcoming?api_key=3c2fd11dc93ee3dfdcf927cc73990153&language=en-US&page=1");
            $upcomingJson = $upcoming->json();
            $apiContent[] = $upcomingJson;
            // map categories 
            $apiContent[] = $catt;



            // nw
            Cache::put('cachekey', $jsonData, 1440);
            Cache::put('seriesCache', $apiContent, 1440);
            Cache::put('serieApi', $apiSeries, 1440);
            // Cache::put('upcomingCache', $upcomingJson, 1);
            $jsonData1 = Cache::get('cachekey');
            $series1 = Cache::get('seriesCache');
            // $upcoming1 = Cache::get('upcomingCache');
        }

        // return view('home', ['users' => $jsonData1], ['seriesraw' => $series1], ['raw' => $series1]);
        // dd($series1);
        return view('home', ['users' => $jsonData1], ['seriesraw' => $series1]);
    }
}
