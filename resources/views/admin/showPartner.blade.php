
@extends('layout.master')

@section('title', 'Womanagement - Data Partner')

@section('content')
  <section class="content-header">
    <h1>Admin Dashboard<small>Womanagement.com</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Partner</li>
    </ol>
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Partner</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>PIC</th>
                  <th>Telefon</th>
                  <th>Kota</th>
                  <th>NPWP</th>
                  <th>No. Rekening</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

@foreach($datas as $data)

                <tr>
                  <td>{{$data->nama_partner}}</td>
                  <td>{{str_limit($data->alamat_partner, 23)}}</td>
                  <td>{{$data->pic_partner}}</td>
                  <td>{{$data->tlp_partner}}</td>
                  <td>{{$data->kota_partner}}</td>
                  <td>{{$data->npwp_partner}}</td>
                  <td>{{$data->no_rekening}}</td>
                  <td>
                    <a href="{{url('viewPartner', $data->id_partner)}}" title="view"><button type="button" class="btn btn-default btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                    <a href="{{url('editPartner', $data->id_partner)}}" title="edit"><button type="button" class="btn btn-default btn-warning btn-xs"><i class="fa fa-pencil"></i></button></a>
                    <a href="{{url('deletePartner', $data->id_partner)}}" title="delete"><button type="button" class="btn btn-default btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>

@endforeach

              </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>PIC</th>
                  <th>Telefon</th>
                  <th>Kota</th>
                  <th>NPWP</th>
                  <th>No. Rekening</th>
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
