
@extends('layout.master')

@section('title', 'Womanagement - MSO')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit MSO</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit MSO</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('updateMso', $tampiledit->id_mso)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                <label label for="inputEmail3" class="col-sm-2 control-label">Pilih RO</label>
                <div class="col-sm-9">
                  <select class="form-control" name="nama_ro" required>
                    <option value="{{$tampiledit->nama_ro}}">{{$tampiledit->nama_ro}}</option>
                    @foreach($datas_ro as $data)
                      <option value="{{$data->kota_ro}}">{{$data->kota_ro}}</option>
                    @endforeach
                  </select>
               </div>
              </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kota Mso</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3"
                     placeholder="Kota Mso" name="kota_mso" required value="{{$tampiledit->kota_mso}}">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{'/showRo'}}"><div class="btn btn-warning pull-left">Cancel</div></a>
                <button type="submit" class="btn btn-info pull-right">Update</button>
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
