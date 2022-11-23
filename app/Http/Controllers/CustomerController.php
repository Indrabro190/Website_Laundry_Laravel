<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CustomerController extends Controller
{

    public function index()
    {
        $data = Customer::all();
        return view('admin.master.customer.datacustomer', compact('data'));
    }

    public function customer()
    {
        return view('admin.master.customer.datacustomer');
    }

    public function datacustomer(Request $request)
    {
        if ($request->has('search')) {
            $data = Customer::where('namecustomer', 'LIKE', '%' . $request->search . '%')
                ->where('status', '1')->paginate(5);
        } else {
            $data = Customer::where('status', '1')->paginate(5);
        }

        return view('admin.master.customer.datacustomer', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namecustomer' => 'required|string|unique:customers|min:5|max:23',
            'alamat' => 'required|string',
            'jeniskelamin' => 'required',
            'notelepon' => 'required|numeric|min:12|unique:customers',
            ]);
            if($request->namecustomer === null || $request->alamat === null || $request->jeniskelamin === null || $request->notelepon === null){
                return redirect()->back();
            }
        Customer::create([
            'namecustomer' => $request->namecustomer,
            'alamat' => $request->alamat,
            'jeniskelamin' => $request->jeniskelamin,
            'notelepon' => $request->notelepon,
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            // 'update_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/datacustomer')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->namecustomer = $request->namecustomer;
        $customer->alamat = $request->alamat;
        $customer->jeniskelamin = $request->jeniskelamin;
        $customer->notelepon = $request->notelepon;
        // $customer->update_at = date('Y-m-d H:i:s');

        $customer->save();

        return redirect('/datacustomer')->with('success', 'Data Berhasil Diubah');
    }

    public function deletecustomer($id)
    {
        $data = Customer::find($id);
        $data->status = '0';
        $data->save();

        return redirect()->route('datacustomer')->with('success', 'Data Berhasil Di hapus');
    }
}
