<?

function a0912()
{
	echo "你好<br>";
}
a0912();

function a09121($name)
{
	echo "你好".$name."先生<br>";
}
a09121(王大頭);

function a09122()
{
	$i = func_num_args();
	if ($i==0)
	{
		echo "沒有輸入文字<br>";
	}
	else
	{
		$a = func_get_args();
		echo "輸入的文字為".$a."<Br>";
	}
}

a09122();
a09122("測試123");


function a09123($num)
{
	if ($num==0)
	{
		return 1;
	}
	else
	{
		return $num*a09123($num-1);
	}
}

echo "輸入0時".a09123(0)."<Br>";
echo "輸入5時".a09123(5)."<Br>";

$b=rand(1,10);
echo $b."<Br>";


$circle = 5;

function a09124($num)
{
	$num2 = $num/2;
	$result = $num2 *$num2 *pi();
	return round($result ,2);
}
echo "直徑".$circle."m的圓形面積為：".a09124($circle);

?>