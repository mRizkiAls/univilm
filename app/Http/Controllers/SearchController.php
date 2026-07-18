<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class SearchController extends Controller
{
   public function search(Request $request)
{
    $query = $request->q;

    if (!$query) {
        $films = collect(); // kosong
    } else {
        $films = Film::where('title', 'LIKE', "%{$query}%")->get();
    }

    return view('UniVilm.search', compact('films', 'query'));
}
}