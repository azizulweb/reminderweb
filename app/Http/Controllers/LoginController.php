<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    // Tampilkan form login
    public function showLoginForm()
        {
            return view('auth.login');
        }
        
    public function registrasi()
        {
            $agendas = Agenda::all();
            return view('auth.registrasi');  

        }

    public function daftar(Request $request)
    {
        // Buat user baru dengan password yang sudah di-hash
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Enkripsi password
        ]);

        // Jika ada file gambar yang diupload
        if ($request->hasFile('profile_picture')) {
            $filename = $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->move('images/', $filename);
            $user->profile_picture = $filename;
            $user->save();
        }

        return redirect('/')->with('success', 'Account created successfully');
    }

    // Handle login request
    public function login(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $user = Auth::user();
                // $url = route('agenda.index', ['id' => $user->id]);
                // dd($url); 
                
                return redirect()->route('agenda.index');
            }

            return back()->withErrors([
                'credentials' => 'Email & Password yang Anda masukkan tidak cocok',
            ]);
        
        }

    // Handle logout
    public function logout()
        {
            Auth::logout();
            return redirect('/');
        }
    
}
