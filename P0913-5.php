<?

$week[]="monday";
$week[]="tuesday";
$week[]="wednesday";
$week[]="thursday";
$week[]="friday";
$week[]="saturday";
$week[]="sunday";

for ($i=0; $i<=6 ; $i++)
{
	echo $week[$i]."<br>";
}

$week2= array('Monday', 'Tuesday');


for ($i=0; $i<=1 ; $i++)
{
	
	echo $week2[$i]."<br>";
}

foreach ($week as $value ) 
{
	echo $value."<br>"; 
}

$aaa = array('罐頭','洋芋片','泡麵' );
sort($aaa);
print_r($aaa);
echo "<br>";

for ($i=2; $i<=9; $i++)
{ 
	for ($b=1; $b<=9;$b++) 
	{ 
		$nine [$i][$b]=$i*$b;
	}
}

foreach ($nine as $key => $key2 ) 
{
	foreach ($key2 as $key3 => $key4 ) 
	{
		echo $key."*".$key3."=".$key4."<BR>";
	}

}

//第六章 實作3 + 實作4
for ($i=1; $i<=42;$i++) 
{ 
	$lucky[]=$i;
}
	$lucky2=array_rand($lucky,6);
	sort($lucky2);
	foreach ($lucky2 as $num) 
	{
			echo $num." ";
	}
echo "<br>";

//第六章 實作3
$lucky3=range(1, 42,1);
shuffle($lucky3);
$luckynum = array_slice($lucky3, 0,6);
sort($luckynum);
foreach ($luckynum as $end) 
{
		echo $end ." ";
}




?>

