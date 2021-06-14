<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = Cinema::all()->sortBy('release_date');
        // $movies = Cinema::all()->where('type', 'movies');
        return view('cinema.index')->with('cinemas',$cinemas);
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
            // 'file_path'=>'required',
        ]);
        // if ($request->hasFile('file_path')) {

        //     $request->validate([
        //         'file_path' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        //     ]);

        //     // Save the file locally in the storage/public/ folder under a new folder named /product
        //     $request->file->store('product', 'public');
        // }
        
        //create cinema
        $cinema = new Cinema;
        $cinema->type = $request->input('type');
        $cinema->title = $request->input('title');
        $cinema->genre = $request->input('genre');
        $cinema->release_date = $request->input('release_date');
        // $cinema->file_path = $request->file->hashName();
        $cinema->save();

        return redirect('/cinema')->with('success','Cinema added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cinema = Cinema::find($id);
        return view('cinema.show')->with('cinema',$cinema);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinema = Cinema::find($id);
        return view('cinema.edit')->with('cinema',$cinema);
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
            // 'file_path'=>'required',
        ]);
        // if ($request->hasFile('file_path')) {

        //     $request->validate([
        //         'file_path' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        //     ]);

        //     // Save the file locally in the storage/public/ folder under a new folder named /product
        //     $request->file->store('product', 'public');
        // }
        
        //create cinema
        $cinema = Cinema::find($id);
        $cinema->type = $request->input('type');
        $cinema->title = $request->input('title');
        $cinema->genre = $request->input('genre');
        $cinema->release_date = $request->input('release_date');
        // $cinema->file_path = $request->file->hashName();
        $cinema->save();

        return redirect('/cinema')->with('success','Cinema updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cinema = Cinema::find($id);
        $cinema->delete();
        return redirect('/cinema')->with('success','Cinema deleted');

    }
}
