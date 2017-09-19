<?
date_default_timezone_set("PRC");
$getthismonth = date("Y-m"); //現在是幾月
$thismonthday1 = $getthismonth ."-01 00:00:00"; //現在月份＋日時分秒
//echo $thismonthday1;
$thismonthtime = strtotime($thismonthday1); //把本月第一天轉成時間戳記
//echo $which;
$howmanydays = date("t",$thismonthtime); //該月有幾天
$which = date("N",$thismonthtime);//該月第一天為星期幾
//echo $which;

?>

<!DOCTYPE html>
<html>
<head>
	<title>本月月曆</title>
</head>
<body>
	<table border=1>
		<tr >
			<td colspan="7"><center>本月月曆</center></td>
		</tr>
		<tr>
			<td>mon</td>
			<td>tus</td>
			<td>wed</td>
			<td>thu</td>
			<td>fri</td>
			<td>sat</td>
			<td>sun</td>
		</tr>

		<?
			echo "<tr>";
			for ($i=1; $i<$which ; $i++)  //畫出空白儲存格
			{ 
				echo" <td>";
			}
			for ($i=1; $i<=$howmanydays ; $i++) 
			{ 
				$week123 = 9-$which;
				if ( $i%7 == $week123 ) 
				{
					echo "<tr>";
				}
				echo "<td>".$i;
			}
			

		?>

	</table>

</body>
</html>


<?

$a = array(array(5,4,4),4,3,2,1);
foreach ($a as $key => $value) {
	echo "$key : $value <br>";
}

?>







