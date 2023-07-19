<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class TemplatedplController extends Controller
{
    public function index()
    {
        return view('templatedpl.data-guru')->with([
            'user' => Auth::user()
        ]);
    }
}