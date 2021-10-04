<?php

namespace App\Http\Controllers;

use App\Models\weapon;
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
        return view('Weapon/make-weapons', compact('weapon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Weapon/create-weapons');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'weaponname',
            'weawpontype',
            'weaponimg',
            'weaponlore'
        ]);
        $weapon = Weapon::create($storeData);

        return redirect('/Weapon/make-weapons')->with('completed', 'Your weapon has been created!');
        //$post = new Weapon()
        /*$post->weaponname = $request->weaponname;
        $post->weapontype = $request->weapontype;
        $post->weaponimg = $request->weaponimg;
        $post->weaponlore = $request->weaponlore;
        $post->save();*/


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weapon = Weapon::findOrFail($id);
        return view('edit', compact('weapon'));
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
        $updateData = $request->validate([
        'weaponname' => 'required|max:255',
        'weawpontype' => 'required|max:255',
        'weaponimg' => 'required|file',
        'weaponlore' => 'required|max:255',
            ]);
        Weapon::whereId($id)->update($updateData);
        return redirect('Weapon/make-weapons')->with('completed', 'Weapon has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $weapon = Weapon::findOrFail($id);
        $weapon->delete();
        return redirect('Weapon/make-weapons')->with('completed', 'Weapon has been deleted');
    }
}
