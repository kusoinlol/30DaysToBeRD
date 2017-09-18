
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>30 Days to be RD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GuestBook</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>30</b>Days</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a href="#">留言板</a></li>
          <li><a href="#">會員列表</a></li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
   <div class="box box-success">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>

        <h3 class="box-title">GuestBook</h3>

        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
          <div class="btn-group" data-toggle="btn-toggle">
            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"> 新增留言</i>
            </button>
          </div>
        </div>
      </div>
      <div class="box-body chat" id="chat-box">
        <!-- chat item -->
        <div class="item">
          <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

          <p class="message">
            <a href="#" class="name">
              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
              Mike Doe
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
          </p>
          <div class="attachment">
            <h4>Attachments:</h4>

            <p class="filename">
              Theme-thumbnail-image.jpg
            </p>

            <div class="pull-right">
              <button type="button" class="btn btn-primary btn-sm btn-flat">刪除</button>
            </div>
          </div>
          <div class="attachment">
            <h4>Attachments:</h4>

            <p class="filename">
              Theme-thumbnail-image.jpg
            </p>

            <div class="pull-right">
              <button type="button" class="btn btn-primary btn-sm btn-flat">刪除</button>
            </div>
          </div>
          <!-- /.attachment -->
        </div>
        <!-- /.item -->
        <!-- chat item -->
        <div class="item">
          <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

          <p class="message">
            <a href="#" class="name">
              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
              Alexander Pierce
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
          </p>
        </div>
        <!-- /.item -->
        <!-- chat item -->
        <div class="item">
          <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

          <p class="message">
            <a href="#" class="name">
              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
              Susan Doe
            </a>
            I would like to meet you to discuss the latest news about
            the arrival of the new theme. They say it is going to be one the
            best themes on the market
          </p>
        </div>
        <!-- /.item -->
      </div>
      <!-- /.chat -->
    </div>
</div>
<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
