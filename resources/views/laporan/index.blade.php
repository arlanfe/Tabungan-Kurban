@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Pilih Data Nasabah/Tabungan</div>
                <div class="panel-body">
                <form action="{{ route('laporan.nasabah') }}">
                    <a href="{{ route('laporan.indexN') }}" class=" btn btn-sm btn-primary">
                        Laporan Nasabah
                    </a>
                    
                    <a href="{{ route('laporan.indexT') }}" class=" btn btn-sm btn-primary">
                        Laporan Tabungan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


