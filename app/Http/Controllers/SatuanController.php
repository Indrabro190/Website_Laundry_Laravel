<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function datasatuan(Request $request){
        $data = Satuan::where('status', '1')->get();
        return view('admin.master.satuan.satuan',compact('data'));
    }

    public function store(Request $request){
        $request->validate([
            'satuan' => 'required|unique:satuans',
            ]);
            if($request->satuan === null){
                return redirect()->back();
            }
        Satuan::create([
            'satuan' => $request->satuan,
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            // 'update_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/datasatuan')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::find($id);
        $satuan->satuan = $request->satuan;
        // $satuan->update_at = date('Y-m-d H:i:s');

        $satuan->save();

        return redirect('/datasatuan')->with('success', 'Data Berhasil Diubah');
    }

    public function deletesatuan($id)
    {
        $satuan = Satuan::find($id);
        $satuan->status = '0';
        $satuan->save();

        return redirect('/datasatuan')->with('success', 'Data Berhasil Diubah');
    }
}
