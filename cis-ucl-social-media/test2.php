<html>
<?php 
$db = new mysqli("localhost", "root", "", "phplogin");

$db -> query("UPDATE users SET query= 'hello this is world here'  WHERE username='malvee'");
?>
<body>
	
</body>
</html>