
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
  </section>


  @endsection
