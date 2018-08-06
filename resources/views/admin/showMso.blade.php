
@extends('layout.master')

@section('title', 'Womanagement - Data MSO')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data MSO</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data MSO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama RO</th>
                  <th>Kota MSO</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $data)

                <tr>
                  <td>{{$data->nama_ro}}</td>
                  <td>{{$data->kota_mso}}</td>
                  <td>
                    <a href="{{url('viewMso', $data->id_mso)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                    <a href="{{url('editMso', $data->id_mso)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{url('deleteMso', $data->id_mso)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

@endforeach

              </tbody>
                <tfoot>
                <tr>
                  <th>Nama RO</th>
                  <th>Kota MSO</th>
                  <th>Action</th>
                </tr>
                </tfoot>
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
