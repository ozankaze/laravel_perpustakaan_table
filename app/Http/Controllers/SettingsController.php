<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('settings.profile');
    }

    public function editProfile()
    {
        return view('settings.edit-profile');
    }

    public function updateProfile(ProfileRequest $request)
    {
        // dd($id);
        $user = Auth::user($request);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Profil berhasil diubah"
        ]);
        
        return redirect('settings/profile')->route();
    }
}
