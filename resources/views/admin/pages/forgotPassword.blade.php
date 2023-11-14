<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PropDukan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      {{-- <a href="{{ url('/') }}/admin/index2.html" class="h1"><b>Admin</b>LTE2</a> --}}
      <img src="{{ url('/') }}/admin/images/logo.png" alt="Logo" height="100" >
    </div>
    <div class="card-body">
      <p class="login-box-msg">Forgot Your Password</p>
        {{-- Error Display --}}
        <div class="success" id="welcome">
            @if ($message = Session::get('success-message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
                @elseif ($message = Session::get('error-message'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
            @endif       
        </div>
        {{-- End Error Display --}}
      <form action="{{ route('forgot-password') }}" method="post">
		@csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Enter Your Email..">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		<div class="social-auth-links text-center mt-2 mb-3">
			<button type="submit" class="btn btn-block btn-primary">
			  <i class="fa fa-check mr-2"></i> Submit
			</button>
		  </div>
        
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
