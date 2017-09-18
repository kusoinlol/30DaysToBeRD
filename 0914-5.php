
<?
	if ($_GET[name]=="abc" && $_GET[password]=="123") 
	{
		echo "<font color=\"red\">歡迎光臨</font><p>";
	}
	else if ($_GET[name]!="" && $_GET[password]!="") 
    {
		header("Location:0914-6.php");
	}

?>

<form action="0914-5.php" method="get">
	正確帳號：abc 正確密碼：123 <br>
	帳號 <input type="text" name="name" value="<? echo $_COOKIE[username] ?>" ><br>
	密碼 <input type="password" name="password" value="<? echo $_COOKIE[userpassword] ?>"><br>
	<input type="submit" name="button" value="登入">
</form>




<pre style="font-family: Andale Mono, Lucida Console, Monaco, fixed, monospace; color: #000000; background-color: #eee;font-size: 12px;border: 1px dashed #999999;line-height: 14px;padding: 5px; overflow: auto; width: 100%"><code><br/>&lt;?<br/>&#9;if&nbsp;(</span>$_GET[name]=="abc"&nbsp;&amp;&amp;&nbsp;$_GET[password]=="123")</span>&nbsp;<br/>&#9;{<br/>&#9;&#9;echo&nbsp;"&lt;font&nbsp;color=\"red\"&gt;歡迎光臨&lt;/font&gt;&lt;p&gt;";<br/>&#9;}<br/>&#9;else&nbsp;if&nbsp;(</span>$_GET[name]!=""&nbsp;&amp;&amp;&nbsp;$_GET[password]!="")</span>&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&#9;&#9;header(</span>"Location:0914-6.php")</span>;<br/>&#9;}<br/><br/>?&gt;<br/><br/>&lt;form&nbsp;action="0914-5.php"&nbsp;method="get"&gt;<br/>&#9;正確帳號：abc&nbsp;正確密碼：123&nbsp;&lt;br&gt;<br/>&#9;帳號&nbsp;&lt;input&nbsp;type="text"&nbsp;name="name"&nbsp;value="&lt;?&nbsp;echo&nbsp;$_COOKIE[username]&nbsp;?&gt;"&nbsp;&gt;&lt;br&gt;<br/>&#9;密碼&nbsp;&lt;input&nbsp;type="password"&nbsp;name="password"&nbsp;value="&lt;?&nbsp;echo&nbsp;$_COOKIE[userpassword]&nbsp;?&gt;"&gt;&lt;br&gt;<br/>&#9;&lt;input&nbsp;type="submit"&nbsp;name="button"&nbsp;value="登入"&gt;<br/>&lt;/form&gt;<br/><br/><br/></code></pre>

