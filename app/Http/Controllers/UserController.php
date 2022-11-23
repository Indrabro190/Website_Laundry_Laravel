<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status_login', '1')->get();
        return view('admin.master.user.user', compact('user'));
    }

    public function user()
    {
        return view('user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users|min:5',
            'email' => 'required|email|string|unique:users',
            'password' => 'required',
            'level' => 'required',
        ]);
        if ($request->name === null || $request->email === null || $request->password === null || $request->level === null) {
            return redirect()->back();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status_login' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            // 'update_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/user')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        // $user->update_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect('/user')->with('success', 'Data Berhasil Diubah');
    }

    // public function destroy($id)
    // {
    //     if (User::where('status_login','1')) {
    //         echo "User tidak bisa dihapus karena user sedang login";
    //     } else {
    //         $user = User::find($id);
    //         $user->status_login = '0';
    //         $user->save();
    //     }
    //     return redirect('/user')->with('success', 'Data Berhasil Dihapus');
    // }

    public function deleteuser($id)
    {
        $user = User::find($id);
        if ($user->status_login == 1) {
            return redirect('user')->with('error', 'data tidak bisa dihapus');
        }
        if ($user->status_login == 0) {
            return redirect()->intended('/user')->with('success', 'data sudah dihapus');
        }
    }
    public function dataprofile()
    {
        $user = User::all();
        return view('dataprofile', compact('user'));
    }

    public function update1(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        return redirect('/dataprofile')->with('success', 'Data Profile Berhasil Diubah');
    }
}
