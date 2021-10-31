<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
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
    public function favorite($id){

        if (auth()->guest()){
            return redirect()->back()->with('status', 'Please log in first');
        }
        $user = User::find(auth()->id());
        $weapon = Weapon::find($id);
        $weapon->user()->attach($user);
        $weapon->save();
        return redirect()->back();
    }
    public function unfavorite($id){

        $user = User::find(auth()->id());
        $weapon = Weapon::find($id);
        $weapon->user()->detach($user);
        $weapon->save();
        return redirect()->back();
    }

    public function myFavorites($id){
        $user = User::find(auth()->id());
        $favorites = Favorite::find($id);
        return view('Weapon.favorites', ['favorites' => $favorites]);
    }

}
