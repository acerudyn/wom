
@extends('layout.master')

@section('title', 'Purworejo - Users')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>purworejoberirama.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Form Users</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Users</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/storeUser') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama" name="nama_karyawan" required value="{{old('nama_karyawan')}}">
                     @if ($errors->has('nama_karyawan'))
                        <p style="color : red;">{{ $errors->first('nama_karyawan') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <textarea class="form-control" rows="5" name="alamat_karyawan" required></textarea>

                     @if ($errors->has('alamat_karyawan'))
                        <p style="color : red;">{{ $errors->first('alamat_karyawan') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Kontak" name="kontak_karyawan" required value="{{old('kontak_karyawan')}}">
                     @if ($errors->has('kontak_karyawan'))
                        <p style="color : red;">{{ $errors->first('kontak_karyawan') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                <label label for="inputEmail3" class="col-sm-2 control-label">Pilih RO</label>
                <div class="col-sm-9">
                  <select class="form-control" name="nama_ro" required>
                    <option value="">Pilih RO</option>
                    @foreach($datas_ro as $data)
                      <option value="{{$data->kota_ro}}">{{$data->kota_ro}}</option>
                    @endforeach
                  </select>
               </div>
              </div>
              <div class="form-group">
              <label label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-9">
                <select class="form-control" name="jabatan" required>
                  <option value="">Pilih Jabatan</option>
                  <option value="Admin HO">Admin HO</option>
                  <option value="Admin RO">Admin RO</option>
                  <option value="Admin MSO">Admin MSO</option>
                  <option value="Admin Partner">Admin Partner</option>
                  <option value="Admin Finance">Admin Finance</option>
                </select>
             </div>
            </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputEmail3"
                     placeholder="Password" name="password" required>
                     @if ($errors->has('password'))
                        <p style="color : red;">{{ $errors->first('password') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Konfirmasi</label>

                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputEmail3"
                     placeholder="Konfirmasi Password" name="password_confirmation" required>
                     @if ($errors->has('password_confirmation'))
                        <p style="color : red;">{{ $errors->first('password_confirmation') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>

                  <div class="col-sm-9">
                    <input type="file" id="inputPassword3" placeholder="Password" name="foto" required value="{{old('foto')}}">
                    @if ($errors->has('foto'))
                       <p style="color : red;">{{ $errors->first('foto') }}</p>  <!-- Error validasi -->
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
