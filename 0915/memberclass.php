<?

class Member
{
	public $db;
	public $sessionName;
	public $sessionMemberId;
	public $name;
	public $account;
	public $pwd;
	public $memberid;
	public $page;

	function __construct()
	{
		$hostname = 'kusoinlol.synology.me';
		$username = 'rita_liu';
		$password = 'rita_liu';
		$db_name  = "rita_liu";



   		 $db = new PDO("mysql:host=".$hostname.";port=3307
                dbname=".$db_name, $username, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                // PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
   		 $db->exec('USE '.$db_name);
    		// echo '連線成功';
    	 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	 $this->db = $db;
	}


	function checklogin($sessionAccount)
	{
    	if ($sessionAccount == "") {
      		header('Location:Login.php');
    	} else {
            $sql = "Select * from 0915member where account='$sessionAccount'";
            $result = $this->db->query($sql);
            $row = $result->fetch(PDO::FETCH_OBJ);
            $this->sessionName = $row->name;
            $this->sessionMemberId = $row->id;
    	}
	}

	function memberList($thispage)
	{
 				$sql = "select count(*) as `dbsum` from `0915member`";
                $result = $this->db -> query($sql);
                $row = $result -> fetch(PDO::FETCH_OBJ);
                $membersum = $row->dbsum;
                $this->page = ceil($membersum / 5);
                // 總共有幾頁

                // 每頁顯示的資料
                if ($thispage == "1" || $thispage == "")
                $sql = "Select * from 0915member limit 5";
                else {
                         $pagecount = ($thispage-1)*5;
                         $sql = "Select * from `0915member` limit $pagecount , 5" ;
                     }
                $result=$this->db->query($sql);
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

	}


	function addMember($account,$pwd,$name)
	{
		if ($account != "" && $pwd != "" && $name != "") 
   		{
       		$this->db->exec("INSERT INTO 0915member (`account`, `pwd`, `name`) VALUES ('$account','$pwd','$name'); ");
    	}

	}



	function updateMember($account,$pwd,$name,$id)
	{

    	if ($account !="" && $pwd !="" && $name!="" && $id!="")  
     	{
       		 $this->db->exec("update 0915member set account='$account' , name='$name' ,pwd='$pwd' where id='$id' ");
        	 header("Location:MemberList.php");
        }

    }



	function deleteMember($id)
	{
		if ($id != "") 
   		{
       		$this->db->exec("delete from 0915member where id='$id' ");
    	}

	}

	function getMember($id)
	{
		 if ($id != "" )
   		{
      		$sql="Select * from 0915member where id='$id' ";
      		$result=$this->db->query($sql);
      		$row=$result->fetch(PDO::FETCH_OBJ) ;
            $this->name = $row->name;
            $this->account = $row->account;
            $this->pwd = $row->pwd;   
            $this->memberid=$row->id;
   		}
	}
	


}





?>