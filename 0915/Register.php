
<?

$hostname = 'kusoinlol.synology.me';
$username = 'rita_liu';
$password = 'rita_liu';
$db_name="rita_liu";

// try{
    $db=new PDO("mysql:host=".$hostname.";port=3307
                dbname=".$db_name, $username, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    $db->exec('USE '.$db_name);
    //echo '連線成功';
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒

    if ($_POST[account]!="" && $_POST[pwd]!="" && $_POST[name]!="") 
    {
       $count=$db->exec("INSERT INTO 0915member (`account`, `pwd`, `name`) VALUES ('$_POST[account]','$_POST[pwd]','$_POST[name]');  ");
        echo $count;
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>30</b>Days</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="Register.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="account">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="pwd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!-- <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div> -->
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="Login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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


<pre style="font-family: Andale Mono, Lucida Console, Monaco, fixed, monospace; color: #000000; background-color: #eee;font-size: 12px;border: 1px dashed #999999;line-height: 14px;padding: 5px; overflow: auto; width: 100%"><code><br/>&lt;?<br/><br/>$hostname&nbsp;=&nbsp;'kusoinlol.synology.me';<br/>$username&nbsp;=&nbsp;'rita_liu';<br/>$password&nbsp;=&nbsp;'rita_liu';<br/>$db_name="rita_liu";<br/><br/><span class="comment">// try{</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db=new&nbsp;PDO(</span>"mysql:host=".$hostname.";port=3307<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dbname=".$db_name,&nbsp;$username,&nbsp;$password,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(</span>PDO::MYSQL_ATTR_INIT_COMMAND&nbsp;=&gt;&nbsp;"SET&nbsp;NAMES&nbsp;utf8")</span>)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;exec(</span>'USE&nbsp;'.$db_name)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//echo '連線成功';</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;setAttribute(</span>PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)</span>;&nbsp;<span class="comment">//錯誤訊息提醒</span><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span>$_POST[account]!=""&nbsp;&amp;&amp;&nbsp;$_POST[pwd]!=""&nbsp;&amp;&amp;&nbsp;$_POST[name]!="")</span>&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count=$db-&gt;exec(</span>"INSERT&nbsp;INTO&nbsp;0915member&nbsp;(</span>`account`,&nbsp;`pwd`,&nbsp;`name`)</span>&nbsp;VALUES&nbsp;(</span>'$_POST[account]','$_POST[pwd]','$_POST[name]')</span>;&nbsp;&nbsp;")</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$count;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>?&gt;<br/><br/><br/>&lt;!DOCTYPE&nbsp;html&gt;<br/>&lt;html&gt;<br/>&lt;head&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;charset="utf-8"&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;http-equiv="X-UA-Compatible"&nbsp;content="IE=edge"&gt;<br/>&nbsp;&nbsp;&lt;title&gt;30&nbsp;Days&nbsp;to&nbsp;be&nbsp;RD&lt;/title&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Tell&nbsp;the&nbsp;browser&nbsp;to&nbsp;be&nbsp;responsive&nbsp;to&nbsp;screen&nbsp;width&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;content="width=device-width,&nbsp;initial-scale=1,&nbsp;maximum-scale=1,&nbsp;user-scalable=no"&nbsp;name="viewport"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></span><br/>&nbsp;&nbsp;&lt;!--&nbsp;Theme&nbsp;style&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="dist/css/AdminLTE.min.css"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;iCheck&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="plugins/iCheck/square/blue.css"&gt;<br/><br/>&nbsp;&nbsp;&lt;!--&nbsp;HTML5&nbsp;Shim&nbsp;and&nbsp;Respond.js&nbsp;IE8&nbsp;support&nbsp;of&nbsp;HTML5&nbsp;elements&nbsp;and&nbsp;media&nbsp;queries&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;WARNING:&nbsp;Respond.js&nbsp;doesn't&nbsp;work&nbsp;if&nbsp;you&nbsp;view&nbsp;the&nbsp;page&nbsp;via&nbsp;file:<span class="comment">// --></span><br/>&nbsp;&nbsp;&lt;!--[if&nbsp;lt&nbsp;IE&nbsp;9]&gt;<br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script></span><br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script></span><br/>&nbsp;&nbsp;&lt;![endif]--&gt;<br/><br/>&nbsp;&nbsp;&lt;!--&nbsp;Google&nbsp;Font&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"></span><br/>&lt;/head&gt;<br/>&lt;body&nbsp;class="hold-transition&nbsp;register-page"&gt;<br/>&lt;div&nbsp;class="register-box"&gt;<br/>&nbsp;&nbsp;&lt;div&nbsp;class="register-logo"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="../../index2.html"&gt;&lt;b&gt;30&lt;/b&gt;Days&lt;/a&gt;<br/>&nbsp;&nbsp;&lt;/div&gt;<br/><br/>&nbsp;&nbsp;&lt;div&nbsp;class="register-box-body"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&nbsp;class="login-box-msg"&gt;Register&nbsp;a&nbsp;new&nbsp;membership&lt;/p&gt;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;form&nbsp;action="Register.php"&nbsp;method="post"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group&nbsp;has-feedback"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="text"&nbsp;class="form-control"&nbsp;placeholder="Full&nbsp;name"&nbsp;name="name"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="glyphicon&nbsp;glyphicon-user&nbsp;form-control-feedback"&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group&nbsp;has-feedback"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="email"&nbsp;class="form-control"&nbsp;placeholder="Email"&nbsp;name="account"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="glyphicon&nbsp;glyphicon-envelope&nbsp;form-control-feedback"&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group&nbsp;has-feedback"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="password"&nbsp;class="form-control"&nbsp;placeholder="Password"&nbsp;name="pwd"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="glyphicon&nbsp;glyphicon-lock&nbsp;form-control-feedback"&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;&lt;div&nbsp;class="form-group&nbsp;has-feedback"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="password"&nbsp;class="form-control"&nbsp;placeholder="Retype&nbsp;password"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="glyphicon&nbsp;glyphicon-log-in&nbsp;form-control-feedback"&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="row"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.col&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="col-xs-4"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="submit"&nbsp;class="btn&nbsp;btn-primary&nbsp;btn-block&nbsp;btn-flat"&gt;Register&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.col&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/form&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="login.html"&nbsp;class="text-center"&gt;I&nbsp;already&nbsp;have&nbsp;a&nbsp;membership&lt;/a&gt;<br/>&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;/.form-box&nbsp;--&gt;<br/>&lt;/div&gt;<br/>&lt;!--&nbsp;/.register-box&nbsp;--&gt;<br/><br/>&lt;!--&nbsp;jQuery&nbsp;3&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/jquery-3.2.1.min.js"></script></span><br/>&lt;!--&nbsp;jQuery&nbsp;UI&nbsp;1.11.4&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script></span><br/>&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></span><br/>&lt;script&gt;<br/>&nbsp;&nbsp;$(</span>function&nbsp;(</span>)</span>&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;$(</span>'input')</span>.iCheck(</span>{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;checkboxClass:&nbsp;'icheckbox_square-blue',<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;radioClass:&nbsp;'iradio_square-blue',<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;increaseArea:&nbsp;'20%'&nbsp;<span class="comment">// optional</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;})</span>;<br/>&nbsp;&nbsp;})</span>;<br/>&lt;/script&gt;<br/>&lt;/body&gt;<br/>&lt;/html&gt;<br/><br/></code></pre>