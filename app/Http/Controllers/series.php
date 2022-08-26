<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;

class series extends Controller
{
    /**
     * Write Your Code..
     *
     */
    public function index()
    {
        $cache_id = URL::full();
        if (Cache::has('series' . $cache_id) && Cache::has('courosel')) {
            $users = Cache::get('series' . $cache_id);
            $users2 = Cache::get('courosel');
        } else {
            $users1 = DB::table('series')->orderBy('a_id', 'Desc')->paginate(20);
            Cache::put('series' . $cache_id, $users1, now()->addMinutes(360));
            $users = Cache::get('series' . $cache_id);
            // $users = "ret";
            // $users = series::paginate(10);
            // courosel items
            $users2 = DB::table('series')->orderBy('a_id', 'Desc')->limit(10)->get();
            Cache::put('courosel', $users2, now()->addMinutes(360));
        }
        // return view('series', compact('users'));
        return view('series', ['users' => $users], ['courosel' => $users2]);
    }
    // seriesIndex
    public function indexseries()
    {
        // get all series from db
        $series = DB::select('select a_id, s_name from series order by s_name asc');
        return view('seriesIndex', ['series' => $series]);
    }
}
