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

    <div class="card-body" id="transaksi">
        <div class="row">
            <div class="col col-lg-4 col-md-4">
                <h4 class="text-center" style="font-weight: 600;">Ringkasan Transaksi</h4>
                <table class="table table-bordered">
                    <tbody>

                        <tr align="center">
                            <td>Total Transaksi</td>
                            <td>{{$hitung}} Transaksi</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col col-lg-8 col-md-8">
                <h4 class="text-center">Rincian Transaksi</h4>
                <div class="table-responsive">
                    <table id="example" class="display nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Cabang</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach($transaksi as $index => $m)
                            @php
                            $total += $m->namapaket->harga * $m->Qty;
                            @endphp
                            <tr align="center">
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $m->created_at->format('d/m/Y')}}</td>
                                <td>{{ $m->cabang->namecabang }}</td>
                                <td>{{ $m->namapaket->namepaket }}</td>
                                <td>{{ $m->namapaket->harga }}</td>
                                <td>{{ $m->Qty }}</td>
                                <td>Rp. {{ number_format($m->namapaket->harga * $m->Qty) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>

</body>
<script>
  // scroll table
  $(document).ready(function() {
    $('#example').DataTable({
      scrollX: true,
    });

    $('#lb_total').text('Rp.{{number_format($total) }}');
    $('#lb_total1').text('Rp.{{number_format($total) }}');

  });
</script>

</html>