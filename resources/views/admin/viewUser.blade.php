
@extends('layout.master')

@section('title', 'Womanagement - User')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View User</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">View Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto Profil</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampil->foto)}}" alt="{{$tampil->foto}}" width="200" height="200">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIK Karyawan</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" disabled
                     placeholder="Nama Hotel" name="wisata" required value="{{$tampil->nik_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Hotel" name="wisata" required value="{{$tampil->nama_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat" name="alamat" required value="{{$tampil->alamat_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="telepon" required value="{{$tampil->kontak_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama RO</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Harga Terendah" name="harga" required value="{{$tampil->nama_ro}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$tampil->jabatan}}"
                     placeholder="Fasilitas Hotel" name="fasilitas" required>
                  </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{url('showUser')}}"><div class="btn btn-info pull-left"><i class="fa fa-arrow-circle-o-left"></i> Back</div></a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
