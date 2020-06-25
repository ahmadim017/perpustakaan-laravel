@extends('layouts.adminlte')

@section('tittle')
    Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$book}}</h3>

            <p>Koleksi Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-open"></i>
          </div>
          <a href="{{route('admin.book.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$author}}</h3>

            <p>Penulis</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{route('admin.author.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$borrow}}</h3>

            <p>Peminjaman Buku</p>
          </div>
          <div class="icon">
            <i class="fas fa-book-medical"></i>
          </div>
          <a href="{{route('admin.buku.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$kembali}}</h3>

            <p>Yang diKembalikan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    
        <div class="row">
            <div class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-tittle">Kategori</h4>
                        <div class="card-body">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-tittle">Penulis</h4>
                        <div class="card-body">
                            <div id="container1"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
@endsection

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});

Highcharts.chart('container1', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: {!!json_encode($penulis)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Buku',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Buku',
        data: {!!json_encode($total)!!},
        color: '#f45b5b'
    }]
});
</script>
    
@endpush
