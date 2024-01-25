<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Design_Images;
use App\Models\Niche;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

class PagesController extends Controller
{
    public function signin()
    {
        if (session()->has('user_added')) {
            return redirect('/dashboard');
        } else {
            return view('Authentication.signin');
        }
    }
    public function forget()
    {
        return view('Authentication.forget');
    }
    public function reset()
    {
        return view('Authentication.reset');
    }
    public function dashboard()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $compact = compact("user");
        return view('Pages.dashboard')->with($compact);
    }
    public function profile()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $compact = compact("user");
        return view('Pages.profile')->with($compact);
    }
    public function editProfile()
    {
        return view('Pages.profile_edit');
    }
    public function updateProfile(Request $request, $id)
    {
        User::where('id', $id)->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "contact_no" => $request->contact_no,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "zip_code" => $request->zip_code,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
}
