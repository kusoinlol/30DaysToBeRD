<?

/**
* 
*/
class student 
{
	var $name;
	var $age;
	var $tall;
	var $weight;	

	function __construct()
	{
		echo "-----資料開始-----<br>";
	}
	function __destruct()
	{
		echo "----END----<br>";
	}

	function setdata($name1,$age1,$tall1,$weight1)
	{
		$this->name = $name1;
		$this->age = $age1;
		$this->tall = $tall1;
		$this->weight = $weight1;
	}

	function show()
	{
		echo "姓名：".$this->name."<br>";
		echo "年齡：".$this->age."<br>";
		echo "身高：".$this->tall."<br>";
		echo "體重：".$this->weight."<br>";

	}
	
}


?>