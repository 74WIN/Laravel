<?php

namespace App\Http\Controllers;
use App\Models\Weapon;
use Illuminate\Http\Request;
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
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
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
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        return view('Weapon.make-weapons');
    }

//    public function search(Request $request)
//    {
//        {
//            $search = $request->input('search');
//            if (!$search) {
//                $weapon = Weapon::all()
//                    ->where('active', '=', 1);
//            } else {
//                $weapon = Weapon::where('name','like','%'.$search.'%')
//                    ->where('active', '=', 1)
//                    ->orderBy('id')
//                    ->paginate(6);
//            }
//            return view('Weapon.weapons', compact('weapon'));
//        }
//    }

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
        $weapon->weaponimg = $request->file('weaponimg')->storePublicly('images','public');
        $weapon->weaponimg = str_replace('images/', '', $weapon->weaponimg);
        $weapon->weaponlore = $request->input('weaponlore');
        $weapon->save();
        return redirect()->back()->with('status','Weapon Added Successfully');
    }

    public function getWeapons ()
    {
        $query = Input::get ( 'query' );
        $weapon = Weapon::where ( 'weaponname', 'LIKE', '%' . $query . '%' )->orWhere ( 'weapontype', 'LIKE', '%' . $query . '%' )->get ();
        if (count ( $weapon ) > 0)
            return redirect()->back()->with ($weapon)->withQuery ( $query );
        else
            return redirect()->back()->with ( 'No Details found. Try to search again !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        {
            $search = $request->input('search');
            if (!$search) {
                $weapon = Weapon::all();
//                    ->where('active', '=', 1);
                return view('Weapon.weapons', compact('weapon'));
            } else {
                $weapon = Weapon::where('weaponname','like','%'.$search.'%')
//                    ->where('active', '=', 1)
                    ->orderBy('id')
                    ->paginate(6);
            }
                return view('Weapon.weapons', compact('weapon'));
        }
//        $weapon = Weapon::all();
//        return view('Weapon.weapons', compact('weapon'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
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
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
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
    {   if(auth()->guest() || auth()->user()->role != 'admin'){
        abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
    }
        $weapon = Weapon::find($id);
        $weapon->delete();
        return redirect()->back()->with('status','Weapon Deleted Successfully');
    }
}

