
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

  <? include("header.php"); ?>

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
                        $sql = "select count(*) as `dbsum` from `0915member`";
                        $result = $db -> query($sql);
                        $row = $result -> fetch(PDO::FETCH_OBJ);
                        $membersum = $row->dbsum;
                        $page = ceil($membersum / 5);
                        // 總共有幾頁

                // 每頁顯示的資料
                if ($_GET[page] == "1" || $_GET[page] == "")
                    $sql = "Select * from 0915member limit 5";
                else {
                         $pagecount = ($_GET[page]-1)*5;
                         $sql = "Select * from `0915member` limit $pagecount , 5" ;
                     }

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
                      <?                         
                        // 判斷下方出現按鈕
                        for ($i="1"; $i<=$page ; $i++) { ?>
                      <li class="paginate_button "><a href=<?echo "?page=".$i;?> aria-controls="example2" data-dt-idx=<?echo $i;?> tabindex="0"><?echo $i;?></a></li>

                      <?    
                        }
                      ?>
                
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



