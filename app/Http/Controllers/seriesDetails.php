<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class seriesDetails extends Controller
{
    public function index($id)
    {
        // dd($id);
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $users = DB::table('newSeries')->where('a_id', $id)->get();
        $s_id = $users[0]->tmdb_id;
        $old_id = $users[0]->a_id;
        $s_response = Http::get("https://api.themoviedb.org/3/$s_id?api_key=$key&append_to_response=credits,images&language=en-US");
        $dec_response1 = json_decode($s_response, true);
        // dd($dec_response1);
        $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
        // dd($dec_response1);
        $genre = $users[0]->genre;
        // dd($genre);
        // similar series
        $similar = DB::table('newSeries')->where('genre', 'like', '%' . $genre . '%')->whereNot('a_id', $id)->limit(3)->get();
        $simContent = [];
        foreach ($similar as $sim) {
            $sim_id = $sim->tmdb_id;
            $old_id1 = $sim->a_id;
            $sim_response = Http::get("https://api.themoviedb.org/3/$sim_id?api_key=$key&language=en-US");
            $sim_decode1 = json_decode($sim_response, true);
            $sim_decode = array_merge($sim_decode1, array("init_id" => $old_id1));
            $simContent[] = $sim_decode;
        }
        // dd($similar);
        return view('series.index', ['name' => $dec_response, 'similar' => $simContent]);
    }
    public function download($id)
    {
        // remove characters after -
        $id = preg_replace('/-.*/', '', $id);
        // dd($id);
        $api_key = "3c2fd11dc93ee3dfdcf927cc73990153";
        $all = [];
        $users = DB::table('newSeries')->where('a_id', $id)->get();

        $pid = $users[0]->a_id;
        $s_name = $users[0]->s_name;
        // get seasons
        $a_id = [];
        $a_id[] = DB::table('seriesons')->where('parent_id', $pid)->orderBy('season', 'Desc')->get();
        $all[] = $a_id;
        // get episodes
        $down_season = [];
        // $episodes = [];
        // $darray = [];
        $result = [];
        foreach ($a_id[0] as $key => $value) {
            $down_season1 = $value->season;
            $down_season[] = $down_season1;
            // dowwnload array
            $name = array("name" => $value->s_name);
            $darray = array("season" => $down_season1);
            $episodes = array("content" => DB::table('seriesdetails')->where('parent_id', $pid)->where('s_season', $down_season1)->orderBy('s_episode', 'Asc')->get());
            // merge arrays
            $result[] = array_merge($darray, $episodes, $name);
        }
        // get next item and previous item
        $next1 = DB::table('newSeries')->where('s_name', '>', $s_name)->orderBy('s_name', 'Asc')->limit(1)->get();
        $next_sid = $next1[0]->tmdb_id;
        $next_oldid = $next1[0]->a_id;
        $next_response = Http::get("https://api.themoviedb.org/3/$next_sid?api_key=$api_key&language=en-US");
        $next_decode1 = json_decode($next_response, true);
        $next = array_merge($next_decode1, array("init_id" => $next_oldid));


        // get previous item
        $previous = DB::table('newSeries')->where('s_name', '<', $s_name)->orderBy('s_name', 'Desc')->limit(1)->get();
        $previous_sid = $previous[0]->tmdb_id;
        $previous_oldid = $previous[0]->a_id;
        $previous_response = Http::get("https://api.themoviedb.org/3/$previous_sid?api_key=$api_key&language=en-US");
        $previous_decode1 = json_decode($previous_response, true);
        $previous = array_merge($previous_decode1, array("init_id" => $previous_oldid));



        // latest series
        $latest1 = DB::table('newSeries')->orderBy('a_id', 'Desc')->limit(3)->get();
        $latestContent = [];
        foreach ($latest1 as $lat) {
            $lat_id = $lat->tmdb_id;
            $old_id1 = $lat->a_id;
            $lat_response = Http::get("https://api.themoviedb.org/3/$lat_id?api_key=$api_key&language=en-US");
            $lat_decode1 = json_decode($lat_response, true);
            $lat_decode = array_merge($lat_decode1, array("init_id" => $old_id1));
            $latestContent[] = $lat_decode;
            $latest = $latestContent;
        }



        // $all[] = $next;

        $alladd = [];
        $alladd[] = $next;
        $alladd[] = $previous;
        $alladd[] = $latest;
        $all[] = $down_season;
        $all[] = $result;
        // get serie details
        // $all[] = array("series" => DB::table('series')->where('a_id', $id)->get());
        $serie = DB::table('newSeries')->where('a_id', $id)->get();
        $s_id = $serie[0]->tmdb_id;
        $old_id = $serie[0]->a_id;
        $s_response = Http::get("https://api.themoviedb.org/3/$s_id?api_key=$api_key&language=en-US");
        $dec_response1 = json_decode($s_response, true);
        $dec_response = array_merge($dec_response1, array("init_id" => $old_id));
        $all[] = $dec_response;
        // dd($all);
        return view('series.download.index', ['name' => $all, 'next' => $alladd]);
    }
}
