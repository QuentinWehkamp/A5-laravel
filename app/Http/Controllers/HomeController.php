<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $bands = collect();
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $bands = Band::where('name', 'like', '%'.$searchTerm.'%')->get();
        }
        
        return view('home', compact('bands'));
    }
}
