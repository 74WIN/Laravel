<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use App\Models\User;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    //change status with weapon
    public function changeWeaponStatus(Request $request,$id){
        $weapon = Weapon::find($id);
        $weapon->active = ($request->active === "on" ? 1 : 0 );
        $weapon->update(['active' => $weapon->active]);
        return redirect()->back()->with('status','Weapon Updated Successfully');
    }
    public function favorite(Request $request){

        if (auth()->guest()){
            return redirect()->back()->with('status', 'Please log in first');
        }
        $user = User::find(auth()->id());
        $weapon = Weapon::find($request->input('id'));
        $weapon->user()->attach($user);
        $weapon->save();
        return redirect()->back();
    }
    public function unfavorite(Request $request){

        $user = User::find(auth()->id());
        $weapon = Weapon::find($request->input('id'));
        $weapon->user()->detach($user);
        $weapon->save();
        return redirect()->back();
    }

}
