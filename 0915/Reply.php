


<?

include("connect.php");
include("checklogin.php");


if ($_POST[replyname]!="" && $_POST[replytext]!="" && $_POST[guestbookid]!="")  
     {
        $count=$db->exec(" INSERT INTO `0915reply` (`guestBookId`, `memberId`, `message`) VALUES ('$_POST[guestbookid]', $memberid, '$_POST[replytext]');");
        echo $count;

        $count=$db->exec(" UPDATE `0915guestbook` SET replayCount = replayCount + 1  WHERE id = '$_POST[guestbookid]' ");
        echo $count;

        header("Location:GuestBook.php");

    }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>30 Days To Be RD</title>
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

<section class="content">
  <!-- general form elements -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">回覆</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="Reply.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputPassword1">姓名</label>
          <input type="text" class="form-control" id="name" value=<? echo $loginname; ?> name="replyname">
        </div>
        <div class="form-group">
          <label>回覆訊息</label>
          <textarea class="form-control" rows="3" placeholder="Enter ..." name="replytext" ></textarea>
          <input type="hidden" name='guestbookid' value= <? echo $_GET[guestBookId]; ?> >

        </div>
      </div>
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
