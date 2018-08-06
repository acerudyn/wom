
@extends('layout.master')

@section('title', 'Sawunggalih - Restore Data')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Hotel Sawunggalih</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Restore Data</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

      <div class="callout callout-info">
        <h4>Restore Data !</h4>
        <p>Lakukan restore data dengan hasil backup data terbaru, karena akan mempengaruhi hasil akhir data dalam tabel.
        Sesuaikan data dengan tabel yang akan kamu restore untuk menghindari kesalahan/error proses restore data.</p>
      </div>

      <div class="row">

        <div class="col-md-4">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('memberImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-primary">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Jenis Kamar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('jenisKamarImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-success">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Kamar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('kamarImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-warning">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('pemesananImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-primary">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Menu Resto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('restoImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-success">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('transaksiImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-warning">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Transaksi Resto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('transaksiRestoImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-primary">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Gallery</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('galleryImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-success">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Konfirmasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('konfirmasiImport')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-warning">Import Excel File</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
