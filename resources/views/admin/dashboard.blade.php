
@extends('layout.master')

@section('title', 'Womanagement - Dashboard')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

      <div class="callout callout-info">
        <h4>Tip!</h4>

        <p>Hello Admin, Saya harap dalam pengisian data diusahakan secara teliti dan detail. Supaya tidak terjadi
        kesalapahaman dalam data. Hello Admin, Saya harap dalam pengisian data diusahakan secara teliti dan detail. Supaya tidak terjadi
        kesalapahaman dalam data.</p>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Users</span>
              <span class="info-box-number">{{$users}}<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-hourglass-half"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Log User</span>
              <span class="info-box-number">0<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-map"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data RO</span>
              <span class="info-box-number">{{$ro}}<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-map-marker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Kota</span>
              <span class="info-box-number">{{$mso}}<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-building-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Partner</span>
              <span class="info-box-number">{{$partner}}<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-file-excel-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Spk</span>
              <span class="info-box-number">{{$spk}}<small> Data</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
