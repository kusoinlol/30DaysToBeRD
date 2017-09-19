<?php
session_start();
if ($_SESSION["account"] == "") {
    header('Location:Login.php');
} else {
    $sql    = "Select * from 0915member where account='$_SESSION[account]' ";
    $result = $db->query($sql);

    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
        $loginname = $row->name;
        $memberid  = $row->id;
    }
}
?>
