<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Director;
use Illuminate\Support\Facades\File;




class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 /**
 * Display a listing of the resource.
 */
public function index(Request $request)
{
    $directorName = $request->input('director_name');
    
    $movies = Movie::when($directorName, function ($query) use ($directorName) {
        $query->whereHas('director', function ($query) use ($directorName) {
            $query->where('name', 'like', '%' . $directorName . '%');
        });
    })->get();
    
    return view('movie.index', compact('movies'));
}

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all(); // Assuming you have a 'Director' model
        
        return view('movie.create', compact('directors'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
    
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->genre = $request->genre;
        $movie->director_id = $request->director_id;

     
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('movies/image',$imageName);
            $movie->img = $imageName;
        }
    
        $movie->save();
    
        return redirect('movie')->with('flash_message', 'Movie Added!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movies = Movie::find($id);
        return view('movie.show')->with('movies',  $movies);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movie::find($id);
        return view('movie.edit')->with('movies',  $movies);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $input = $request->all();
        $movie->update($input);
    
        if ($request->hasFile('image')) {
            $destinationPath = 'movies/image/';
            $oldImage = $movie->img;
    
            if ($oldImage) {
                // Delete the old image file
                $oldImagePath = $destinationPath . $oldImage;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
    
            // Upload and store the new image file
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move($destinationPath, $filename);
            $movie->img = $filename;
        }
    
        $movie->save();
    
        return redirect('movie')->with('flash_message', 'Movie Updated!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Movie::destroy($id);
        return redirect('movie')->with('flash_message', 'Movie deleted!');    }
}
