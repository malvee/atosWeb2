<html>
<?php
if(isset($_POST["array"]))
{
	print_r($_POST["array"]);
}

?>

<form method = "POST" action = "test5.php">
<input type = 'checkbox' name = 'array[]' value = "aa" checked> a <br>
<input type = 'checkbox' name = 'array[]' value = "bb" checked> b <br>
<input type = 'submit'> 
</form>

</html>