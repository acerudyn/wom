
@extends('layout.master')

@section('title', 'Womanagement - Data RO')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data RO</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data RO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama RO</th>
                  <th>Kota RO</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $data)

                <tr>
                  <td>{{$data->nama_ro}}</td>
                  <td>{{$data->kota_ro}}</td>
                  <td>
                    <a href="{{url('viewRo', $data->id_ro)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                    <a href="{{url('editRo', $data->id_ro)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{url('deleteRo', $data->id_ro)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

@endforeach

              </tbody>
                <tfoot>
                <tr>
                  <th>Nama RO</th>
                  <th>Kota RO</th>
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
