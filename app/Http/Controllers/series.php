<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class series extends Controller
{
    /**
     * Write Your Code..
     *
     */
    public function index()
    {
        // div container(Cache::has('series' . $cache_id) && Cache::has('courosel'))
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $cache_id = URL::full();
        if (5 < 2) {
            $users = Cache::get('series' . $cache_id);
            $users2 = Cache::get('courosel');
        } else {
            $all = [];
            $users1 = DB::table('newSeries')->orderBy('a_id', 'Desc')->paginate(20);
            $all[] = $users1;
            $series = [];
            foreach ($users1 as $user) {
                $s_id = $user->tmdb_id;
                $old_id = $user->a_id;
                $s_response = Http::get("https://api.themoviedb.org/3/$s_id?api_key=$key&language=en-US");
                $dec_response1 = json_decode($s_response, true);
                $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
                $series[] = $dec_response;
            }
            $all[] = $series;
            Cache::put('series' . $cache_id, $all, now()->addMinutes(360));
            $users3 = Cache::get('series' . $cache_id);
            // $users = "ret";
            // $users = series::paginate(10);


            // courosel items
            $users2 = DB::table('newSeries')->orderBy('a_id', 'Desc')->limit(10)->get();
            $carousels = [];
            foreach ($users2 as $user) {
                $sid = $user->tmdb_id;
                $old_id = $user->a_id;
                $s_response = Http::get("https://api.themoviedb.org/3/$sid?api_key=$key&language=en-US");
                $dec_response1 = json_decode($s_response, true);
                $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
                $carousels[] = $dec_response;
            }
            Cache::put('courosel', $carousels, now()->addMinutes(360));
            $users2 = Cache::get('courosel');
        }
        // return view('series', compact('users'));
        return view('series', ['users' => $users3], ['courosel' => $users2]);
    }
    // seriesIndex
    public function indexseries()
    {
        // get all series from db
        $series = DB::select('select a_id, s_name from series order by s_name asc');
        return view('seriesIndex', ['series' => $series]);
    }
}
