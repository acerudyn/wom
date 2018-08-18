
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
            <form class="form-horizontal" action="{{url('updateSpk', $tampiledit->id_spk)}}"
              method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Partner</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Link Google Maps" name="maps" disabled value="{{$partner->nama_partner}}"> <br>
                     <img src="{{asset('image/'.$partner->foto_partner)}}" alt="{{$partner->foto_partner}}" width="200" height="100">
                     <input type="hidden" name="id_partner" value="{{$tampiledit->id_partner}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label ">No.Spk</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="No.Spk" name="no_spk" required value="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Tgl SPK</label>

                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_spk"
                      name="tgl_spk" disabled value="{{date('d-m-Y', strtotime($tampiledit->tgl_spk))}}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Pengerjaan</label>

                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                      data-mask="" type="text" id="tgl_pengerjaan" name="tgl_pengerjaan" disabled>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl Duedate</label>

                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>

                    <!--
                      <input class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'"
                      data-mask="" type="text" id="tgl_duedate_spk" name="tgl_duedate_spk">
                    -->
                      <input type="text" class="form-control pull-right" id="tgl_duedate_spk"
                      name="tgl_duedate_spk" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">TID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{$tampiledit->tid}}"
                     placeholder="TID" name="tid" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">MID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="MID" name="mid" disabled value="{{$tampiledit->mid}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nama Merchant" name="nama_merchant" disabled value="{{$tampiledit->nama_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat Merchant</label>

                  <div class="col-sm-9">
                    <textarea name="alamat_merchant" rows="5" disabled class="form-control">{{$tampiledit->alamat_merchant}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label ">PIC Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="PIC" name="pic_merchant" disabled value="{{$tampiledit->pic_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Kontak" name="kontak_merchant" disabled value="{{$tampiledit->kontak_merchant}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis SPK</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="jenis_spk" required>
                      <option value="">-Jenis SPK-</option>
                        <option value="Pasang">Pasang</option>
                        <option value="Tarik">Tarik</option>
                        <option value="PM">Preventive Maintenance</option>
                        <option value="CM">Corrective Maintenance</option>
                    </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Perintah SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Perintah Spk" name="perintah_spk" required
                     value="{{$tampiledit->perintah_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Foto 1</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampiledit->foto_1)}}" alt="{{$tampiledit->foto_1}}" width="200" height="200">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Foto 2</label>

                  <div class="col-sm-9">
                    <img src="{{asset('image/'.$tampiledit->foto_2)}}" alt="{{$tampiledit->foto_2}}" width="200" height="200">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->


              <div class="box-body col-md-6">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status SPK</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="status_spk" required>
                      <option value="{{$tampiledit->status_spk}}">{{$tampiledit->status_spk}}</option>
                        <option value="On Progress">On Progress</option>
                        <option value="Retur by HO">Retur</option>
                        <option value="Tunggu Validasi">Tunggu Validasi</option>
                        <option value="Cancel">Cancel</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status Pengerjaan</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="status_spk" disabled>
                      <option value="{{$tampiledit->status_pengerjaan}}">{{$tampiledit->status_pengerjaan}}</option>
                        <option value="Visit">Visit</option>
                        <option value="Unvisit">Unvisit</option>
                    </select>
                 </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Jenis EDC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Jenis EDC" name="jenis_edc" disabled value="{{$tampiledit->jenis_edc}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">SN EDC</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="SN Edc" name="sn_edc" disabled value="{{$tampiledit->sn_edc}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tipe Komunikasi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Tipe Komunikasi" name="tipe_komunikasi" disabled
                     value="{{$tampiledit->tipe_komunikasi}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Provider</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Provider" name="provider" disabled
                     value="{{$tampiledit->provider}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nomor Simcard</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Nomor Simcard" name="nmr_simcard" disabled
                     value="{{$tampiledit->nmr_simcard}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">SN Simcard</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="SN Simcard" name="sn_simcard" disabled
                     value="{{$tampiledit->sn_simcard}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Adaptor</label>

                  <div class="col-sm-9">
                    <input type="radio" name="adaptor" value="BAIK" disabled> Baik &emsp;
                    <input type="radio" name="adaptor" value="RUSAK" disabled> Rusak
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">EDC</label>

                  <div class="col-sm-9">
                    <input type="radio" name="edc" value="BAIK" disabled> Baik &emsp;
                    <input type="radio" name="edc" value="RUSAK" disabled> Rusak
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Stiker</label>

                  <div class="col-sm-9">
                    <input type="radio" name="stiker" value="BAIK" disabled> Baik &emsp;
                    <input type="radio" name="stiker" value="RUSAK" disabled> Rusak
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Sesuai Lokasi</label>

                  <div class="col-sm-9">
                    <input type="radio" name="nama_sesuai_lokasi" value="YA" disabled> Ya &emsp;
                    <input type="radio" name="nama_sesuai_lokasi" value="TIDAK" disabled> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat Sesuai Lokasi</label>

                  <div class="col-sm-9">
                    <input type="radio" name="alamat_sesuai_lokasi" value="YA" disabled> Ya &emsp;
                    <input type="radio" name="alamat_sesuai_lokasi" value="TIDAK" disabled> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">TID & MID Sesuai</label>

                  <div class="col-sm-9">
                    <input type="radio" name="tid_mid_sesuai" value="YA" disabled> Ya &emsp;
                    <input type="radio" name="tid_mid_sesuai" value="TIDAK" disabled> Tidak
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Test Debit</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Debit" name="test_debit" disabled
                     value="{{$tampiledit->test_debit}}">
                  </div>

                  <label class="col-sm-3 control-label">Test Kredit</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Kredit" name="test_kredit" disabled
                     value="{{$tampiledit->test_kredit}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Test Prepaid</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Test Prepaid" name="test_prepaid" disabled
                     value="{{$tampiledit->test_prepaid}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Thermal Awal</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Awal" name="thermal_awal" disabled
                     value="{{$tampiledit->thermal_akhir}}">
                  </div>

                  <label class="col-sm-3 control-label">Thermal Drop</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Drop" name="thermal_drop" disabled
                     value="{{$tampiledit->thermal_drop}}">
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Keterangan SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Keternagan Spk" name="keterangan_spk" disabled
                     value="{{$tampiledit->keterangan_spk}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">NIK Karyawan</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="NIK Karyawan" name="nik_karyawan" disabled value="{{$tampiledit->nik_karyawan}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama RO</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="id_ro" required>
                      <option value="">- Pilih RO -</option>

                      @foreach($data_ro as $data)
                        <option value="{{$data->id_ro}}">{{$data->kota_ro}}</option>
                      @endforeach
                    </select>
                 </div>
                </div>
              <div class="form-group">
              <label label for="inputEmail3" class="col-sm-3 control-label">Kota RO</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3" required
                 placeholder="Kota RO" name="kota_mso" value="{{$data_mso->kota_mso}}">
              </div>
            </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama MSO</label>

                  <div class="col-sm-9">
                    <select class="form-control" name="nik_karyawan" disabled>
                      <option value="">- Pilih MSO -</option>

                      @foreach($karyawan as $data)
                        <option value="{{$data->nik_karyawan}}">{{$data->nama_karyawan}}</option>
                      @endforeach
                    </select>
                 </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Status Invoicing</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Status Invoicing" name="status_invoicing" disabled
                     value="{{$tampiledit->status_invoicing}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">ID Invoice</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="ID Invoice" name="id_invoice" disabled value="{{$tampiledit->id_invoice}}">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!--/ col md-12 -->
      </div>
      <!-- /.row -->

      <div class="box-footer">
        <a href="{{'/showSpk'}}"><div class="btn btn-warning pull-left">CANCEL</div></a>
        <button type="submit" class="btn btn-info pull-right">UPDATE</button>
        </form>
      </div>

    </section>
    <!-- /.content -->
@endsection
