<?

$filename = array("photo.jpg","readme.doc","sheet.xls");
$filename2 = array(".doc" => "word檔",".xls" => "excel檔",".jpg"=>"圖片檔");

foreach ($filename as $key => $value) 
{
	$ft = strstr($value, ".");
		foreach ($filename2 as $key2 => $value2) 
		{
			if ($key2==$ft)
				{
					echo $value."是".$value2."副檔名是".$key2."<br>" ;
				}
			
		}
}
//第七章實作一
echo "<p>";
$joke="A Window Seat\nA: Which do you prefer, a window seat or an aisle seat?\nB: I always prefer a window seat.\nA: Why?\nB: In case some bad thing happen I can jump out from it.";
$joke2= nl2br($joke);
echo ucwords($joke2);


//第七章實作二
echo "<p>";
$a="ABCDE";
$result=str_split($a);
foreach ($result as $num => $sub) 
{
	for ($i=0; $i<=$num ; $i++) 
	{ 
		echo $sub;
	}
	echo "<br>";
	
}

//echo $result;

//第七章實作三

$student = array(array('姓名' =>"王一" ,'生日' =>"2000/3/14" ,'電話' =>"0211111111" ,), 
	array('姓名' =>"王二" ,'生日' =>"2000/6/6" ,'電話' =>"0222222222" ,) ,
	array('姓名' =>"王三" ,'生日' =>"2000/7/15" ,'電話' =>"0233333333" ,) 
);


foreach ($student as $stu1 => $val1) 
{
	echo "姓名：".$val1[姓名]."<br>";
	$change=array("0" =>"零","1"=>"一","2"=>"二","3"=>"三","4"=>"四","5"=>"五","6"=>"六","7"=>"七");
	echo "生日：".strtr($val1[生日], $change)."<br>";
	//echo "生日：".strtr($val1[生日], "0123456789", "零一二三四五六七八九");
	echo "電話：(".substr($val1[電話],0,2).")".substr($val1[電話],2);
	//foreach ($val1 as $stu2 => $val2) 
	//{
	//	echo "姓名：".$val1[姓名];
	//}
	echo "<br>";
}
//print_r($student);
echo "<p>";


//第七章 實作四
$add = "公司網址 http://www.e-happy.com.tw，部落格是 http://blog.e-happy.com.tw";
echo ereg_replace("[a-zA-Z\.:/-]+", "<a href=mailto:\\0>\\0</a>", $add);



















	
?>