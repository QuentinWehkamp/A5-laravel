<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        // Add your account logic here
        return view('account.index');
    }
}
