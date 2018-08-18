
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

	    <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input SPK by Excel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'uploadSpk'}}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                <label label for="inputEmail3" class="col-sm-2 control-label">Pilih Partner</label>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Pilih File</label>

                  <div class="col-sm-9">
                    <input type="file" id="inputPassword3" placeholder="File Excel" name="import_file_spk" required>
                    @if ($errors->has('import_file_spk'))
                       <p style="color : red;">{{ $errors->first('import_file_spk') }}</p>  <!-- Error validasi -->
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
