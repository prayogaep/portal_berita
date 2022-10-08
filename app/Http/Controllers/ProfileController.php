<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index($id)
    {
        $id = base64_decode($id);
        $profile = Profile::where('user_id', $id)->first();
        return view('dashboard.profile.index', compact('profile'));
    }

    public function show($id)
    {
        $id = base64_decode($id);
        $profile = Profile::where('user_id', $id)->first();
        return view('dashboard.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $rules = [
            'nama' => 'required',
            'description' => 'required',
            'profesi' => 'required',
            'contact' => 'required',
        ];
        if ($request->file('image')) {
            $rules['image'] = 'required|mimes:jpg,png,jpeg';
        }
        if ($request->email) {
            $rules['email'] = 'required|email';
        }
        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            if ($profile->foto != 'default.png') {
                unlink(public_path("profile/" . $profile->foto));
            }
            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/profile';
            $file->move($destinationPath,$fileName);
            $validatedData['image'] = $fileName;

            $profile->foto = $validatedData['image'];
        }


        $profile->nama = $validatedData['nama'];
        $profile->description = $validatedData['description'];
        $profile->profesi = $validatedData['profesi'];
        $profile->contact = $validatedData['contact'];
        $profile->update();
        $user = User::find($profile->user_id);
        $user->email = strip_tags($request->email);
        $user->username = strip_tags($request->username);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update();
        Alert::success('Berhasil', 'Profile Berhasil di update');

        return redirect("dashboard/profile/" . base64_encode($profile->user_id));

    }
}
