
@extends('layout.master')

@section('title', 'Purworejo - Hotel')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Form Add Partner</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Partner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'storePartner'}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama" name="nama_partner" required value="{{old('nama_partner')}}">
                     @if ($errors->has('nama_partner'))
                        <p style="color : red;">{{ $errors->first('nama_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat" name="alamat_partner" required value="{{old('alamat_partner')}}">
                     @if ($errors->has('alamat_partner'))
                        <p style="color : red;">{{ $errors->first('alamat_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PIC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="PIC" name="pic_partner" required value="{{old('pic_partner')}}">
                     @if ($errors->has('pic_partner'))
                        <p style="color : red;">{{ $errors->first('pic_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Telepon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="tlp_partner" required value="{{old('tlp_partner')}}">
                     @if ($errors->has('tlp_partner'))
                        <p style="color : red;">{{ $errors->first('tlp_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{old('kota_partner')}}"
                     placeholder="Kota" name="kota_partner" required>
                     @if ($errors->has('kota_partner'))
                        <p style="color : red;">{{ $errors->first('kota_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NPWP</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="NPWP" name="npwp_partner" required value="{{old('npwp_partner')}}">
                     @if ($errors->has('npwp_partner'))
                        <p style="color : red;">{{ $errors->first('npwp_partner') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Rekening</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="No. Rekening" name="no_rekening" required value="{{old('no_rekening')}}">
                     @if ($errors->has('no_rekening'))
                        <p style="color : red;">{{ $errors->first('no_rekening') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Logo Partner</label>

                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="inputEmail3"
                     placeholder="Logo Partner" name="foto_partner" required value="{{old('foto_partner')}}">
                     @if ($errors->has('foto_partner'))
                        <p style="color : red;">{{ $errors->first('foto_partner') }}</p>  <!-- Error validasi -->
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
