<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        return view('index');
    }

    public function katasandi(){
        return view('reset');
    }

    public function cek_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $password = $request->input('password');
        $email = $request->input('email');
        $status_login = '1';
        if(Auth::attempt(['email' => $email, 'password' => $password, 'status_login' => $status_login])){
            return redirect()->intended('/laundry')->with('success', 'Login Berhasil');
        }

        $userinfo = User::where('email', '=', $request->email)->first();

        if(!$userinfo){
            return back()->with('error', 'gagal, kami tidak mengenali alamat email Anda');
        }else{
            // check password
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('index', $userinfo->id);
                return redirect('laundry');
            }else{
                return back()->with('error','Password Salah');
            }
        }
        // if ($request->email === null || $request->password === null) {
        //     return redirect()->back();
        // }
        // $password = $request->input('password');
        // $email = $request->input('email');
        // $status_login = '1';
        
        // if(Auth::attempt(['email' => $email, 'password' => $password, 'status_login' => $status_login])){
        //     return redirect()->intended('/laundry')->with('success', 'Login Berhasil');
        // }else{
        //     return Redirect()->intended('/')->with('error', 'Email atau Password Salah');
        // }

    }

    public function register()
    {
        return view('register');
    }

    public function registeruser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:20|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);
        if ($request->name === null || $request->email === null || $request->password === null || $request->level === null) {
            return redirect()->back();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'status_login' => '1',
        ]);

        return redirect()->route('index')->with('success', 'Registrasi Berhasil');
    }

    public function logout(){
            Auth::logout();
            return redirect('/')->with('success', 'Logout Berhasil');
        }
    }