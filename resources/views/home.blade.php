@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Beranda</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="panel panel-defaul" id="chartH"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('chart')
<script src="assets/js/highcharts.js"></script>
    <script>
                Highcharts.chart('chartH', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Nasabah'
            },
            subtitle: {
                text: 'Tabunan Kurban Al-Ukhuah'
            },
            xAxis: {
                categories: {!!json_encode($categoris)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Orang'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Orang</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Nasabah',
                data: {!!json_encode($data)!!}

            }]
        });
    </script>
@endsection