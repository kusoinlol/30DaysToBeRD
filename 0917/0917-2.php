<?



echo "cookie test =".$_COOKIE["test"]."<br>";
echo "cookie answer1 =".$_COOKIE["answer1"]."<br>";




?>
<!DOCTYPE html>
<html>
<head>
	<title>心理測驗</title>
</head>
<body>
	<form action="0917-2.php" method="get">
	<?
	if ($_COOKIE["test"]=="")
	{
		echo "心理測驗<p><a href=\"0917-2.php&test=1\">開始測驗</a>";
		setcookie("test","1");
	}
	
	else
	
	{
		if ($_COOKIE[test1]=="") 
		{
			echo "第一個問題<p>";	
			echo "<input type=\"radio\" name=\"test1\" value=\"1\">選項一<br>" ;
			echo "<input type=\"radio\" name=\"test1\" value=\"2\">選項二<br>" ;
			echo "<input type=\"radio\" name=\"test1\" value=\"3\">選項三<br>" ;
			echo "<input type=\"submit\" name=\"button1\" value=\"下一步\">" ;
			setcookie("answer1",$_GET[test1]);
		
		}
		elseif ($_COOKIE[test1]!="" && $_COOKIE[test2]="")
		{
			echo "第二個問題<p>";	
			echo "<input type=\"radio\" name=\"test2\" value=\"1\">選項一<br>" ;
			echo "<input type=\"radio\" name=\"test2\" value=\"2\">選項二<br>" ;
			echo "<input type=\"radio\" name=\"test2\" value=\"3\">選項三<br>" ;
			echo "<input type=\"submit\" name=\"button2\" value=\"下一步\">" ;
			setcookie("answer2",$_GET[test2]);

		}
		elseif ($_COOKIE[test1]!="" && $_COOKIE[test2]!="") 
		{
			echo "最終結果<p>";
			echo "第一題選擇".$_COOKIE[test1]."<br>"."第二題選擇".$_COOKIE[test2]."<br>";	
			echo "<input type=\"submit\" name=\"button3\" value=\"重新玩\">" ;
			//header(string)
		}

	

	}


	?>
	</form>

</body>
</html>