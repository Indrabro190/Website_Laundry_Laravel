<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Customer;
use App\Models\NamaPaket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\TransaksiExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->paginate(5);
        $customer = Customer::where('status', '1')->get();
        $cabang = Cabang::where('status', '1')->get();
        $namapaket = NamaPaket::where('status', '1')->get();

        return view('admin.laporan.transaksi.transaksi', compact('transaksi', 'customer', 'cabang', 'namapaket'));
    }

    public function deletetransaksi(Request $request){
       if(isset($request->ids)){
        Transaksi::with('customer','cabang','namapaket')->whereIn('id',$request->ids)->delete();
        return response()->json(['success' =>true, 'msg' => 'Transaksi berhasil Dihapus','ids' => $request->ids]);
       }

       return response()->json(['success' =>false, 'msg' => 'Transaksi tidak ditemukan!']);
        // $ids = $request->ids;
        // Transaksi::whereIn('id', $ids)->delete();

        // return redirect()->back()->with('success','Data Berhasil Dihapus');
    }

    public function transaksiexcel(Request $request)
    {
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        $customer = Customer::where('status', '1')->get();
        $cabang = Cabang::where('status', '1')->get();
        $namapaket = NamaPaket::where('status', '1')->get();
        // $total_bayar = Transaksi::where('total_bayar')->count();

        return view('admin.laporan.transaksi.excel', compact('transaksi', 'customer', 'cabang', 'namapaket'));
    }

    public function dashboard()
    {
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->paginate(5);
        $customer1 = Customer::count();
        $user = User::count();
        $paket = NamaPaket::count();
        $hitung = Transaksi::count();
        $customer = Customer::where('status', '1')->get();
        $cabang = Cabang::where('status', '1')->get();
        $namapaket = NamaPaket::where('status', '1')->get();


        // $total_bayar = Transaksi::select(DB::raw("CAST(SUM(total_bayar) as int) as total_bayar"))
        //     ->GroupBy(DB::raw("Month(created_at)"))
        //     ->pluck('total_bayar');

        $total_bayar = Transaksi::with('namapaket')->select(DB::raw("CAST(SUM('harga * Qty') as int) as total_bayar"))
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('total_bayar');

        $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->GroupBy(DB::raw("MONTHNAME(created_at)"))
            ->pluck('bulan');

        // $total_bayar1 = Transaksi::select(DB::raw("CAST(SUM(total_bayar) as int) as total_bayar"))
        //     ->GroupBy(DB::raw("Day(created_at)"))
        //     ->pluck('total_bayar');

        $harian = Transaksi::select(DB::raw("DAYNAME(created_at) as harian"))
            ->GroupBy(DB::raw("DAYNAME(created_at)"))
            ->pluck('harian');
        return view('dashboard', compact('transaksi', 'customer1','customer','namapaket','cabang', 'user','bulan', 'harian','hitung','total_bayar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cabang_id' => 'required',
            'customer_id' => 'required',
            'namapaket_id' => 'required',
            'estimasiselesai' => 'required',
            'jumlah_item' => 'required|numeric',
            'Qty' => 'required|numeric',
        ]);
        if ($request->cabang_id === null || $request->customer_id === null || $request->namapaket_id === null || $request->estimasiselesai === null || $request->jumlah_item === null || $request->Qty === null) {
            return redirect()->back();
        }
        Transaksi::create([
            'cabang_id' => $request->cabang_id,
            'customer_id' => $request->customer_id,
            'namapaket_id' => $request->namapaket_id,
            'estimasiselesai' => $request->estimasiselesai,
            'tanggalselesai' => date('Y-m-d H:i:s'),
            'jumlah_item' => $request->jumlah_item,
            'Qty' => $request->Qty,
            // 'total_bayar' => $request->total_bayar,
            'Status' => 'Sedang Dikerjakan',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/transaksi')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cabang_id' => 'required',
            'customer_id' => 'required',
            'namapaket_id' => 'required',
            'estimasiselesai' => 'required',
            'jumlah_item' => 'required',
            'Qty' => 'required',
            // 'total_bayar' => 'required',
        ]);
        if ($request->cabang_id === null || $request->customer_id === null || $request->namapaket_id === null || $request->estimasiselesai === null || $request->jumlah_item === null || $request->Qty === null) {
            return redirect()->back();
        }
        $transaksi = Transaksi::find($id);
        $transaksi->cabang_id = $request->cabang_id;
        $transaksi->customer_id = $request->customer_id;
        $transaksi->namapaket_id = $request->namapaket_id;
        $transaksi->estimasiselesai = $request->estimasiselesai;
        
        $transaksi->jumlah_item = $request->jumlah_item;
        $transaksi->Qty = $request->Qty;
        $transaksi->Status = $request->Status;
        $transaksi->save();

        return redirect('/transaksi')->with('success', 'Data Berhasil Diubah');
    }

    public function updatestatus(Request $request, $id)
    {
        if (Auth::user()->level == "admin") {
            $transaksi = Transaksi::find($id);
            $transaksi->Status = $request->Status;
            $transaksi->tanggalselesai = date('Y-m-d H:i:s');
            $transaksi->save();
        }

        return redirect('/transaksi')->with('success', 'Status Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Transaksi::where('id', $id)->delete();
        return redirect()->route('transaksi')->with('success', 'Data Berhasil Di hapus');
    }

    public static function exportpdf()
    {
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        $hitung = Transaksi::count();
        view()->share('transaksi', $transaksi);
        $pdf = PDF::loadview('admin.laporan.transaksi.laporan-pdf',compact('hitung'));
        return $pdf->download('laporan-transaksi.pdf');
    }

    public function laporan()
    {
        
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->paginate(5);
        $hitung = Transaksi::count();
        $customer = Customer::where('status', '1')->get();
        $cabang = Cabang::where('status', '1')->get();
        $namapaket = NamaPaket::where('status', '1')->get();

        $total_bayar = Transaksi::with('namapaket')->select(DB::raw("CAST(SUM('harga * Qty') as int) as total_bayar"))
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('total_bayar');
            
        return view('laporan', compact('transaksi','transaksi2', 'customer', 'cabang','hitung', 'namapaket','total_bayar'));
    }

    public function search(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');

        $query = DB::table('transaksis')->select()
            ->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to)
            ->get();

        $transaksi = Transaksi::where('created_at', '>=', $from)->where('created_at', '<=', $to)->with('customer', 'cabang', 'namapaket')->paginate(5);
        $customer = Customer::where('status', '1')->get();
        $customer1 = Customer::count();
        $hitung = Transaksi::count();
        $user = User::count();
        $paket = NamaPaket::count();
        $cabang = Cabang::all();
        $namapaket = NamaPaket::all();
        // $total_bayar = Transaksi::select(DB::raw("CAST(SUM(total_bayar) as int) as total_bayar"))
        //     ->GroupBy(DB::raw("Month(created_at)"))
        //     ->pluck('total_bayar');

        return view('search', compact('query', 'transaksi', 'customer1','customer', 'cabang', 'namapaket','hitung','user','paket'));
    }

    public function exportsearch(Request $request)
    {
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        view()->share('transaksi', $transaksi);
        $pdf = PDF::loadview('admin.laporan.transaksi.laporan-pdf-search');
        return $pdf->download('laporan-transaksi.pdf');
        return view('search', compact('transaksi'));
    }

    public function exportexcel(Request  $request)
    {
        return Excel::download(new TransaksiExport, 'laporan.xlsx');
    }

    public function pemesanan(Request $request){
        $transaksi = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        $selesai = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        $batal = Transaksi::with('customer', 'cabang', 'namapaket')->get();
        return view('admin.laporan.transaksi.pemesanan',compact('transaksi','selesai','batal'));
    }
}
