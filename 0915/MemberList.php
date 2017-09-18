
<?php




$hostname = 'kusoinlol.synology.me';
$username = 'rita_liu';
$password = 'rita_liu';
$db_name="rita_liu";


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

    if ($_GET[id]!="") 
    {
        $count=$db->exec("delete from 0915member where id='$_GET[id]' ");
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
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">會員列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>會員編號</th>
                  <th>姓名</th>
                  <th>帳號</th>
                  <th>加入時間</th>
                  <th>功能</th>
                </tr>
                </thead>
                <tbody>
<!--                 <tr>
                  <td>1</td>
                  <td>蔡依林</td>
                  <td>jolin@friday.tw</td>
                  <td>2017-10-10</td>
                  <td>
                    <button type="button" class="btn btn-info" onClick="window.location.href='Profile.php?memberId=1';">編輯</button>
                    <button type="button" class="btn btn-danger" onClick="window.location.href='MemberList.php?memberId=1';">刪除</button>
                  </td>
                </tr>
 -->
                <?

                $sql="Select * from 0915member ";
                $result=$db->query($sql);

                while($row=$result->fetch(PDO::FETCH_OBJ))
                  {
                     //PDO::FETCH_OBJ 指定取出資料的型態
                  echo "<tr>";
                   echo "<td>".$row->id."</td>";
                   echo "<td>".$row->name."</td>";
                   echo "<td>".$row->account."</td>";
                   echo "<td>".$row->creatTime."</td>";
                   echo "<td> 
                    <button type=\"button\" class=\"btn btn-info\" onClick=\"window.location.href='Profile.php?id=".$row->id."';\">編輯</button>
                    <button type=\"button\" class=\"btn btn-danger\" onClick=\"window.location.href='MemberList.php?id=".$row->id."';\">刪除</button>
                  </td>" ;
                  echo "<tr>";
                 }

                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="row">
             <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
             </div>
             <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                   <ul class="pagination">
                      <li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                      <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                      <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                      <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                   </ul>
                </div>
             </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- jQuery 3 -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>


<pre style="font-family: Andale Mono, Lucida Console, Monaco, fixed, monospace; color: #000000; background-color: #eee;font-size: 12px;border: 1px dashed #999999;line-height: 14px;padding: 5px; overflow: auto; width: 100%"><code><br/>&lt;?php<br/><br/><br/><br/>$hostname&nbsp;=&nbsp;'kusoinlol.synology.me';<br/>$username&nbsp;=&nbsp;'rita_liu';<br/>$password&nbsp;=&nbsp;'rita_liu';<br/>$db_name="rita_liu";<br/><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db=new&nbsp;PDO(</span>"mysql:host=".$hostname.";port=3307<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dbname=".$db_name,&nbsp;$username,&nbsp;$password,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array(</span>PDO::MYSQL_ATTR_INIT_COMMAND&nbsp;=&gt;&nbsp;"SET&nbsp;NAMES&nbsp;utf8")</span>)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;exec(</span>'USE&nbsp;'.$db_name)</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//echo '連線成功';</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;$db-&gt;setAttribute(</span>PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)</span>;&nbsp;<span class="comment">//錯誤訊息提醒</span><br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(</span>$_GET[id]!="")</span>&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$count=$db-&gt;exec(</span>"delete&nbsp;from&nbsp;0915member&nbsp;where&nbsp;id='$_GET[id]'&nbsp;")</span>;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;$count;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/><br/><br/><br/>?&gt;<br/><br/><br/>&lt;!DOCTYPE&nbsp;html&gt;<br/>&lt;html&gt;<br/>&lt;head&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;charset="utf-8"&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;http-equiv="X-UA-Compatible"&nbsp;content="IE=edge"&gt;<br/>&nbsp;&nbsp;&lt;title&gt;30&nbsp;Days&nbsp;to&nbsp;be&nbsp;RD&lt;/title&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Tell&nbsp;the&nbsp;browser&nbsp;to&nbsp;be&nbsp;responsive&nbsp;to&nbsp;screen&nbsp;width&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;meta&nbsp;content="width=device-width,&nbsp;initial-scale=1,&nbsp;maximum-scale=1,&nbsp;user-scalable=no"&nbsp;name="viewport"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></span><br/>&nbsp;&nbsp;&lt;!--&nbsp;Theme&nbsp;style&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="dist/css/AdminLTE.min.css"&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="dist/css/skins/_all-skins.min.css"&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;HTML5&nbsp;Shim&nbsp;and&nbsp;Respond.js&nbsp;IE8&nbsp;support&nbsp;of&nbsp;HTML5&nbsp;elements&nbsp;and&nbsp;media&nbsp;queries&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;!--&nbsp;WARNING:&nbsp;Respond.js&nbsp;doesn't&nbsp;work&nbsp;if&nbsp;you&nbsp;view&nbsp;the&nbsp;page&nbsp;via&nbsp;file:<span class="comment">// --></span><br/>&nbsp;&nbsp;&lt;!--[if&nbsp;lt&nbsp;IE&nbsp;9]&gt;<br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script></span><br/>&nbsp;&nbsp;&lt;script&nbsp;src="https:<span class="comment">//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script></span><br/>&nbsp;&nbsp;&lt;![endif]--&gt;<br/><br/>&nbsp;&nbsp;&lt;!--&nbsp;Google&nbsp;Font&nbsp;--&gt;<br/>&nbsp;&nbsp;&lt;link&nbsp;rel="stylesheet"&nbsp;href="https:<span class="comment">//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"></span><br/>&lt;/head&gt;<br/>&lt;body&nbsp;class="hold-transition&nbsp;skin-blue&nbsp;sidebar-mini"&gt;<br/>&lt;div&nbsp;class="wrapper"&gt;<br/><br/>&nbsp;&nbsp;&lt;header&nbsp;class="main-header"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Logo&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="index2.html"&nbsp;class="logo"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;mini&nbsp;logo&nbsp;for&nbsp;sidebar&nbsp;mini&nbsp;50x50&nbsp;pixels&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="logo-mini"&gt;&lt;b&gt;GuestBook&lt;/b&gt;&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;logo&nbsp;for&nbsp;regular&nbsp;state&nbsp;and&nbsp;mobile&nbsp;devices&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="logo-lg"&gt;&lt;b&gt;30&lt;/b&gt;Days&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Header&nbsp;Navbar:&nbsp;style&nbsp;can&nbsp;be&nbsp;found&nbsp;in&nbsp;header.less&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;nav&nbsp;class="navbar&nbsp;navbar-static-top"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="navbar-custom-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&nbsp;class="nav&nbsp;navbar-nav"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a&nbsp;href="#"&gt;留言板&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a&nbsp;href="#"&gt;會員列表&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;User&nbsp;Account:&nbsp;style&nbsp;can&nbsp;be&nbsp;found&nbsp;in&nbsp;dropdown.less&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="dropdown&nbsp;user&nbsp;user-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="dropdown-toggle"&nbsp;data-toggle="dropdown"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img&nbsp;src="dist/img/user2-160x160.jpg"&nbsp;class="user-image"&nbsp;alt="User&nbsp;Image"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;span&nbsp;class="hidden-xs"&gt;Alexander&nbsp;Pierce&lt;/span&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&nbsp;class="dropdown-menu"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;User&nbsp;image&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="user-header"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img&nbsp;src="dist/img/user2-160x160.jpg"&nbsp;class="img-circle"&nbsp;alt="User&nbsp;Image"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Menu&nbsp;Footer--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="user-footer"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="pull-left"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="btn&nbsp;btn-default&nbsp;btn-flat"&gt;Profile&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="pull-right"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;a&nbsp;href="#"&nbsp;class="btn&nbsp;btn-default&nbsp;btn-flat"&gt;Sign&nbsp;out&lt;/a&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav&gt;<br/>&nbsp;&nbsp;&lt;/header&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;Main&nbsp;content&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&nbsp;class="content"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="row"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="col-xs-12"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box-header"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&nbsp;class="box-title"&gt;會員列表&lt;/h3&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.box-header&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="box-body"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;table&nbsp;id="example2"&nbsp;class="table&nbsp;table-bordered&nbsp;table-hover"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;thead&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;會員編號&lt;/th&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;姓名&lt;/th&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;帳號&lt;/th&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;加入時間&lt;/th&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;功能&lt;/th&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/thead&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tbody&gt;<br/>&lt;!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;1&lt;/td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;蔡依林&lt;/td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;jolin@friday.tw&lt;/td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;2017-10-10&lt;/td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="button"&nbsp;class="btn&nbsp;btn-info"&nbsp;onClick="window.location.href='Profile.php?memberId=1';"&gt;編輯&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type="button"&nbsp;class="btn&nbsp;btn-danger"&nbsp;onClick="window.location.href='MemberList.php?memberId=1';"&gt;刪除&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/td&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br/>&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sql="Select&nbsp;*&nbsp;from&nbsp;0915member&nbsp;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$result=$db-&gt;query(</span>$sql)</span>;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while(</span>$row=$result-&gt;fetch(</span>PDO::FETCH_OBJ)</span>)</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">//PDO::FETCH_OBJ 指定取出資料的型態</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;tr&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;td&gt;".$row-&gt;id."&lt;/td&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;td&gt;".$row-&gt;name."&lt;/td&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;td&gt;".$row-&gt;account."&lt;/td&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;td&gt;".$row-&gt;creatTime."&lt;/td&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;td&gt;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type=\"button\"&nbsp;class=\"btn&nbsp;btn-info\"&nbsp;onClick=\"window.location.href='Profile.php?id=".$row-&gt;id."';\"&gt;編輯&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;button&nbsp;type=\"button\"&nbsp;class=\"btn&nbsp;btn-danger\"&nbsp;onClick=\"window.location.href='MemberList.php?id=".$row-&gt;id."';\"&gt;刪除&lt;/button&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/td&gt;"&nbsp;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;echo&nbsp;"&lt;tr&gt;";<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;?&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/tbody&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/table&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.box-body&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.box&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="row"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="col-sm-5"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="dataTables_info"&nbsp;id="example2_info"&nbsp;role="status"&nbsp;aria-live="polite"&gt;Showing&nbsp;1&nbsp;to&nbsp;10&nbsp;of&nbsp;57&nbsp;entries&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="col-sm-7"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&nbsp;class="dataTables_paginate&nbsp;paging_simple_numbers"&nbsp;id="example2_paginate"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&nbsp;class="pagination"&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;previous&nbsp;disabled"&nbsp;id="example2_previous"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="0"&nbsp;tabindex="0"&gt;Previous&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;active"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="1"&nbsp;tabindex="0"&gt;1&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="2"&nbsp;tabindex="0"&gt;2&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="3"&nbsp;tabindex="0"&gt;3&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="4"&nbsp;tabindex="0"&gt;4&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="5"&nbsp;tabindex="0"&gt;5&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="6"&nbsp;tabindex="0"&gt;6&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&nbsp;class="paginate_button&nbsp;next"&nbsp;id="example2_next"&gt;&lt;a&nbsp;href="#"&nbsp;aria-controls="example2"&nbsp;data-dt-idx="7"&nbsp;tabindex="0"&gt;Next&lt;/a&gt;&lt;/li&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.col&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.row&nbsp;--&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&lt;!--&nbsp;/.content&nbsp;--&gt;<br/>&lt;/div&gt;<br/>&lt;!--&nbsp;jQuery&nbsp;3&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/jquery-3.2.1.min.js"></script></span><br/>&lt;!--&nbsp;jQuery&nbsp;UI&nbsp;1.11.4&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script></span><br/>&lt;!--&nbsp;Bootstrap&nbsp;3.3.7&nbsp;--&gt;<br/>&lt;script&nbsp;src="https:<span class="comment">//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></span><br/>&lt;/body&gt;<br/>&lt;/html&gt;<br/><br/></code></pre>
