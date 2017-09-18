<?php

$hostname = 'kusoinlol.synology.me';
$username = 'rita_liu';
$password = 'rita_liu';
$db_name="rita_liu";

try{
    $db=new PDO("mysql:host=".$hostname.";port=3307
                dbname=".$db_name, $username, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
    $db->exec('USE '.$db_name);
    //echo '連線成功';
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒

    //Query SQL
    
    $sth = $db->prepare("Select * from Member where email=?,name=?");
    $sth->execute(array('jarvis@soez.tw'));
    while($row=$sth->fetch(PDO::FETCH_OBJ)){
        //PDO::FETCH_OBJ 指定取出資料的型態
        echo $row->name."<br/>";
        echo $row->createTime."<br/>";
    }
    echo "not found";
    return;

    //Insert
    $count=$db->exec("delete from 0915member where memberId=1");
    echo $count;
    return;

    //Update
    $sth=$db->prepare("update Member set name=:name where email=:email");
    $sth->bindValue(":name","三重金城武",PDO::PARAM_STR);
    $sth->bindValue(":email","jarvis@soez.tw",PDO::PARAM_STR);
    $sth->execute();
    return;
    
    $db=null; //結束與資料庫連線
}
catch(PDOException $e){
    //error message
    echo $e->getMessage(); 
}
?>