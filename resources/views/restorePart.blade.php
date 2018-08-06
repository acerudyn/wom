
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

      <div class="callout callout-warning">
        <h4>Restore Data Alternatif !</h4>
        <p>Langkah ini adalah alternatif jika tidak bisa direstore pada halaman <a href="{{url('restore')}}"><b>restore data</b></a>
          mungkin dikarenakan data yang akan diimport terlalu banyak, jadi dibutuhkan untuk memecah data dari beberapa bagian untuk
          mempercepat proses restore data. Dan pastikan tabel/database sudah kosong untuk menghindari terjadinya data yang dobel.</p>
      </div>

      <div class="row">

        <!--
        <div class="col-md-4">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Member</h3>
            </div>
            <div class="box-body">
              <form class="" action="{{url('memberImportPart')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-primary">Import Excel File</button>
              </form>
            </div>
          </div>
        </div>
      -->

        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Jenis Kamar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('jenisKamarImportPart')}}" method="post" enctype="multipart/form-data">
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
              <form class="" action="{{url('kamarImportPart')}}" method="post" enctype="multipart/form-data">
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
              <form class="" action="{{url('pemesananImportPart')}}" method="post" enctype="multipart/form-data">
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

        <!--
        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Menu Resto</h3>
            </div>
            <div class="box-body">
              <form class="" action="{{url('restoImportPart')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="import_file" value="" required> <br>
                <button type="sumbit" name="save" class="btn btn-primary">Import Excel File</button>
              </form>
            </div>
          </div>
        </div>
      -->

        <div class="col-md-4">
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Restore Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('transaksiImportPart')}}" method="post" enctype="multipart/form-data">
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
            <div class="box-header with-border text-left">
              <h3 class="box-title">Restore Data Transaksi Resto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" action="{{url('transaksiRestoImportPart')}}" method="post" enctype="multipart/form-data">
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
