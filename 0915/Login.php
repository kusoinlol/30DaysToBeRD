

<?
$hostname = 'kusoinlol.synology.me';
$username = 'rita_liu';
$password = 'rita_liu';
$db_name  = "rita_liu";

// try{
    $db=new PDO("mysql:host=".$hostname.";port=3307
                dbname=".$db_name, $username, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    $db->exec('USE '.$db_name);
    //echo '連線成功';
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒

    if ($_GET[account]!="" && $_GET[psw]!="")
    {
      // $sql="Select * from 0915member where account='$_GET[account]' and pwd='$_GET[psw]' ";
      // $result=$db->query($sql);
      // while($row=$result->fetch(PDO::FETCH_OBJ)){
      //  session_start();
      //   $_SESSION["account"]=$_GET[account];
      //   header("Location:MemberList.php");
      
      // }
      // $error="帳號密碼輸入錯誤";
        

      //$sql = $db->prepare("Select * from 0915member where account='$_GET[account]' and pwd='$_GET[psw]' ");
      
      $sql = $db -> prepare("Select * from 0915member where account=:account and pwd=:pwd ");
      $sql -> bindValue(":account",$_GET[account],PDO::PARAM_STR);
      $sql -> bindValue(":pwd",$_GET[psw],PDO::PARAM_STR);
      $sql -> execute();
      if ($row=$sql->fetch(PDO::FETCH_OBJ) != "") {
        // PDO::FETCH_OBJ 指定取出資料的型態
        session_start();
        $_SESSION["account"] = $_GET[account];
        header("Location:MemberList.php");

    }

      $error="帳號密碼輸入錯誤";
    
    }
?>

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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>30</b>Days</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="Login.php" method="get">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="account">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="psw">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <p class="login-box-msg" ><font color="red"> <? echo $error;   ?></font> </p>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
               <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>



