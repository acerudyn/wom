
@extends('layout.master')

@section('title', 'Womanagement - SPK')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View SPK</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">View Data SPK</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Partner</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Partner" name="maps" required value="{{$partner->nama_partner}}"> <br>
                     <img src="{{asset('image/'.$partner->foto_partner)}}" alt="{{$partner->foto_partner}}" width="200" height="100">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label ">No.Spk</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="No.Spk" name="wisata" required value="{{$tampil->no_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Spk</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Tgl Spk" name="alamat" required value="{{date('d-m-Y', strtotime($tampil->tgl_spk))}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Pengerjaan</label>

                  <div class="col-sm-9">
                    @if (empty($tampil->tgl_pengerjaan))
                      <input type="text" class="form-control" id="inputEmail3"
                       placeholder="Tanggal Pengerjaan" name="harga" required value="">
                    @else
                      <input type="text" class="form-control" id="inputEmail3"
                       placeholder="tgl Due date" name="harga" required value="{{date('d-m-Y', strtotime($tampil->tgl_pengerjaan))}}">
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Duedate</label>

                  <div class="col-sm-9">
                    @if (empty($tampil->tgl_duedate_spk))
                      <input type="text" class="form-control" id="inputEmail3"
                       placeholder="Tanggal Due date" name="harga" required value="">
                    @else
                      <input type="text" class="form-control" id="inputEmail3"
                       placeholder="tgl Due date" name="harga" required value="{{date('d-m-Y', strtotime($tampil->tgl_duedate_spk))}}">
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">TID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$tampil->tid}}"
                     placeholder="TID" name="fasilitas" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">MID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="MID" name="maps" required value="{{$tampil->mid}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Merchant" name="maps" required value="{{$tampil->nama_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat Merchant</label>

                  <div class="col-sm-9">
                    <textarea name="name" rows="5" class="form-control">{{$tampil->alamat_merchant}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label ">PIC Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="No.Spk" name="wisata" required value="{{$tampil->pic_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Tgl Spk" name="alamat" required value="{{$tampil->kontak_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Tgl Pengerjaan" name="telepon" required value="{{$tampil->jenis_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Perintah SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="tgl Due date" name="harga" required value="{{$tampil->perintah_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama RO</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama RO" name="maps" required value="RO - {{$data_mso->nama_ro}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Kota RO</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Kota RO" name="maps" required value="{{$data_mso->kota_mso}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Foto 1</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampil->foto_1)}}" alt="{{$tampil->foto_1}}" width="200" height="200">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Foto 2</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampil->foto_2)}}" alt="{{$tampil->foto_2}}" width="200" height="200">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->


              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Status SPK" name="maps" required value="{{$tampil->status_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status Pengerjaan</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Status Pengerjaan" name="maps" required value="{{$tampil->status_pengerjaan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis EDC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Jenis EDC" name="maps" required value="{{$tampil->jenis_edc}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">SN EDC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="SN EDC" name="maps" required value="{{$tampil->sn_edc}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tipe Komunikasi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Tipe Komunikasi" name="maps" required value="{{$tampil->tipe_komunikasi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Provider</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Provider" name="maps" required value="{{$tampil->provider}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">SN Simcard</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="SN Simcard" name="maps" required value="{{$tampil->sn_simcard}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Adaptor</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Adaptor" name="maps" required value="{{$tampil->adaptor}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">EDC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="EDC" name="maps" required value="{{$tampil->edc}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Stiker</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Stiker" name="maps" required value="{{$tampil->stiker}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Sesuai Lokasi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Sesuai Lokasi" name="maps" required value="{{$tampil->nama_sesuai_lokasi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat Sesuai Lokasi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Alamat Sesuai Lokasi" name="maps" required value="{{$tampil->alamat_sesuai_lokasi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">TID & MID Sesuai</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="TID & MID Sesuai" name="maps" required value="{{$tampil->tid_mid_sesuai}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Test Debit</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Debit" name="maps" required value="{{$tampil->test_debit}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Test Kredit</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Kredit" name="maps" required value="{{$tampil->test_kredit}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Test Prepaid</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Prepaid" name="maps" required value="{{$tampil->test_prepaid}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Thermal Awal</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Thermal Awal" name="maps" required value="{{$tampil->thermal_awal}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Thermal Drop</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Thermal Drop" name="maps" required value="{{$tampil->thermal_drop}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Thermal Akhir</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Thermal Akhir" name="maps" required value="{{$tampil->thermal_akhir}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Keterangan SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Keterangan SPK" name="maps" required value="{{$tampil->keterangan_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">NIK Karyawan</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="NIK Karyawan" name="maps" required value="{{$tampil->nik_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama MSO</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="nama Mso" name="maps" required value="{{$tampil->nama_mso}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status Invoicing</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Status Invoicing" name="maps" required value="{{$tampil->status_invoicing}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">ID Invoice</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="ID invoice" name="maps" required value="{{$tampil->id_invoice}}">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">

              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/ col md-12 -->
      </div>
      <!-- /.row -->
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
    </section>
    <!-- /.content -->
@endsection
