<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use Illuminate\Http\Request;
class MakeWeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weapon = Weapon::all();
        return view('weapon.weaponsData', compact('weapon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Weapon.make-weapons');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weapon = new Weapon();
        $weapon->weaponname = $request->input('weaponname');
        $weapon->weapontype = $request->input('weapontype');
        $weapon->weaponimg = $request->input('weaponimg');
        $weapon->weaponlore = $request->input('weaponlore');
        $weapon->save();
        return redirect()->back()->with('status','Weapon Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $weapon = Weapon::all();
        return view('Weapon.weapons', compact('weapon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weapon = Weapon::find($id);
        return view('Weapon.edit-weapons', compact('weapon'));
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
        $weapon = Weapon::find($id);
        $weapon->weaponname = $request->input('weaponname');
        $weapon->weapontype = $request->input('weapontype');
        $weapon->weaponimg = $request->input('weaponimg');
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
    {
        $weapon = Weapon::find($id);
        $weapon->delete();
        return redirect()->back()->with('status','Weapon Deleted Successfully');
    }
}

