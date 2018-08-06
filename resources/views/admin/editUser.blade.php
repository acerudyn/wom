
@extends('layout.master')

@section('title', 'Womanagement - User')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit User</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('updateUserByAdmin', $tampiledit->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto Profil</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampiledit->foto)}}" alt="{{$tampiledit->foto}}" width="200" height="200">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Edit Foto Profil</label>

                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="inputEmail3"
                     placeholder="Foto Profil" name="foto" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama" name="nama_karyawan" required value="{{$tampiledit->nama_karyawan}}">
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="kontak_karyawan" required value="{{$tampiledit->kontak_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama RO</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="nama_ro" required>
                      <option value="{{$nama_ro->kota_ro}}">{{$nama_ro->kota_ro}}</option>
                      @foreach($datas_ro as $data)
                        <option value="{{$data->kota_ro}}">{{$data->kota_ro}}</option>
                      @endforeach
                    </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="jabatan" required>
                      <option value="{{$tampiledit->jabatan}}">{{$tampiledit->jabatan}}</option>
                      <option value="Admin HO">Admin HO</option>
                      <option value="Admin RO">Admin RO</option>
                      <option value="Admin MSO">Admin MSO</option>
                      <option value="Admin Partner">Admin Partner</option>
                      <option value="Admin Finance">Admin Finance</option>
                    </select>
                 </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{'/showPartner'}}"><div class="btn btn-warning pull-left">Cancel</div></a>
                <button type="submit" class="btn btn-info pull-right">Update</button>
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
