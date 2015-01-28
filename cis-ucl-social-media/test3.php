	<html>
<?php
if(isset($_POST["username"]))
{
	if(!empty ( preg_replace('/\s+/', '', $_POST["username"]) ))
		echo "set";
	else 
		echo "not ";
}
	
?>

<form action = "test3.php" method = "POST">
	<input type = "input" name = "username" > <br>
	<input type = "submit">
</form>
</html>