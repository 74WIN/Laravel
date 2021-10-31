<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Weapon;
use App\Models\Weapontype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class MakeWeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //checks if the user role is admin
        if(auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        //search bar function
        $weapontypes = Weapontype::all();
        $weapons = Weapon::latest();
        if (request('searchWeapons')){
            $weapons->where('weaponname', 'like', '%' . request('searchWeapons') . '%')
                ->orWhere('id', 'like', '%' . request('searchWeapons') . '%')
                ->orWhere('weaponlore', 'like', '%' . request('searchWeapons') . '%');

        }
        //filter function
        if (request('filter')){
            $weapons->where('weapontype_id', 'like', request('filter'));
        }
        //shows weapons database
        return view('Weapon.weaponsData', ['weapons' => $weapons->get()], ['weapontypes' => $weapontypes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {   //find the user based on id and gets the favorites
        $user = auth()->id();
        $favorites = Favorite::where('user_id', '=', $user)->get()->count();
        //if the current user is a guest, then give message 'Please log in first"
        if (auth()->guest()){
            return redirect()->back()->with('status', 'Please log in first');
        }
        //if user has favorited 3 weapons, then he can make a weapon
        if($favorites >= 3){
            $weapontypes = Weapontype::all();
            //shows make-weapon view
            return view('Weapon.make-weapons', ['weapontypes' => $weapontypes]);
        }else{
            return redirect()->back()->with('status', 'You need 3 favorites to unlock this feature');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the forms
        $request->validate([
            'weaponname' => 'required||max:255',
            'weapontype' => 'required||max:255',
            'weaponimg' => 'required',
            'weaponlore' => 'required',

        ]);
        //stores weapons in database. The weaponImages are stored in a public storage filemap
        $weapons = new Weapon();
        $weapons->weaponname = $request->input('weaponname');
        $weapons->weapontype_id = $request->input('weapontype');
        $weapons->weaponimg = $request->file('weaponimg')->storePublicly('weaponImages','public');
        $weapons->weaponimg = str_replace('weaponImages', '', $weapons->weaponimg);
        $weapons->weaponlore = $request->input('weaponlore');
        $weapons->active = 1;
        $weapons->save();
        return redirect()->back()->with('status','Weapon Added Successfully');
    }

    public function getWeapons ()
    {
        $weapontypes = Weapontype::all();
        //search bar function
        $weapons = Weapon::latest();
        if (request('searchWeapons')){
            $weapons->where('weaponname', 'like', '%' . request('searchWeapons') . '%')
            ->orWhere('weapontype_id', 'like', '%' . request('searchWeapons') . '%')
            ->orWhere('weaponlore', 'like', '%' . request('searchWeapons') . '%');
        }
        //filter function
        if (request('filter')){
            $weapons->where('weapontype_id', 'like',request('filter'));
        }
        //shows weapons view
        return view('Weapon.weapons', ['weapons' => $weapons->get()], ['weapontypes' => $weapontypes]);
    }

    public function weaponsDetail ($id)
    {
        $weapon = Weapon::find($id);
        //shows weapons view
        return view('Weapon.weaponsDetail', ['weapon' => $weapon]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }

        //shows edit view based on ID
        $weapons = Weapon::find($id);
        $weapontypes = Weapontype::all();
        return view('Weapon.edit-weapons', ['weapons' => $weapons], ['weapontypes' => $weapontypes]);
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
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        $request->validate([
        'weaponname' => 'required||max:255',
        'weapontype' => 'required||max:255',
        'weaponimg' => 'required',
        'weaponlore' => 'required',
    ]);
        //update function based on ID
        $weapons = Weapon::find($id);
        $weapons->weaponname = $request->input('weaponname');
        $weapons->weapontype_id = $request->input('weapontype');
        $weapons->weaponimg = $request->file('weaponimg')->storePublicly('weaponImages','public');
        $weapons->weaponimg = str_replace('weaponImages', '', $weapons->weaponimg);
        $weapons->weaponlore = $request->input('weaponlore');
        $weapons->update();

        return redirect()->back()->with('status','Weapon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   if(auth()->guest() || auth()->user()->role != 'admin'){
        abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
    }
    //destroys weapon based on ID
        $weapons = Weapon::find($id);
        $weapons->delete();
        return redirect()->back()->with('status','Weapon Deleted Successfully');
    }
}

