<?php

namespace App\Http\Controllers;

use App\Models\Element;
use App\Models\weapon;
use Illuminate\Http\Request;
class MakeElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Element/make-elements');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $element = new Element();
        $element->elementname = $request->input('elementname');
        $element->elementtype = $request->input('elementtype');
        $element->elementimg = $request->input('elementimg');
        $element->elementlore = $request->input('elementlore');
        $element->save();
        return redirect()->back()->with('status','Element Added Successfully');
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
        return redirect('/make-weapons')->with('completed', 'Weapon has been updated');
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
        return redirect('make-weapons')->with('completed', 'Weapon has been deleted');
    }
}

