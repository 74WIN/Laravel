<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest() || auth()->user()->role != 'admin'){
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }
        //shows database
        $profile = User::latest();
        if (request('searchProfileData')){
            $profile->where('name', 'like', '%' . request('searchProfileData') . '%')
                ->orWhere('email', 'like', '%' . request('searchProfileData') . '%');
        }
        return view('Profile.profilesData', ['profile' => $profile->get()]);
    }

    public function show(User $user)
    {
        return view('Profile.profilesData');
    }
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
//    public function changeStatus(Request $request)
//    {
//        $user = User::find($request->user_id);
//        $user->status = $request->status;
//        $user->save();
//
//        return response()->json(['success'=>'Status change successfully.']);
//    }

    public function edit()
    {
        return view('profile/editProfile');
    }

    public function profileUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();

        return redirect()->back()->with('status','Profile Updated Successfully');
    }
}
