

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

    session_start();
    if ($_SESSION["account"]=="") 
    {
      header('Location:Login.php');
    }
    else
    {
                $sql="Select name from 0915member where account='$_SESSION[account]' ";
                $result=$db->query($sql);
                while($row=$result->fetch(PDO::FETCH_OBJ))
                  {
                    $loginname = $row->name;
                  }

    }


    if ($_GET[id]!="" ) 
    {
      $sql="Select * from 0915member where id='$_GET[id]' ";
      $result=$db->query($sql);
      while($row=$result->fetch(PDO::FETCH_OBJ))
                  {
                     //PDO::FETCH_OBJ 指定取出資料的型態
                   $p_name= $row->name;
                   $p_account= $row->account;
                   $p_pwd= $row->pwd;   
                   $p_id= $row->id; 
                 }
    }
    if ($_POST[account]!="" && $_POST[pwd]!="" && $_POST[name]!="" && $_POST[id]!="")  
     {
        $count=$db->exec("update 0915member set account='$_POST[account]' , name='$_POST[name]' ,pwd='$_POST[pwd]' where id='$_POST[id]' ");
        echo $count;
        header("Location:MemberList.php");

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
              <span class="hidden-xs"><? echo $loginname; ?></span>
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
<section class="content">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">個人資料修改</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="Profile.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="text" class="form-control" id="name" name="name" value= <? echo $p_name; ?> >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" placeholder="Enter email" name="account" value= <? echo $p_account; ?> >
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="pwd" value= <? echo $p_pwd; ?> >
        </div>
      </div>
      <input type="hidden" name='id' value= <? echo $p_id; ?> >
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
    </section>
</div>
<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<pre style="font-family: Andale Mono, Lucida Console, Monaco, fixed, monospace; color: #000000; background-color: #eee;font-size: 12px;border: 1px dashed #999999;line-height: 14px;padding: 5px; overflow: auto; width: 100%"><code><br/><br/>&lt;?<br/><br/>$hostname&nbsp;=&nbsp;'kusoinlol.synology.me';<br/>$username&nbsp;=&nbsp;'rita_liu';<br/>$password&nbsp;=&nbsp;'rita_liu';<br/>$db_name="rita_liu";<br/><br/><span class="comment">// try{</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db=new&nbsp;PDO(</span>"mysql:host=".$hostname.";port=3307<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dbname=".$db_name,&nbsp;$username,&nbsp;$password,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(</span>PDO::MYSQL_ATTR_INIT_COMMAND&nbsp;=&gt;&nbsp;"SET&nbsp;NAMES&nbsp;utf8")</span>)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;exec(</span>'USE&nbsp;'.$db_name)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//echo '連線成功';</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;setAttribute(</span>PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)</span>;&nbsp;<span class="comment">//錯誤訊息提醒</span><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span>$_GET[id]!=""&nbsp;)</span>&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sql="Select&nbsp;*&nbsp;from&nbsp;0915member&nbsp;where&nbsp;id='$_GET[id]'&nbsp;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$result=$db-&gt;query(</span>$sql)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while(</span>$row=$result-&gt;fetch(</span>PDO::FETCH_OBJ)</span>)</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//PDO::FETCH_OBJ 指定取出資料的型態</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$p_name=&nbsp;$row-&gt;name;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$p_account=&nbsp;$row-&gt;account;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$p_pwd=&nbsp;$row-&gt;pwd;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$p_id=&nbsp;$row-&gt;id;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span>$_POST[account]!=""&nbsp;&amp;&amp;&nbsp;$_POST[pwd]!=""&nbsp;&amp;&amp;&nbsp;$_POST[name]!=""&nbsp;&amp;&amp;&nbsp;$_POST[id]!="")</span>&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count=$db-&gt;exec(</span>"update&nbsp;0915member&nbsp;set&nbsp;account='$_POST[account]'&nbsp;,&nbsp;name='$_POST[name]'&nbsp;,pwd='$_POST[pwd]'&nbsp;where&nbsp;id='$_POST[id]'&nbsp;")</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$count;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header(</span>"Location:MemberList.php")</span>;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/><br/><br/>?&gt;<br/><br/><br/>&lt;!DOCTYPE&nbsp;html&gt;<br/>&lt;html&gt;<br/>&lt;head&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;charset="utf-8"&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;http-equiv="X-UA-Compatible"&nbsp;content="IE=edge"&gt;<br/>&nbsp;&nbsp;&lt;title&gt;30&nbsp;Days&nbsp;to&nbsp;be&nbsp;RD&lt;/title&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Tell&nbsp;the&nbsp;browser&nbsp;to&nbsp;be&nbsp;responsive&nbsp;to&nbsp;screen&nbsp;width&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;content="width=device-width,&nbsp;initial-scale=1,&nbsp;maximum-scale=1,&nbsp;user-scalable=no"&nbsp;name="viewport"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></span><br/>&nbsp;&nbsp;&lt;!--&nbsp;Theme&nbsp;style&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="dist/css/AdminLTE.min.css"&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="dist/css/skins/_all-skins.min.css"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;HTML5&nbsp;Shim&nbsp;and&nbsp;Respond.js&nbsp;IE8&nbsp;support&nbsp;of&nbsp;HTML5&nbsp;elements&nbsp;and&nbsp;media&nbsp;queries&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;WARNING:&nbsp;Respond.js&nbsp;doesn't&nbsp;work&nbsp;if&nbsp;you&nbsp;view&nbsp;the&nbsp;page&nbsp;via&nbsp;file:<span class="comment">// --></span><br/>&nbsp;&nbsp;&lt;!--[if&nbsp;lt&nbsp;IE&nbsp;9]&gt;<br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script></span><br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script></span><br/>&nbsp;&nbsp;&lt;![endif]--&gt;<br/><br/>&nbsp;&nbsp;&lt;!--&nbsp;Google&nbsp;Font&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"></span><br/>&lt;/head&gt;<br/>&lt;body&nbsp;class="hold-transition&nbsp;skin-blue&nbsp;sidebar-mini"&gt;<br/>&lt;div&nbsp;class="wrapper"&gt;<br/><br/>&nbsp;&nbsp;&lt;header&nbsp;class="main-header"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Logo&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="index2.html"&nbsp;class="logo"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;mini&nbsp;logo&nbsp;for&nbsp;sidebar&nbsp;mini&nbsp;50x50&nbsp;pixels&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="logo-mini"&gt;&lt;b&gt;GuestBook&lt;/b&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;logo&nbsp;for&nbsp;regular&nbsp;state&nbsp;and&nbsp;mobile&nbsp;devices&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="logo-lg"&gt;&lt;b&gt;30&lt;/b&gt;Days&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Header&nbsp;Navbar:&nbsp;style&nbsp;can&nbsp;be&nbsp;found&nbsp;in&nbsp;header.less&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;nav&nbsp;class="navbar&nbsp;navbar-static-top"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="navbar-custom-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&nbsp;class="nav&nbsp;navbar-nav"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a&nbsp;href="#"&gt;留言板&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a&nbsp;href="#"&gt;會員列表&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;User&nbsp;Account:&nbsp;style&nbsp;can&nbsp;be&nbsp;found&nbsp;in&nbsp;dropdown.less&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="dropdown&nbsp;user&nbsp;user-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="dropdown-toggle"&nbsp;data-toggle="dropdown"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img&nbsp;src="dist/img/user2-160x160.jpg"&nbsp;class="user-image"&nbsp;alt="User&nbsp;Image"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="hidden-xs"&gt;Alexander&nbsp;Pierce&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&nbsp;class="dropdown-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;User&nbsp;image&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="user-header"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img&nbsp;src="dist/img/user2-160x160.jpg"&nbsp;class="img-circle"&nbsp;alt="User&nbsp;Image"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Menu&nbsp;Footer--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="user-footer"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="pull-left"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="btn&nbsp;btn-default&nbsp;btn-flat"&gt;Profile&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="pull-right"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="btn&nbsp;btn-default&nbsp;btn-flat"&gt;Sign&nbsp;out&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav&gt;<br/>&nbsp;&nbsp;&lt;/header&gt;<br/>&lt;section&nbsp;class="content"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;general&nbsp;form&nbsp;elements&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;div&nbsp;class="box&nbsp;box-primary"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box-header&nbsp;with-border"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&nbsp;class="box-title"&gt;個人資料修改&lt;/h3&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.box-header&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;form&nbsp;start&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;form&nbsp;action="Profile.php"&nbsp;method="post"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box-body"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label&nbsp;for="exampleInputPassword1"&gt;Name&lt;/label&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="text"&nbsp;class="form-control"&nbsp;id="name"&nbsp;name="name"&nbsp;value=&nbsp;&lt;?&nbsp;echo&nbsp;$p_name;&nbsp;?&gt;&nbsp;&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label&nbsp;for="exampleInputEmail1"&gt;Email&nbsp;address&lt;/label&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="email"&nbsp;class="form-control"&nbsp;placeholder="Enter&nbsp;email"&nbsp;name="account"&nbsp;value=&nbsp;&lt;?&nbsp;echo&nbsp;$p_account;&nbsp;?&gt;&nbsp;&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="form-group"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label&nbsp;for="exampleInputPassword1"&gt;Password&lt;/label&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="password"&nbsp;class="form-control"&nbsp;placeholder="Password"&nbsp;name="pwd"&nbsp;value=&nbsp;&lt;?&nbsp;echo&nbsp;$p_pwd;&nbsp;?&gt;&nbsp;&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input&nbsp;type="hidden"&nbsp;name='id'&nbsp;value=&nbsp;&lt;?&nbsp;echo&nbsp;$p_id;&nbsp;?&gt;&nbsp;&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.box-body&nbsp;--&gt;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box-footer"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="submit"&nbsp;class="btn&nbsp;btn-primary"&gt;Submit&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/form&gt;<br/>&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;/.box&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br/>&lt;/div&gt;<br/>&lt;!--&nbsp;jQuery&nbsp;3&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/jquery-3.2.1.min.js"></script></span><br/>&lt;!--&nbsp;jQuery&nbsp;UI&nbsp;1.11.4&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script></span><br/>&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></span><br/>&lt;/body&gt;<br/>&lt;/html&gt;<br/><br/></code></pre>
