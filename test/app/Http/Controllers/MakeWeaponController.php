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
        if(auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        //search bar function
        $weapontypes = Weapontype::all();
        $weapon = Weapon::latest();
        if (request('searchWeapons')){
            $weapon->where('weaponname', 'like', '%' . request('searchWeapons') . '%')
                ->orWhere('id', 'like', '%' . request('searchWeapons') . '%')
                ->orWhere('weaponlore', 'like', '%' . request('searchWeapons') . '%');

        }
        //filter function
        if (request('filter')){
            $weapon->where('weapontype_id', 'like', request('filter'));
        }
        //shows weapons database
        return view('Weapon.weaponsData', ['weapon' => $weapon->get()], ['weapontypes' => $weapontypes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $user = auth()->id();
        $favorites = DB::table('favorites')
        ->select('user_id')
            ->where('user_id', '=', $user)
            ->get();
        $count = $favorites->count();
        //if the current user is a guest, then give message 'Please log in first"
        if (auth()->guest()){
            return redirect()->back()->with('status', 'Please log in first');
        }
//        if user has favorited 3 weapons, then he can make a weapon
        if($count >= 3){
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
        $weapon = new Weapon();
        $weapon->weaponname = $request->input('weaponname');
        $weapon->weapontype_id = $request->input('weapontype');
        $weapon->weaponimg = $request->file('weaponimg')->storePublicly('weaponImages','public');
        $weapon->weaponimg = str_replace('weaponImages', '', $weapon->weaponimg);
        $weapon->weaponlore = $request->input('weaponlore');
        $weapon->active = 1;
        $weapon->save();
        return redirect()->back()->with('status','Weapon Added Successfully');
    }

    public function getWeapons ()
    {
        $weapontypes = Weapontype::all();
        //search bar function
        $weapon = Weapon::latest();
        if (request('searchWeapons')){
            $weapon->where('weaponname', 'like', '%' . request('searchWeapons') . '%')
            ->orWhere('weapontype_id', 'like', '%' . request('searchWeapons') . '%')
            ->orWhere('weaponlore', 'like', '%' . request('searchWeapons') . '%');
        }else{
            return redirect()->back()->with('status','No weapon found');
        }
        //filter function
        if (request('filter')){
            $weapon->where('weapontype_id', 'like',request('filter'));
        }

        //shows weapons view
        return view('Weapon.weapons', ['weapon' => $weapon->get()], ['weapontypes' => $weapontypes]);
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
        $weapon = Weapon::find($id);
        $weapontypes = Weapontype::all();
        return view('Weapon.edit-weapons', ['weapon' => $weapon], ['weapontypes' => $weapontypes]);
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
        $weapon = Weapon::find($id);
        $weapon->weaponname = $request->input('weaponname');
        $weapon->weapontype_id = $request->input('weapontype');
        $weapon->weaponimg = $request->file('weaponimg')->storePublicly('weaponImages','public');
        $weapon->weaponimg = str_replace('weaponImages', '', $weapon->weaponimg);
        $weapon->weaponlore = $request->input('weaponlore');
        $weapon->update();

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
        $weapon = Weapon::find($id);
        $weapon->delete();
        return redirect()->back()->with('status','Weapon Deleted Successfully');
    }
}

