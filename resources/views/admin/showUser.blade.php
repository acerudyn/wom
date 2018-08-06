
@extends('layout.master')

@section('title', 'Purworejo - Data User')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data User</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Nama RO</th>
                  <th>Jabatan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $data)

                <tr>
                  <td>{{$data->nik_karyawan}}</td>
                  <td>{{$data->nama_karyawan}}</td>
                  <td>{{$data->nama_ro}}</td>
                  <td>{{$data->jabatan}}</td>
                  <td>
                    @if ($id_user == $data->id)
                      <a href="{{url('viewUser', $data->id)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                      <a href="{{url('editUserByAdmin', $data->id)}}" title="edit"> <button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    @else
                      <a href="{{url('viewUser', $data->id)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                      <a href="{{url('editUserByAdmin', $data->id)}}" title="edit"> <button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                      <a href="{{url('deleteUser', $data->id)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                    @endif
                  </td>
                </tr>

@endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>NIK Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Nama RO</th>
                  <th>Jabatan</th>
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
