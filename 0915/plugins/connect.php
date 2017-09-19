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


?>