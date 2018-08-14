
@extends('layout.master')

@section('title', 'Womanagement - Data RO')

@section('content')
  <section class="content-header">
    <h1>
      Data SPK Charts
      <small>Berdasarkan Data Real (NO HOAX)</small>
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
      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Grafik EDC</h3>

          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="revenue-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

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
            <h3 class="box-title">Grafik  Jenis SPK</h3>

          </div>
          <div class="box-body chart-responsive">
            <div class="chart" id="line-chart" style="height: 300px;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

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
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

  </section>

  @endsection
