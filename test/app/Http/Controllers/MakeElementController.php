<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeElementController extends Controller
{
    public function index()
    {
        return view('/Element/make-element');
    }
}
