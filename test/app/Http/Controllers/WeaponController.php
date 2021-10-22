<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function filter()
    {
        return collect([1,2,3,4])->filter();
    }
}
