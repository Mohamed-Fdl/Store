<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">
@if (session('error'))
<div class="alert alert-danger" role="alert">
 {{session('error')}}
</div>
@endif
  <div class="container">
      <h2>Connect yourself</h2>
      <p>Identifiants: Username: fadel Password: fadel</p>

    <form  action="{{route('login_admin')}}" method="post">
        @csrf
      <div class="login-wrap">
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name='username' class="form-control" placeholder="Username" autofocus required>
        </div><br>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name='password' class="form-control" placeholder="Password" required>
        </div><br>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits" style="color: white;">
        </div>
    </div>
  </div>


</body>

</html>
