<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    public function changeWeaponStatus(Request $request,$id){
//        $request->validate([
//            'active' => 'accepted'
//        ]);
        $weapon = Weapon::find($id);
        $weapon->active = ($request->active === "on" ? 1 : 0 );
        $weapon->update(['active' => $weapon->active]);
        return redirect()->back()->with('status','Weapon Updated Successfully');
            //this is checked
    }

//        public function changeWeaponStatus(Request $request)
//    {
//        $weapon = Weapon::findOrFail($request->weapon_id);
//        $weapon->active = $request->active;
//        $weapon->save();
//
//        return response()->json(['success'=>'weapon status change successfully.']);
//    }
}
