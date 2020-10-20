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
        <h2>Laporan Nasabah </h2>
        <h3>Masjid AL-Ukhuah</h3>
    </center>            
    <table class="table table-bordered" align="center" >
        <thead>
        <tr>
            <th>No.</th>
            <th>Kode Nasabah</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Kode Hewan</th>
            <th>Hewan</th>
            <th>Jenis Hewan</th>
            <th>Harga</th>
            <th>Tanggal</th>
        </tr>
        </thead>
        <tbody>
        @php $no = 1; @endphp
        @foreach($nasabah as $datas)
            <tr>
                <td>{{ $no++ }}</td>
                <td>NSBH-{{ $datas->id }}</td>
                <td>{{ $datas->nama }}</td>
                <td>{{ $datas->no_tlp }}</td>
                <td>{{ $datas->alamat }}</td>
                <td>DTHW-{{ $datas->id_detail_hewan }}</td>
                <td>{{ $datas->hewan }}</td>
                <td>{{ $datas->jenis }}</td>
                <td>{{ $datas->harga }}</td>
                <td>{{ $datas->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


            
