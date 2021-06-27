<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieFollowController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function store(Movie $movie, Request $request){

        if ($movie->followedBy($request->user())) {
            return response(null, 409);
        }

        $movie->follows()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Movie $movie, Request $request) {
        $request->user()->follows()->where('movie_id', $movie->id)->delete();

        return back();
    }

}
