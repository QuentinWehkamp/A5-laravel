<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::latest()->paginate(5);



        return view('home', compact('bands'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('band.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'img-id' => 'required',
            'bio' => 'required',
            'desc' => 'required',
            'yt-links' => 'required',
            'bg-colour' => 'required',
            'bg-colour' => 'required',
            'txt-colour' => 'required',

        ]);



        Band::create($request->all());



        return redirect()->route('home')

            ->with('success', 'EPK created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('band.show', compact('band'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bands = Band::pluck('name', 'img-id', 'bio', 'desc', 'yt-links', 'bg-colour', 'txt-colour', 'admin-id', 'id');
        return view('band.edit', compact('bands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band, $id)
    {
        $request->validate([

            'name' => 'required',
            'img-id' => 'required',
            'bio' => 'required',
            'desc' => 'required',
            'yt-links' => 'required',
            'bg-colour' => 'required',
            'bg-colour' => 'required',
            'txt-colour' => 'required',

        ]);

        $band->update($request->all());

        return redirect()->route('home')

            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band, $id)
    {
        $band->delete();



        return redirect()->route('home')

            ->with('success', 'Post deleted successfully');
    }
}
