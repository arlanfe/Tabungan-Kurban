
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tabungan</div>
                <div class="panel-body">
                <form action="{{ route('tabungan.update', $Tabungan) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label for="">Nama | Kode Nasabah</label>
                    <select name="nama" id="nama" class="form-control js-example-basic-single" disabled="true">
                        @foreach ($Nasabah as $list)
                        <option value=" {{ $list->id }} "
                            @if ($list->id === $Tabungan->id_nasabah)
                            selected
                            @endif
                            >
                            {{ $list->nama }} | NSBH-{{ $list->id }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" class="form-control" name="nm" id="nm" value="{{ $Tabungan->id_nasabah }}">
                <div class="form-group">
                    <label for="">Hewan</label>
                    <input type="text" class="form-control" name="hewan" id="hewan" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Berat</label>
                    <input type="number" class="form-control" name="berat" id="berat" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" value="" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tabungan Sebelumnya</label>
                    <input type="number" class="hitung form-control" name="tabungan" id="tabungan" value="{{ $Tabungan->nominal }}" readonly>
                    <input type="hidden" class="hitung form-control" name="saldo" id="saldo" readonly>
                    <input type="hidden" class="hitung form-control" name="jumlah" id="jumlah" readonly>
                </div>
                <div class="form-group">
                    <label for="" class="">Penyesuaian Tabungan</label>
                    <input type="number" class="hitung form-control" name="newtab" id="newtab" value="">
                </div>
                <p id="alertOver" style="display: none;color: red"> Tabungan Melebihi Harga/Sudah Lunas </p>
                <div class="form-group">
                    <input type="submit" id="btnSimpan" value="Simpan" class="btn btn-primary">
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //select2
    $(document).ready(function() {

        $('.js-example-basic-single').select2();
        let idN = $("#nama").val();
        getDetailTrans(idN);
        apiNominalTransaksi(idN);
        
        $('#nama').change(function() {
            let idN = $("#nama").val();
            getDetailTrans(idN);
            apiNominalTransaksi(idN);
        });

        $('#newtab').keyup(function() {                     
            var total = parseInt($('#newtab').val()) + parseInt($('#saldo').val());
            $('#jumlah').val(total);
            console.log(total);
            
            var harga = parseInt($('#harga').val());
            var jumlah = $('#jumlah').val();
            // console.log(jumlah+'<'+harga);
            
            // if (jumlah > harga) {
            //     $('#alertOver').show();
            //     $('#btnSimpan').hide();
            // } else {
            //     $('#btnSimpan').show();
            //     $('#alertOver').hide();
            // }
            // alertOver

        });

    });


    //dependency
    function getDetailTrans(idN) {
        
        jQuery.ajax({
            type: "GET",
                url: "/api/detailTrans/"+idN, //ieyu url api kan isina json
                    success: function (data) {
                        //  console.log(data[0]); 
                        $('#hewan').val(data[0].hewan);
                        $('#berat').val(data[0].berat);
                        $('#harga').val(data[0].harga);
                    },
                async: false
            })
    }
    
    //penjumlahan
    function apiNominalTransaksi(idN) {
        
        jQuery.ajax({
            type: "GET",
                url: "/api/nominalTrans/"+idN, 
                    success: function (data) {
                         if (data.length > 0) {
                            $('#saldo').val(data[0].nominal);
                         } else {
                            $('#saldo').val(0);
                            $('#jumlah').val(0);
                            $('#tabungan').val(0);
                         }
                    },
                async: false
            })
    }

   

</script>
@endsection

