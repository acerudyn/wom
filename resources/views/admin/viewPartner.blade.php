
@extends('layout.master')

@section('title', 'Womanagement - Partner')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Partner</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">View Data Partner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Hotel" name="wisata" required value="{{$tampil->nama_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat" name="alamat" required value="{{$tampil->alamat_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">PIC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Telepon" name="telepon" required value="{{$tampil->pic_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Harga Terendah" name="harga" required value="{{$tampil->tlp_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$tampil->kota_partner}}"
                     placeholder="Fasilitas Hotel" name="fasilitas" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NPWP</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Link Google Maps" name="maps" required value="{{$tampil->npwp_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">No. Rekening</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Link Google Maps" name="maps" required value="{{$tampil->no_rekening}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Logo Partner</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampil->foto_partner)}}" alt="{{$tampil->foto_partner}}" width="250" height="90">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  @php
                    if (Auth::user()->jabatan == 'Admin RO') {
                      $link = "showSpkByRo";
                    } elseif (Auth::user()->jabatan == 'Admin MSO') {
                      $link = "showSpkByMso";
                    } else {
                      $link = "showSpk";
                    }
                  @endphp
                <a href="{{url('/', $link)}}"><div class="btn btn-info pull-left"><i class="fa fa-arrow-circle-o-left"></i> Back</div></a>
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
