<?

require("0917-3.php");
$stu = new student();
$stu -> setdata("王小明","17","180","70");
$stu -> show();
$stu = null;


$abc = "1";
if($abc){
	echo "123<br>";
} else {
	echo "234<br>";
}

function abc($a,$b)
{
	echo "$a.$b";
}

abc("","2");


?>