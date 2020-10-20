<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
            table tr td,
            table tr th {
                font-size: 9pt;

            }
    </style>
</head>
<body>
    <center>
        <h2>Laporan Tabungan </h2>
        <h3>Masjid AL-Ukhuah</h3>
    </center>            
    <table class="table table-bordered" align="center" >
        <thead>
        <tr>
            <th>No.</th>
            <th>Kode Nasabah</th>
            <th>Nama</th>
            <th>Hewan</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Tabungan</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @php $no = 1; @endphp
        @foreach($tabungan as $datas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>NSBH-{{ $datas->id_nasabah }}</td>
                <td>{{ $datas->nama }}</td>
                <td>{{ $datas->hewan }}</td>
                <td>{{ $datas->berat }}</td>
                <td>{{ $datas->harga }}</td>
                <td>{{ $datas->nominal }}</td>
                <td>{{ $datas->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


            
