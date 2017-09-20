
<?php

include("memberclass.php");

session_start();

$member = new Member;
$member->checklogin($_SESSION["account"]);
$member->deleteMember($_GET[id]);




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

  <? $loginname = $member->sessionName;
      include("header.php"); 
      ?>

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
                  $member->memberList($_GET[page]);
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
                        for ($i="1"; $i<=$member->page ; $i++) { ?>
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



