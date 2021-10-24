<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
        public function changeUserStatus(Request $request)
    {
        $weapon = Weapon::find($request->weapon_id);
        $weapon->status = $request->status;
        $weapon->save();

        return response()->json(['success'=>'weapon status change successfully.']);
    }
}
