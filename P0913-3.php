<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>月曆</title>
</head>
<body>
<table border="1">
	<tr>
	<TD colspan=7><center>月曆</center></TD>
	</tr>
	<tr>
	<TD>MON</TD>
	<TD>TUE</TD>
	<TD>WED</TD>
	<TD>THU</TD>
	<TD>FRI</TD>
	<TD>SAT</TD>
	<TD>SUN</TD>
	</tr>
	<?
		for($i=1;$i<=31;$i++)
		{

			if ($i%7==1)
				echo "<TR>";

			echo "<TD>".$i;

		}
	?>

</table>

<P>


<table border="1">
	<tr>
	<TD colspan=7><center>月曆</center></TD>
	</tr>
	<tr>
	<TD>MON</TD>
	<TD>TUE</TD>
	<TD>WED</TD>
	<TD>THU</TD>
	<TD>FRI</TD>
	<TD>SAT</TD>
	<TD>SUN</TD>
	</tr>
	<?
		for($i=1;$i<=31;$i++)
		{

			if ($i%7==1)
				echo "<TR>";

			if ($i%7==1||$i%7==0)
			{
				echo "<TD bgcolor='orange'>".$i;
			}
			else
			{
				echo "<TD>".$i;
			}

		}
	?>

</table>


</body>
</html>

