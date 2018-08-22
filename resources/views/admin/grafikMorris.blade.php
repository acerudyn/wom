
@extends('layout.master')

@section('title', 'Womanagement - Statistic')

@section('content')
  <section class="content-header">
    <h1>
      Data SPK Charts
      <small>Berdasarkan Data Realtime</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Charts</a></li>
      <li class="active">Morris</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Filter Chart</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" action="{{'storeChart'}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
              <label label for="inputEmail3" class="col-sm-2 control-label">Pilih RO</label>
              <div class="col-sm-9">
                <select class="form-control" name="ro" required>
                  <option value="all">Semua RO</option>
                  @foreach($data_ro as $data)
                    <option value="{{$data->kota_ro}}">{{$data->nama_ro}}</option>
                  @endforeach
                </select>
             </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
              <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="awal_periode"
                  name="awal_periode" required>
               </div>
              </div>

              <label for="inputEmail3" class="col-sm-1 control-label">Sampai</label>
              <div class="col-sm-4">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="akhir_periode"
                  name="akhir_periode" required>
               </div>
              </div>
            </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Show</button>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->

      <div class="col-md-12">
        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Status SPK</h3>

          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="bar-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->

      <div class="col-md-6">
        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Partner</h3>

          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Jenis SPK</h3>

          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="line-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

    <!-- jQuery 2.2.3 -->
    <script src="{{asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>

    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>
    <script src="{{asset('admin/plugins/morris/morris-new.min.js')}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{asset('admin/plugins/chartjs/Chart.min.js')}}"></script>


<!-- ========== BAR CHARTS ========== -->
<script>
    var data_grafik = JSON.parse('{!! $grafik !!}');

    new Morris.Bar({
        // ID of the element in which to draw the chart.
        element: 'bar-chart',
        resize: true,
        data: data_grafik,
        barColors: ['#10b5e8', '#f7ce04', '#69f704', '#ef3a26'],
        xkey: 'date',
        ykeys: ['cm', 'pm', 'psg', 'trk'],
        labels: ['CM', 'PM', 'Pasang', 'Tarik'],
        hideHover: 'auto'
    });
</script>

<script>

  /* <============================= MORRIS CHART =============================> */
    $(function () {
      "use strict";

      // LINE CHART
      var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
          {y: '2011 Q1', psg: 2666, pm: 2000, cm: 3000, trk: 1000},
          {y: '2011 Q2', psg: 2778, pm: 1999, cm: 3980, trk: 1500},
          {y: '2011 Q3', psg: 4912, pm: 2500, cm: 3090, trk: 1979},
          {y: '2011 Q4', psg: 3767, pm: 2790, cm: 3896, trk: 1080}
        ],
        xkey: 'y',
        ykeys: ['psg', 'pm', 'cm', 'trk'],
        labels: ['Pasang', 'PM', 'CM', 'Tarik'],
        lineColors: ['#ef3a26', '#f7ce04', '#69f704', '#0485f7'],
        hideHover: 'auto'
      });

      //DONUT CHART
      var donut = new Morris.Donut({
        element: 'sales-chart',
        resize: true,
        colors: ["#ef3a26", "#f7ce04", "#045bce", "#69f704", "#f3f724", "#10b5e8"],
        data: [
          {label: "Sinarmas", value: 32},
          {label: "Danamon", value: 20},
          {label: "Mandiri", value: 13},
          {label: "BRI", value: 30},
          {label: "BNI", value: 27},
          {label: "BCA", value: 25}
        ],
        hideHover: 'auto'
      });

      //BAR CHART
      /*
      var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Jan', a: 100, b: 90, c: 100, d: 90, e: 90},
        {y: 'Feb', a: 75,  b: 65, c: 100, d: 90, e: 90},
        {y: 'Mar', a: 50,  b: 40, c: 100, d: 90, e: 90},
        {y: 'Apr', a: 75,  b: 65, c: 100, d: 90, e: 90},
        {y: 'Mei', a: 50,  b: 40, c: 100, d: 90, e: 90},
        {y: 'Jun', a: 75,  b: 65, c: 100, d: 90, e: 90},
        {y: 'Jul', a: 100, b: 90, c: 100, d: 90, e: 90}
      ],
      barColors: ['#69f704', '#ef3a26', '#f3f724', '#f48c42', '#10b5e8'],
      xkey: 'y',
      ykeys: ['a', 'b', 'c', 'd', 'e'],
      labels: ['SELESAI', 'CANCEL', 'PENDING', 'TUNGGU VALIDASI', 'ON PROGRESS'],
      hideHover: 'auto'
      [
      {"date":"2018-08-06","value":3},
      {"date":"2018-08-05","value":3}
    ]
    });
    */

    });

</script>


  </section>


  @endsection
