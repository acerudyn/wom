
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
              <h3 class="box-title">Form Data Hotel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Hotel</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Hotel" name="wisata" required value="{{$tampil->nama_hotel}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat" name="alamat" required value="{{$tampil->alamat}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Telepon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="telepon" required value="{{$tampil->telefon}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga Terendah</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Harga Terendah" name="harga" required value="{{$tampil->harga}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Fasilitas</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$tampil->fasilitas}}"
                     placeholder="Fasilitas Hotel" name="fasilitas" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Link Google Maps</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Link Google Maps" name="maps" required value="{{$tampil->maps}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Foto Hotel</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampil->foto_hotel)}}" alt="{{$tampil->foto_hotel}}" width="300" height="200">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{'/showHotel'}}"><div class="btn btn-info pull-left"><i class="fa fa-arrow-circle-o-left"></i> Back</div></a>
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
