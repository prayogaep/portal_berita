<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        if ($request->role == 'tidak') {
            $validatedData['is_admin'] = false;
        } else {
            $validatedData['is_admin'] = true;
        }

        $user = User::create($validatedData);

        Profile::create([
            'user_id' => $user->id,
            'nama' => $validatedData['name'],
            'foto' => 'default.png'
        ]);

        // $request->session()->flash('success', 'Registration successfull! please login!');
        Alert::success('Berhasil', 'User Berhasil ditambahkan');
        return redirect('/dashboard/users');
    }
}
