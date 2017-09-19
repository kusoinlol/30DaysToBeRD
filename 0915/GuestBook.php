
<?

include("connect.php");
include("checklogin.php");

// 刪除留言
if ($_GET[memberid] == $memberid && $_GET[guestbookid]!="" && $_GET[replayid]=="" )
    {
      $count=$db->exec("delete from 0915guestbook where memberId=$memberid and guestBookId=$_GET[guestbookid] ");
      echo $count;

      $count=$db->exec("delete from 0915reply where guestBookId=$_GET[guestbookid] ");
      echo $count;

        header("Location:GuestBook.php");

    }
elseif ($_GET[memberid] != $memberid && $_GET[guestbookid]!="") 
    {
      $error = "只可以刪除自己的留言";
    }

//刪除回覆

if ($_GET[memberid] == $memberid && $_GET[replayid]!="" && $_GET[guestbookid]!="")
    {
      $count=$db->exec("delete from 0915reply where memberId=$memberid and replyId=$_GET[replayid] ");
      echo $count;

      $count=$db->exec(" UPDATE `0915guestbook` SET replayCount = replayCount - 1  WHERE guestBookId = '$_GET[guestbookid]' ");
        echo $count;

        header("Location:GuestBook.php");

    }
elseif ($_GET[memberid] != $memberid && $_GET[replayid]!="" && $_GET[guestbookid]!="") 
    {
      $error = "只可以刪除自己的留言";
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

<?
    if ($error!="") 
    {
      echo "<p class=\"login-box-msg\" ><font color=\"red\">";
      echo "<br>".$error;
      echo "</font> </p>";
     
    }
?>




<div class="wrapper">

  
<? include("header.php"); ?>



   <div class="box box-success">
      <div class="box-header">
        <i class="fa fa-comments-o"></i>

        <h3 class="box-title">留言板</h3>

        <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
          <div class="btn-group" data-toggle="btn-toggle">
             <i class="fa fa-square text-green"> 
                <input type="button" value="新增留言" onclick="location.href='Message.php' ">
             </i>

            </button>
          </div>
        </div>
      </div>


      <div class="box-body chat" id="chat-box">
        <!-- chat item -->
        



           <?

                $sql="select `0915guestbook`.`guestBookId`,`0915guestbook`.`memberid`,`0915guestbook`.`message`,`0915guestbook`.`replayCount`,`0915guestbook`.`creatTime`,`0915member`.`id`, `0915member`.`name` from `0915guestbook` JOIN `0915member` 
                  ON `0915guestbook`.`memberId` = `0915member`.`id`";
                $result=$db->query($sql);

                while($row=$result->fetch(PDO::FETCH_OBJ))
                  {
                     //PDO::FETCH_OBJ 指定取出資料的型態
                     echo "<div class=\"item\">
                           <img src=\"dist/img/user4-128x128.jpg\" alt=\"user image\" class=\"online\">";
    
                      
                      
                          echo "<p class=\"message\"> 
                                <a href=\"#\" class=\"name\"> ";
                          echo $row->name;
                          echo "</a>";
                          echo " <span class=\"pull-right\"> " ;
                          echo "<a href=\"Reply.php?guestBookId=$row->guestBookId\" class=\"label label label-success\">回覆留言</a>";
                        echo "<a href=\"GuestBook.php?memberid=$row->id&guestbookid=$row->guestBookId \" class=\"label label label-danger\">刪除</a>";
                          echo "</span>";
                          echo "<small class=\"text-muted\"><i class=\"fa fa-clock-o\"></i> ";
                          echo $row->creatTime;
                          echo "</small>";
                          echo "<div> ";
                          echo $row->message;
                          echo "</div>";
                          echo "</p>";

                          
                          //回覆開始
                          
                          if ($row->replayCount > 0) 
                          {
                            
                            $sql3=" select `0915reply`.`replyId`,`0915reply`.`guestBookId`,`0915member`.`id`,`0915reply`.`message`,`0915reply`.`creatTime`,`0915member`.`name` from `0915reply` JOIN `0915member` 
                            ON `0915reply`.`memberId` = `0915member`.`id`
                            where guestBookId=$row->guestBookId ";
                            $result3=$db->query($sql3);
                            while($row3=$result3->fetch(PDO::FETCH_OBJ))
                            {
                              echo " <div class=\"attachment\">
                                      <a href=\"#\" class=\"name\">
                                    <small class=\"text-muted pull-right\"><i class=\"fa fa-clock-o\"></i> ";
                              echo $row3->creatTime;
                              echo "</small> ";
                              echo $row3->name;
                              echo "</a>
                                    <p>";
                              echo $row3->message; 
                              echo "</p>
                                  <div class=\"pull-right\">
                                  <a href=\"GuestBook.php?memberid=$row3->id&replayid=$row3->replyId&guestbookid=$row3->guestBookId \" class=\"label label-danger\">刪除</a></div>       
                                    </div>";
                              

                              }
                          }
                          
                          //回覆結束


                          echo  "<div class=\"item\">";
                        
                        
                   
                 }

            ?>

          
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
