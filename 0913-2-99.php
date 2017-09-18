<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>九九乘法表</title>
</head>
<body>

<table width="800" border="1">

	<?
		for ($i=1; $i<=9 ; $i++) 
		{ 
			echo "<TR>";
			
				for($b=1; $b<=9; $b++)
				{	
					if($i%2==0)
					  	echo "<TD bgcolor='yellow'>" .$i."*".$b."=" .$i*$b;
					  else
					  	echo "<TD>" .$i."*".$b."=" .$i*$b;
				}
			
			
		}

	?>
</table>

<pre>
<hr>
&lt;table width=&quot;800&quot; border=&quot;1&quot;&gt;

	&lt;?
		for ($i=1; $i&lt;=9 ; $i++) 
		{ 
			echo &quot;&lt;TR&gt;&quot;;
			
				for($b=1; $b&lt;=9; $b++)
				{	
					if($i%2==0)
					  	echo &quot;&lt;TD bgcolor='yellow'&gt;&quot; .$i.&quot;*&quot;.$b.&quot;=&quot; .$i*$b;
					  else
					  	echo &quot;&lt;TD&gt;&quot; .$i.&quot;*&quot;.$b.&quot;=&quot; .$i*$b;
				}
			
			
		}

	?&gt;
&lt;/table&gt;


</pre>


</body>
</html>