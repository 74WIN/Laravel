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
        //shows database
        $weapon = Weapon::all();
        return view('weapon.weaponsData', ['weapon' => $weapon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //shows make-weapon view
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
        //validate the forms
        $request->validate([
            'weaponname' => 'required||max:255',
            'weapontype' => 'required||max:255',
            'weaponimg' => 'required',
            'weaponlore' => 'required',
        ]);
        //stores weapons in database. The images are stored in a public storage filemap
        $weapon = new Weapon();
        $weapon->weaponname = $request->input('weaponname');
        $weapon->weapontype = $request->input('weapontype');
        $weapon->weaponimg = $request->file('weaponimg')->storePublicly('images','public');
        $weapon->weaponimg = str_replace('images', '', $weapon->weaponimg);
        $weapon->weaponlore = $request->input('weaponlore');
        $weapon->save();
        return redirect()->back()->with('status','Weapon Added Successfully');
    }

    public function getWeapons ()
    {
        //search bar function
        $weapon = Weapon::latest();
        if (request('search')){
            $weapon->where('weaponname', 'like', '%' . request('search') . '%')
            ->orWhere('weapontype', 'like', '%' . request('search') . '%')
            ->orWhere('weaponlore', 'like', '%' . request('search') . '%');
        }
        //filter function
        if (request('filter')){
            $weapon->where('weapontype', 'like', request('filter'));
        }
        //shows weapons view
        return view('Weapon.weapons', ['weapon' => $weapon->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
//        {
//            $search = $request->input('search');
//           if (!$search) {
//               $weapon = Weapon::all()
//                   ->where('active', '=', 1);
//          } else {
//                $weapon = Weapon::where('weaponname','like','%'.$search.'%')
//                    ->where('active', '=', 1)
//                 ->orderBy('id')
//                   ->paginate(6);
//           }
//               return view('Weapon.weapons', compact('weapon'));
//        }
//       $weapon = Weapon::all();
//       return view('Weapon.weapons', ['weapons' => $weapon]));
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

        //shows edit view based on ID
        $weapon = Weapon::find($id);
        return view('Weapon.edit-weapons', ['weapon' => $weapon]);
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
        $weapon->weapontype = $request->input('weapontype');
        $weapon->weaponimg = $request->file('weaponimg')->storePublicly('images','public');
        $weapon->weaponimg = str_replace('images', '', $weapon->weaponimg);
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

