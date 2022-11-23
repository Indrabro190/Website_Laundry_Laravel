<?php

namespace App\Exports;

use App\Models\Cabang;
use App\Models\Customer;
use App\Models\NamaPaket;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransaksiExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.laporan.transaksi.excel',[
            'transaksi' => Transaksi::all(),
            'cabang' => Cabang::all(),
            'customer' => Customer::all(),
            'namapaket' => NamaPaket::all(),
        ]);
    }
}
