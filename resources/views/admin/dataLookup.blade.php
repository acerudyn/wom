
@extends('layout.master')

@section('title', 'Womanagement - Data SPK')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data SPK</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Filter Lookup</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{'storeLookup'}}" enctype="multipart/form-data" method="post">
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
              <label label for="inputEmail3" class="col-sm-2 control-label">Data Lookup</label>
              <div class="col-sm-9">
                <select class="form-control" name="parameter" required>
                  <option value="">Pilih Data Lookup</option>
                  <option value="tid">TID</option>
                  <option value="mid">MID</option>
                  <option value="sn_edc">Serial Number</option>
                  <option value="no_spk">Nomor SPK</option>
                </select>
             </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Value Lookup</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="inputEmail3"
                 placeholder="Fill Value" name="value_param" required >
              </div>
            </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Search</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->


      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Result Data Lookup</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Job Order</th>
                  <th>TID</th>
                  <th>MID</th>
                  <th>Nama Merchent</th>
                  <th>Terminal</th>
                  <th>Nama RO</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $index => $data)

                <tr>
                  <td>{{$index + 1}}</td>
                  <td>
                    <b>{{$data->jenis_spk}}</b> <br>
                    {{str_limit($data->tgl_spk, 10, '')}}
                  </td>
                  <td>{{$data->tid}}</td>
                  <td>{{$data->mid}}</td>
                  <td>
                    <b>{{$data->nama_merchant}}</b> <br>
                    {{$data->alamat_merchant}}
                  </td>
                  <td>
                    {{$data->jenis_edc}} <br>
                    {{$data->sn_edc}}
                  </td>
                  <td>
                    RO - {{$data->nama_ro}} <br>
                    {{$data->kota_mso}} <br>
                    {{$data->nama_mso}}
                  </td>
                  <td>
                    @if ($data->tgl_duedate_spk != null)
                      <span>Distributed</span> <br>
                    @endif
                    {{$data->status_pengerjaan}}
                  </td>
                  <td>
                    <a href="{{url('viewSpk', $data->id_spk)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                    <a href="{{url('editSpk', $data->id_spk)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{url('deleteSpk', $data->id_spk)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                    @if ($data->status_spk == 'selesai')
                      <a href="{{url('streamSpkPdf', $data->id_spk)}}" title="view pdf" target="_blank"><button type="button" class="btn btn-default btn-success btn-xs"><i class="fa fa-file-pdf-o"></i></button></a>
                      <a href="{{url('downloadSpkPdf', $data->id_spk)}}" title="download pdf"><button type="button" class="btn btn-default btn-primary btn-xs"><i class="fa fa-download"></i></button></a>
                    @endif
                  </td>
                </tr>

@endforeach

              </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @endsection
