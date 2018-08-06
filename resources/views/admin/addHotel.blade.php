
@extends('layout.master')

@section('title', 'Purworejo - Hotel')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>purworejoberirama.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Form Hotel</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Hotel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'storeHotel'}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Hotel</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Hotel" name="nama_hotel" required value="{{old('nama_hotel')}}">
                     @if ($errors->has('nama_hotel'))
                        <p style="color : red;">{{ $errors->first('nama_hotel') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat" name="alamat" required value="{{old('alamat')}}">
                     @if ($errors->has('alamat'))
                        <p style="color : red;">{{ $errors->first('alamat') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Telepon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="telefon" required value="{{old('telefon')}}">
                     @if ($errors->has('telefon'))
                        <p style="color : red;">{{ $errors->first('telefon') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Terendah</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{old('harga')}}"
                     placeholder="Harga Terendah contoh (250.000)" name="harga" required>
                     @if ($errors->has('harga'))
                        <p style="color : red;">{{ $errors->first('harga') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fasilitas</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{old('fasilitas')}}"
                     placeholder="Fasilitas Hotel" name="fasilitas" required>
                     @if ($errors->has('fasilitas'))
                        <p style="color : red;">{{ $errors->first('fasilitas') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link Google Maps</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Link Google Maps" name="maps" required value="{{old('maps')}}">
                     @if ($errors->has('maps'))
                        <p style="color : red;">{{ $errors->first('maps') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto Hotel</label>

                  <div class="col-sm-9">
                    <input type="file" id="inputPassword3" placeholder="Password" name="foto_hotel" required>
                    @if ($errors->has('foto_hotel'))
                       <p style="color : red;">{{ $errors->first('foto_hotel') }}</p>  <!-- Error validasi -->
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
