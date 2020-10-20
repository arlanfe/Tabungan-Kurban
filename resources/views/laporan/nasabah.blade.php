@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Cetak Data Nasabah</div>
                <div class="panel-body">
                <form action="{{ route('laporan.nasabah') }}" target="blank">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="">Pilih Tanggal</label>
                    <input type="date" class="form-control" name="tglawalN">
                    <label for="">S/d</label>
                    <input type="date" class="form-control" name="tglakhirN">
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Cetak" class="btn btn-primary">
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


