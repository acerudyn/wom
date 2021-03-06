
@extends('layout.master')

@section('title', 'Womanagement - Export SPK')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Export SPK</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Filter Export</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'storeExport'}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                <label label for="inputEmail3" class="col-sm-2 control-label">Pilih Partner</label>
                <div class="col-sm-9">
                  <select class="form-control" name="id_partner" required>
                    <option value="all">Semua Partner</option>
                    @foreach($partners as $data)
                      <option value="{{$data->id_partner}}">{{$data->nama_partner}}</option>
                    @endforeach
                  </select>
               </div>
              </div>
              <div class="form-group">
              <label label for="inputEmail3" class="col-sm-2 control-label">Jenis SPK</label>
              <div class="col-sm-9">
                <select class="form-control" name="jenis_spk" required>
                  <option value="all">Semua Jenis</option>
                  <option value="Pasang">Pasang</option>
                  <option value="Tarik">Tarik</option>
                  <option value="PM">Preventive Maintenance</option>
                  <option value="CM">Corrective Maintenance</option>
                </select>
             </div>
            </div>
            <div class="form-group">
            <label label for="inputEmail3" class="col-sm-2 control-label">Status SPK</label>
            <div class="col-sm-9">
              <select class="form-control" name="status_spk" required>
                <option value="all">Semua Status</option>
                <option value="On Progress">On Progress</option>
                <option value="Retur">Retur</option>
                <option value="Tunggu Validasi">Tunggu Validasi</option>
                <option value="Cancel">Cancel</option>
                <option value="Selesai">Selesai</option>
              </select>
           </div>
          </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Upload</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <!--
                    <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                    data-mask="" type="text" id="awal_periode" name="awal_periode" required>
                  -->
                    <input type="text" class="form-control pull-right" id="awal_periode"
                    name="awal_periode" required>
                 </div>
                </div>

                <label for="inputEmail3" class="col-sm-1 control-label">Sampai</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <!--
                    <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                    data-mask="" type="text" id="akhir_periode" name="akhir_periode" required>
                  -->
                    <input type="text" class="form-control pull-right" id="akhir_periode"
                    name="akhir_periode" required>
                 </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Validasi</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <!--
                    <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                    data-mask="" type="text" id="awal_periode" name="awal_periode" required>
                  -->
                    <input type="text" class="form-control pull-right" id="awal_validasi"
                    name="awal_validasi" required>
                 </div>
                </div>

                <label for="inputEmail3" class="col-sm-1 control-label">Sampai</label>
                <div class="col-sm-4">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <!--
                    <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                    data-mask="" type="text" id="akhir_periode" name="akhir_periode" required>
                  -->
                    <input type="text" class="form-control pull-right" id="akhir_validasi"
                    name="akhir_validasi" required>
                 </div>
                </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Export</button>
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
