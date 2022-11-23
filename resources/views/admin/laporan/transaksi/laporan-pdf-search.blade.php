<html>

<head>
    <style>
        #transaksi {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #transaksi td,
        #transaksi th {
            border: 1px solid #ddd;
            padding: 10px;
        }

        #transaksi tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #transaksi tr:hover {
            background-color: #ddd;
        }

        #transaksi th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 align="center">Laporan Transaksi</h1>

    <table id="transaksi">
        <tr>
            <th>Cabang</th>
            <th>Nama</th>
            <th>Paket</th>
            <th>Estimasi selesai</th>
            <th>Tanggal selesai</th>
            <th>Qty</th>
            <th>Jumlah Item</th>
            <th>Total</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($transaksi as $m)
        <tr>
            <td>{{$m->cabang->namecabang}}</td>
            <td>{{$m->customer->namecustomer}}</td>
            <td>{{$m->namapaket->namepaket}}</td>
            <td>{{$m->estimasiselesai}}</td>
            <td>{{$m->tanggalselesai}}</td>
            <td>{{$m->Qty}}</td>
            <td>{{$m->jumlah_item}}</td>
            <td>Rp. {{ number_format($m->total_bayar) }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>