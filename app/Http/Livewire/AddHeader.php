<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;

use Livewire\Component;

class AddHeader extends Component
{
    public function render()
    {


        // use DB;

        // movies category
        $catt = [];
        // action category
        $mcat_action = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'action' . '%')
            ->count();
        $mcat1['action'] = $mcat_action;
        array_push($catt, $mcat1);
        // adventure category
        $mcat_adventure = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'adventure' . '%')
            ->count();
        $mcat2['adventure'] = $mcat_adventure;
        array_push($catt, $mcat2);
        // animation category
        $mcat_animation = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'animation' . '%')
            ->count();
        $mcat3['animation'] = $mcat_animation;
        array_push($catt, $mcat3);
        // comedy category
        $mcat_comedy = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'comedy' . '%')
            ->count();
        $mcat4['comedy'] = $mcat_comedy;
        array_push($catt, $mcat4);
        // crime category
        $mcat_crime = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'crime' . '%')
            ->count();
        $mcat5['crime'] = $mcat_crime;
        array_push($catt, $mcat5);
        // documentary category
        $mcat_documentary = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'documentary' . '%')
            ->count();
        $mcat6['documentary'] = $mcat_documentary;
        array_push($catt, $mcat6);
        // drama category
        $mcat_drama = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'drama' . '%')
            ->count();
        $mcat7['drama'] = $mcat_drama;
        array_push($catt, $mcat7);
        // family category
        $mcat_family = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'family' . '%')
            ->count();
        $mcat8['family'] = $mcat_family;
        array_push($catt, $mcat8);
        // fantasy category
        $mcat_fantasy = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'fantasy' . '%')
            ->count();
        $mcat9['fantasy'] = $mcat_fantasy;
        array_push($catt, $mcat9);
        // history category
        $mcat_history = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'history' . '%')
            ->count();
        $mcat10['history'] = $mcat_history;
        array_push($catt, $mcat10);
        // horror category
        $mcat_horror = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'horror' . '%')
            ->count();
        $mcat11['horror'] = $mcat_horror;
        array_push($catt, $mcat11);
        // music category
        $mcat_music = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'music' . '%')
            ->count();
        $mcat12['music'] = $mcat_music;
        array_push($catt, $mcat12);
        // mystery category
        $mcat_mystery = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'mystery' . '%')
            ->count();
        $mcat13['mystery'] = $mcat_mystery;
        array_push($catt, $mcat13);
        // romance category
        $mcat_romance = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'romance' . '%')
            ->count();
        $mcat14['romance'] = $mcat_romance;
        array_push($catt, $mcat14);
        // science fiction category
        $mcat_science_fiction = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'science fiction' . '%')
            ->orWhere('genre', 'like', '%' . 'sci-fi' . '%')
            ->count();
        $mcat15['science fiction'] = $mcat_science_fiction;
        array_push($catt, $mcat15);
        // tv movie category
        $mcat_tv_movie = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'tv movie' . '%')
            ->count();
        $mcat16['tv movie'] = $mcat_tv_movie;
        array_push($catt, $mcat16);
        // thriller category
        $mcat_thriller = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'thriller' . '%')
            ->count();
        $mcat17['thriller'] = $mcat_thriller;
        array_push($catt, $mcat17);
        // war category
        $mcat_war = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'war' . '%')
            ->count();
        $mcat18['war'] = $mcat_war;
        array_push($catt, $mcat18);
        // western category
        $mcat_western = DB::table('newfastmovies')
            ->where('genre', 'like', '%' . 'western' . '%')
            ->count();
        $mcat19['western'] = $mcat_western;
        array_push($catt, $mcat19);
        // end of movies category
        // dd($catt);

        // series

        $scatt = [];
        // action category
        $scat_action = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'action' . '%')
            ->count();
        $scat1['action'] = $scat_action;
        array_push($scatt, $scat1);
        // adventure category
        $scat_adventure = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'adventure' . '%')
            ->count();
        $scat2['adventure'] = $scat_adventure;
        array_push($scatt, $scat2);
        // animation category
        $scat_animation = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'animation' . '%')
            ->count();
        $scat3['animation'] = $scat_animation;
        array_push($scatt, $scat3);
        // comedy category
        $scat_comedy = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'comedy' . '%')
            ->count();
        $scat4['comedy'] = $scat_comedy;
        array_push($scatt, $scat4);
        // crime category
        $scat_crime = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'crime' . '%')
            ->count();
        $scat5['crime'] = $scat_crime;
        array_push($scatt, $scat5);
        // documentary category
        $scat_documentary = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'documentary' . '%')
            ->count();
        $scat6['documentary'] = $scat_documentary;
        array_push($scatt, $scat6);
        // drama category
        $scat_drama = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'drama' . '%')
            ->count();
        $scat7['drama'] = $scat_drama;
        array_push($scatt, $scat7);
        // family category
        $scat_family = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'family' . '%')
            ->count();
        $scat8['family'] = $scat_family;
        array_push($scatt, $scat8);
        // kids category
        $scat_kids = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'kids' . '%')
            ->count();
        $scat9['kids'] = $scat_kids;
        array_push($scatt, $scat9);
        // mystery category
        $scat_mystery = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'mystery' . '%')
            ->count();
        $scat10['mystery'] = $scat_mystery;
        array_push($scatt, $scat10);
        // news category
        $scat_news = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'news' . '%')
            ->count();
        $scat11['news'] = $scat_news;
        array_push($scatt, $scat11);
        // reality category
        $scat_reality = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'reality' . '%')
            ->count();
        $scat12['reality'] = $scat_reality;
        array_push($scatt, $scat12);
        // scifi category
        $scat_scifi = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'science fiction' . '%')
            ->orWhere('genre', 'like', '%' . 'sci-fi' . '%')
            ->count();
        $scat13['scifi'] = $scat_scifi;
        array_push($scatt, $scat13);
        // fantasy category
        $scat_fantasy = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'fantasy' . '%')
            ->count();
        $scat14['fantasy'] = $scat_fantasy;
        array_push($scatt, $scat14);
        // soap category
        $scat_soap = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'soap' . '%')
            ->count();
        $scat15['soap'] = $scat_soap;
        array_push($scatt, $scat15);
        // talk category
        $scat_talk = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'talk' . '%')
            ->count();
        $scat16['talk'] = $scat_talk;
        array_push($scatt, $scat16);
        // war category
        $scat_war = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'war' . '%')
            ->count();
        $scat17['war'] = $scat_war;
        array_push($scatt, $scat17);
        // western category
        $scat_western = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'western' . '%')
            ->count();
        $scat18['western'] = $scat_western;
        array_push($scatt, $scat18);
        // politics category
        $scat_politics = DB::table('newSeries')
            ->where('genre', 'like', '%' . 'politics' . '%')
            ->count();
        $scat19['politics'] = $scat_politics;
        array_push($scatt, $scat19);

        // end of series category



        return view('livewire.add-header', ['catt' => $catt, 'scatt' => $scatt]);
    }
}
