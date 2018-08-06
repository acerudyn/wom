
@extends('layout.master')

@section('title', 'Purworejo - Dashboard')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>purworejoberirama.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

      <!-- /.row -->

  <div class="row">
   <div class="col-md-4"></div>
    <div class="col-md-4">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">{{$tampiledit->nama_karyawan}}</h3>
          <h5 class="widget-user-desc">{{$tampiledit->jabatan}}</h5>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('image/'.$tampiledit->foto)}}" alt="User Avatar">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">3,700</h5>
                <span class="description-text">LOGIN</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header">13,000</h5>
                <span class="description-text">ACTIVITY</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">2,100</h5>
                <span class="description-text">STATISTIC</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Profil</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{url('updateUser', Auth::user()->id)}}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3"
                 placeholder="Nama Admin" name="nama_karyawan" required value="{{$tampiledit->nama_karyawan}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3"
                 placeholder="Alamat" name="alamat_karyawan" required value="{{$tampiledit->alamat_karyawan}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">No. Tlp</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3"
                 placeholder="No. Tlp" name="kontak_karyawan" required value="{{$tampiledit->kontak_karyawan}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama RO</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" disabled
                 placeholder="Nama RO" name="nama_ro" required value="{{$tampiledit->nama_ro}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>

              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" disabled
                 placeholder="Jabatan" value="{{$tampiledit->jabatan}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-9">
                <input type="password" class="form-control" id="inputEmail3"
                 placeholder="Password" name="password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>

              <div class="col-sm-9">
                <input type="file" class="form-control" id="inputEmail3"
                 placeholder="Foto" name="foto">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a href="{{'/dashboard'}}"><div class="btn btn-warning pull-left">Cancel</div></a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
      <!-- /.box -->
    </div>
  </div>


    </section>
    <!-- /.content -->
@endsection
