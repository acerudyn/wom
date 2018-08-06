<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Purworejo - Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/blue.css')}}">

  <link rel="shortcut icon" type="image/png" href="{{asset('admin/dist/img/icon_small.png')}}"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page" style="background-image: url('{{asset('admin/dist/img/photo1.png')}}');">
<div class="login-box">
  <div class="login-logo">
    <a href="#" style="color:#30b1e8;"><b>LOGIN</b>ADMIN</a>
  </div>
  <!-- /.login-logo -->



<div class="box box-info">
  <div class="box-header with-border text-center">
    <h3 class="box-title">Reset Password</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-sm-10 col-sm-offset-1">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
          value="{{ old('email') }}" name="email" required autofocus>
          @if ($errors->has('email'))
             <p style="color : red;">{{ $errors->first('email') }}</p>  <!-- Error validasi -->
          @endif
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1">
          <button type="submit" class="btn btn-info form-control">Send Password Reset Link</button>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10 col-sm-offset-1 text-center">
          <span>Try Login again ? <a href="{{url('login')}}">Click here</a></span>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->
  </form>
</div>
<!-- /.box -->



</div>

        <div class="col-md-6">

        </div

<!-- jQuery 2.2.3 -->
<script src="{{asset('admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
</body>
</html>
