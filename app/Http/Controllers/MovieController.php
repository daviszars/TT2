<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showMovies()
    {
        $movies = Movie::all()->where('type', 'movie')->sortBy('release_date');
        return view('cinema.movies')->with('movies',$movies);
    }

    public function showTvshows()
    {
        $movies = Movie::all()->where('type', 'tvshow')->sortBy('release_date');
        return view('cinema.tvshows')->with('movies',$movies);
    }

    public function index()
    {
        $movies = Movie::all()->sortBy('release_date');
        return view('cinema.index')->with('movies',$movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cinema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type'=>'required',
            'title'=>'required',
            'genre'=>'required',
            'release_date'=>'required',
            'file_path'=>'required|url',
        ]);
        
        //create cinema
        $movie = new Movie;
        $movie->type = $request->input('type');
        $movie->title = $request->input('title');
        $movie->genre = $request->input('genre');
        $movie->release_date = $request->input('release_date');
        $movie->file_path = $request->input('file_path');
        $movie->save();

        return redirect('/cinema')->with('success',trans('messages.cinema added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);
        return view('cinema.show')->with('movie',$movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('cinema.edit')->with('movie',$movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'type'=>'required',
            'title'=>'required',
            'genre'=>'required',
            'release_date'=>'required',
            'file_path'=>'required',
        ]);
        
        //create cinema
        $movie = Movie::find($id);
        $movie->type = $request->input('type');
        $movie->title = $request->input('title');
        $movie->genre = $request->input('genre');
        $movie->release_date = $request->input('release_date');
        $movie->file_path = $request->input('file_path');
        $movie->save();

        return redirect('/cinema')->with('success',trans('messages.cinema updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/cinema')->with('success',trans('messages.cinema deleted'));

    }
}
