
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
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data SPK</h3>
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
                  <td>{{$data->status_pengerjaan}}</td>
                  <td>
                    @if ($data->status_spk == 'Selesai')
                      <a href="{{url('viewSpk', $data->id_spk)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                      <a href="{{url('streamSpkPdf', $data->id_spk)}}" title="view pdf" target="_blank"><button type="button" class="btn btn-default btn-success btn-xs"><i class="fa fa-file-pdf-o"></i></button></a>
                      <a href="{{url('downloadSpkPdf', $data->id_spk)}}" title="download pdf"><button type="button" class="btn btn-default btn-primary btn-xs"><i class="fa fa-download"></i></button></a>
                    @else
                      <a href="{{url('viewSpk', $data->id_spk)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                      <a href="{{url('editSpkByMso', $data->id_spk)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
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
