<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(1);
        $bands = $user->bands; 
        // $user = auth()->user();
        // $bands = $user->bands;

        return view('account.index', ['bands' => $bands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('account.edit');
    }

    public function changePassword()
    {
        return view('account.change-password');
    }

    public function updatePassword(Request $request)
    {

        #password validation
        $request->validate([
            'new_password' => 'required|confirmed',
        ]);


        #password update
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('account.index')->with("success", "Uw wachtwoord is succesvol bewerkt!");
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
        $name = $request->input('naam');
        $email = $request->input('email');

        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'naam' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $validator->setCustomMessages([
            'email.unique' => 'Dit emailadres is al in gebruik',
        ]);

        if ($validator->fails()) {
            return redirect()->route('account.edit', $id)->withErrors($validator)->withInput();
        }

        $user->name = $request->naam;
        $user->email = $request->email;
        $user->save();

        if ($user->wasChanged()) {
            return redirect()->route('account.index')->with('success', 'Uw gegevens zijn succesvol aangepast!');
        } else {
            return redirect()->route('account.index')->with('error', 'Er waren geen gegevens aangepast.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
