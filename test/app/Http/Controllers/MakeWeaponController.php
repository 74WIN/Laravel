<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeWeaponController extends Controller
{
    public function index()
    {
        return view('/Weapon/make-weapons');
    }
}
