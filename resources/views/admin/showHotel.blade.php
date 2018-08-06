
@extends('layout.master')

@section('title', 'Purworejo - Data Hotel')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>purworejoberirama.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Hotel</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Hotel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Hotel</th>
                  <th>Alamat</th>
                  <th>No. Telepon</th>
                  <th>Fasilitas</th>
                  <th>Harga</th>
                  <th>Foto Hotel</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $data)

                <tr>
                  <td>{{$data->nama_hotel}}</td>
                  <td>{{str_limit($data->alamat, 13)}}</td>
                  <td>{{$data->telefon}}</td>
                  <td>{{str_limit($data->fasilitas, 23)}}</td>
                  <td>{{$data->harga}}</td>
                  <td>
                    <img src="{{asset('image/'.$data->foto_hotel)}}" alt="{{$data->foto_hotel}}" width="150" height="100">
                  </td>
                  <td>
                    <a href="{{url('viewHotel', $data->id)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                    <a href="{{url('editHotel', $data->id)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{url('deleteHotel', $data->id)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

@endforeach

              </tbody>
                <tfoot>
                <tr>
                  <th>Nama Hotel</th>
                  <th>Alamat</th>
                  <th>No. Telepon</th>
                  <th>Fasilitas</th>
                  <th>Harga</th>
                  <th>Link Maps</th>
                  <th>Foto Hotel</th>
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
