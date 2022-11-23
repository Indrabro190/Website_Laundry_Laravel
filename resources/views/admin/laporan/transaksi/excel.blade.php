<button><a href="/exportexcel">tes</a></button>
<table>
    <thead>
        <tr>
            <th></th>
            <th colspan="10" style="text-align: center;"><strong>Laporan Penjualan</strong></th>
        </tr>
        <tr>
            <th></th>
        </tr>
        <tr>
            <th style="width: 10px">#</th>
            <th class="text-center">Tanggal Transaksi</th>
            <th style="width: 100px">Cabang</th>
            <th class="text-center">Paket</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Total</th>
           
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($transaksi as $index => $m)
        <tr align="center">
            <td>{{$loop->iteration}}</td>
            <td>{{ $m->created_at->format('d/m/Y H:i:s A') }}</td>
            <td>{{ $m->cabang->namecabang }}</td>
            <td>{{ $m->namapaket->namepaket }}</td>
            <td>{{ $m->namapaket->harga }}</td>
            <td>{{ $m->Qty }}</td>
            <td>Rp. {{ number_format($m->namapaket->harga * $m->Qty) }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>