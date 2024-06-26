<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;
use stdClass;
use App\Models\Band;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class BandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
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

            'name' => 'required|unique:bands|max:255',
            'logo' => 'required|file|mimes:jpg,jpeg,png,gif,webp',
            'bio' => 'required',
            'desc' => 'required',
            'yt-1' => 'required',
            'yt-2' => 'required',
            'yt-3' => 'required',
            'bgColour' => 'required',
            'txtColour' => 'required',
            'adminid' => 'required'
        ]);

        // logo naam veranderen om file conflicts te voorkomen
        $nameLogo = $request->input('name');
        $nameLogo = str_replace(' ', '_', $nameLogo);
        date_default_timezone_set("Europe/Berlin");
        $filename = $nameLogo . date("Y-m-d") . "_" . time() . '.jpg';
        $path = $request->file('logo')->storeAs(
            'public/logo',
            $filename
        );
        $pathsave = str_replace("public", "storage", $path);

        $ytlinks = new stdClass();
        $ytlinks->yt0 = $request->input('yt-1');
        $ytlinks->yt1 = $request->input('yt-2');
        $ytlinks->yt2 = $request->input('yt-3');
        if (!empty($request->input('yt-4'))) {
            $ytlinks->yt3 = $request->input('yt-4');
        }
        $ytjson = json_encode($ytlinks);

        $adminids = new stdClass();
        $adminids->id = $request->input('adminid');
        $adminJson = json_encode($adminids);

        $band = new Band();
        $band->name = $request->name;
        $band->imgid = $pathsave;
        $band->bio = $request->bio;
        $band->desc = $request->desc;
        $band->ytlinks = $ytjson;
        $band->bgcolour = $request->bgColour;
        $band->txtcolour = $request->txtColour;
        $band->adminid = auth()->id();
        $band->save();
        $band->admins()->attach(Auth::user());
        $band->save();
        
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
        $band = Band::find($id);
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
        $band = Band::find($id);
        return view('band.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(Request $request, Band $band)
    {
        $request->validate([
            // unique in de naam zorgt voor een conflict dus ik heb het gemaakt dat je de naam niet kan veranderen 
            // 'name' => 'required|unique:bands|max:255',
            'logo' => 'file|mimes:jpg,jpeg,png,gif,webp',
            'pathsave' => 'required',
            'bio' => 'required',
            'desc' => 'required',
            'yt-1' => 'required',
            'yt-2' => 'required',
            'yt-3' => 'required',
            'bgColour' => 'required',
            'txtColour' => 'required',
        ]);

        if (isset($request->logo)) {
            // logo naam veranderen om file conflicts te voorkomen
            $nameLogo = $request->input('name');
            $nameLogo = str_replace(' ', '_', $nameLogo);
            date_default_timezone_set("Europe/Berlin");
            $filename = $nameLogo . date("Y-m-d") . "_" . time() . '.jpg';
            $path = $request->file('logo')->storeAs(
                'public/logo',
                $filename
            );
            $pathsave = str_replace("public", "storage", $path);
            // $band->imgid = $pathsave;
        } else {
            $pathsave = $request->input('pathsave');
        }

        $ytlinks = new stdClass();
        $ytlinks->yt0 = $request->input('yt-1');
        $ytlinks->yt1 = $request->input('yt-2');
        $ytlinks->yt2 = $request->input('yt-3');
        if (!empty($request->input('yt-4'))) {
            $ytlinks->yt3 = $request->input('yt-4');
        }
        $ytjson = json_encode($ytlinks);

        
        
        $band->update([
            // 'name' => $request->name,
            'imgid' => $pathsave,
            'bio' => $request->bio,
            'desc' => $request->desc,
            'ytlinks' => $ytjson,
            'bgcolour' => $request->bgColour,
            'txtcolour' => $request->txtColour,
        ]);

        if (!empty($request->addadmin)) {
            $band->admins()->attach($request->addadmin);
        }
        if (!empty($request->remadmin)) {
            $band->admins()->detach($request->remadmin);
        }
        $band->save();
        
        return redirect()->route('home')

            ->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        $band->delete();



        return redirect()->route('home')

            ->with('success', 'Post deleted successfully');
    }
}
