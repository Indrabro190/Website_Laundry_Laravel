<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\NamaPaket;
use App\Models\TipePaket;
use Illuminate\Http\Request;

class NamaPaketController extends Controller
{
    public function index()
    {
        return view('admin.master.namapaket.datapaket');
    }

    public function deletepaket($id)
    {
        $data = NamaPaket::find($id);
        $data->status = '0';
        $data->save();
        return redirect()->route('datapaket')->with('success', 'Data Berhasil Di hapus');
    }

    public function datapaket(Request $request)
    {
        $namapaket = NamaPaket::with('tipepaket', 'satuan')->get();
        $tipepaket = TipePaket::where('status', '1')->get();
        $satuan = Satuan::where('status','1')->get();
        if ($request->has('search')) {
            $namapaket = NamaPaket::where('namepaket', 'LIKE', '%' . $request->search . '%')->where('status', '1')->paginate(5);
        } else {
            $namapaket = NamaPaket::where('status', '1')->paginate(5);
        }
        return view('admin.master.namapaket.datapaket', compact('namapaket', 'tipepaket', 'satuan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namepaket' => 'required|string|unique:nama_pakets|min:5|max:23',
        ]);
        if ($request->namepaket === null | $request->tipepaket_id === null | $request->satuan_id === null) {
            return redirect()->back();
        }
        NamaPaket::create([
            'tipepaket_id' => $request->tipepaket_id,
            'satuan_id' => $request->satuan_id,
            'namepaket' => $request->namepaket,
            'harga' => $request->harga,
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            // 'update_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/datapaket')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $paket = NamaPaket::find($id);
        $paket->tipepaket_id = $request->tipepaket_id;
        $paket->satuan_id = $request->satuan_id;
        $paket->namepaket = $request->namepaket;
        $paket->harga = $request->harga;
        // $paket->update_at = date('Y-m-d H:i:s');

        $paket->save();

        return redirect('/datapaket')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $paket = NamaPaket::find($id);
        $paket->status = '0';
        $paket->delete();

        return redirect('/datapaket')->with('success', 'Data Berhasil Diubah');
    }
}
