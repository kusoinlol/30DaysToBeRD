<?

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	setcookie("fname", $_POST['fname'], time()+3600);
} else {
	echo $_COOKIE['fname'];
}

?>
<form action="0914.php" method="post">
  <p>First name: <input type="text" name="fname" /></p>
  <p>Last name: <input type="text" name="lname" /></p>
  <input type="submit" value="Submit" />
</form>