
@extends('layout.master')

@section('title', 'Womanagement - SPK')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Form Input SPK</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input SPK</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'storeSpk'}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
            <div class="box-body col-md-6">
              <div class="form-group">
                <label label for="inputEmail3" class="col-sm-3 control-label">Pilih Partner</label>
                <div class="col-sm-9">
                  <select class="form-control" name="id_partner" required>
                    <option value="">Pilih Partner</option>
                    @foreach($partners as $data)
                      <option value="{{$data->id_partner}}">{{$data->nama_partner}}</option>
                    @endforeach
                  </select>
               </div>
              </div>

			          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Tgl SPK</label>

                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="tgl_spk"
                      name="tgl_spk" disabled value="{{$date_now}}">
                    </div>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nama Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" required
                     placeholder="Nama Merchant" name="nama_merchant" value="{{old('nama_merchant')}}">
                     @if ($errors->has('nama_merchant'))
                        <p style="color : red;">{{ $errors->first('nama_merchant') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

				        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Alamat Merchant</label>

                  <div class="col-sm-9">
                    <textarea name="alamat_merchant" rows="5" class="form-control" required></textarea>
                    @if ($errors->has('alamat_merchant'))
                       <p style="color : red;">{{ $errors->first('alamat_merchant') }}</p>  <!-- Error validasi -->
                    @endif
                  </div>
                </div>

				<div class="form-group">
					<label label for="inputEmail3" class="col-sm-3 control-label">Kota Merchant</label>
					<div class="col-sm-9">
					<input type="text" class="form-control" id="inputEmail3" required
					placeholder="Kota Merchant" name="kota_mso" value="{{old('kota_mso')}}">
          @if ($errors->has('kota_mso'))
             <p style="color : red;">{{ $errors->first('kota_mso') }}</p>  <!-- Error validasi -->
          @endif
					</div>
				</div>
      </div>
      <!-- box-body col-md-6 -->

      <div class="box-body col-md-6">
        <div class="form-group">
          <label label for="inputEmail3" class="col-sm-3 control-label">Jenis EDC</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" value="{{old('jenis_edc')}}"
             placeholder="Jenis EDC" name="jenis_edc" required>
             @if ($errors->has('jenis_edc'))
                <p style="color : red;">{{ $errors->first('jenis_edc') }}</p>  <!-- Error validasi -->
             @endif
          </div>
        </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">TID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{old('tid')}}"
                     placeholder="TID" name="tid" required>
                     @if ($errors->has('tid'))
                        <p style="color : red;">{{ $errors->first('tid') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">MID</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" value="{{old('mid')}}"
                     placeholder="MID" name="mid" required>
                     @if ($errors->has('mid'))
                        <p style="color : red;">{{ $errors->first('mid') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label ">PIC Merchant</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" required
                     placeholder="PIC" name="pic_merchant" value="{{old('pic_merchant')}}">
                     @if ($errors->has('pic_merchant'))
                        <p style="color : red;">{{ $errors->first('pic_merchant') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

				 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Kontak</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" required
                     placeholder="Kontak" name="kontak_merchant" value="{{old('kontak_merchant')}}">
                     @if ($errors->has('kontak_merchant'))
                        <p style="color : red;">{{ $errors->first('kontak_merchant') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Perintah SPK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" required
                     placeholder="Perintah Spk" name="perintah_spk" value="{{old('perintah_spk')}}">
                     @if ($errors->has('perintah_spk'))
                        <p style="color : red;">{{ $errors->first('perintah_spk') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>

				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">SN EDC</label>

                  <div class="col-sm-9">
                    <!--
                    <input type="text" class="form-control" id="inputEmail3" required
                     placeholder="SN EDC" name="sn_edc"  value="{{old('sn_edc')}}">
                   -->
                   <input type="text" class="form-control" name="sn_edc" value="{{old('sn_edc')}}"
                   data-inputmask='"mask": "999-999-999"' data-mask required>
                     @if ($errors->has('sn_edc'))
                        <p style="color : red;">{{ $errors->first('sn_edc') }}</p>  <!-- Error validasi -->
                     @endif
                  </div>
                </div>
              </div>
              <!-- box-body col-md-6 -->
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
