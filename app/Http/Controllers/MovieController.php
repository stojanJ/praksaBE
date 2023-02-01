<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {  
        $searchBy = '';
        $searchQuerey ='';
        $searchByGenre ='';
        $searchQuereyGenre ='';
        if ($request->has('title')){
            $searchQuerey = $request->query('title'); 
            $searchBy = 'title';
        } if ($request->has('description')){
            $searchQuerey = $request->query('description');
            $searchBy ='description';
        } if($request->has('url')){
            $searchQuerey = $request->query('url');
            $searchBy = 'url';
        }if($request->has('genre')){
            $searchQuereyGenre = $request->query('genre');
            $searchByGenre = 'genre';
        }
        if($searchBy && $searchQuerey) {
            $movie =  Movie::where([[$searchBy,"like","%".$searchQuerey."%"]])->paginate(10);
        }else if($searchByGenre && $searchQuereyGenre){
            $movie =  Movie::where([[$searchByGenre,"like","%".$searchQuereyGenre."%"]])->paginate(10);     
        }else {
            $movie = Movie::with('like')->paginate(10);
        }

        return response()->json([
            'status' => 'success',
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreMovieRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create([
            'title'=> $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'genre' => implode($request->genre),
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Movie created successfully',
            'movie' => $movie,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie, $id)
    {
        $movie = Movie::with('user')->where('id', $id)->first();
        return response()->json([
            'status' => 'success',
            'movie' => $movie,
        ]);
    }
    public function search(Movie $movie, $name){
        $movie = Movie::where([["title","like","%".$name."%"]],
        [["description","like","%".$name."%"]],
        [["url","like","%".$name."%"]],)->get();
       
        return response()->json([
            'status' => 'success',
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
