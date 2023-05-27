<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director; // Assuming Director model is imported

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        return view('director.index')->with('directors', $directors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $director = new Director;
        $director->name = $request->name;
        $director->save();

        return redirect('director')->with('flash_message', 'Director added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $director = Director::find($id);
        return view('director.show')->with('director', $director);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $director = Director::find($id);
        return view('director.edit')->with('director', $director);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $director = Director::find($id);
        $director->name = $request->name;
        $director->save();

        return redirect('director')->with('flash_message', 'Director updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Director::destroy($id);
        return redirect('director')->with('flash_message', 'Director deleted!');
    }
}
