<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Administration </title>

  <!-- Bootstrap CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Ad<span class="lite">min</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <!--  search form end -->
      </div>


    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">

          <li class="">
            <a class="" href="{{route('admin_addproduct')}}">
            <i class="icon_document_alt"></i>
                          <span>Add product</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="{{route('admin_addcategory')}}">
            <i class="icon_document_alt"></i>
                          <span>Add category</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="{{route('admin_addcoupon')}}">
            <i class="icon_document_alt"></i>
                          <span>Add coupons</span>
                      </a>
          </li>



        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> @yield('title')</h3>
          </div>
        </div>
        <!-- page start-->
        @yield('content')
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="/js/jquery.scrollTo.min.js"></script>
  <script src="/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="/js/scripts.js"></script>


</body>

</html>
