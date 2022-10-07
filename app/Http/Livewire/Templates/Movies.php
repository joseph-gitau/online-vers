<?php

namespace App\Http\Livewire\Templates;

use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Movies extends Component
{
    public function render()
    {


        $store_arr = [];
        $movies_arr = [];
        $terms = DB::table('search_terms')->get();
        foreach ($terms as $term) {
            if (strlen($term->name) > 3) {
                $store_arr[] = $term->name;
            }
        }
        $values = array_count_values($store_arr);
        arsort($values);
        $popular = array_slice(array_keys($values), 0, 5, true);
        // fetch liki movies from newfastmovies1
        foreach ($popular as $pop) {
            $movies = DB::table('newfastmovies')->where('movie_name', 'like', '%' . $pop . '%')->get();
            // dd($movies);
            $movies_arr[] = $movies;
        }

        // dd($store_arr);
        // dd($popular);
        // dd($movies_arr);
        // dd($movies_arr);
        return view('livewire.templates.movies');
    }
}
