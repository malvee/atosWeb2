<html>
<?php
	$db = new mysqli("localhost", "root", "", "phplogin");
	$result = $db->query("SELECT * FROM users WHERE username = 'malvee'");
	$ans = $result->fetch_all(MYSQLI_ASSOC);
	$_GLOBALS["dbArray"] = preg_split('/\s+/', trim($ans[0]["query"]));
	if(!isset($_POST["array"]) || !isset($_POST["sentText"]) )
	{
		echo "<form action = test4.php method = 'POST'>";
		foreach($_GLOBALS["dbArray"] as $x)
		{
			echo "<input type = 'checkbox' name = 'array[]' value = '$x' checked> $x ";
		}
		echo "<br>";
		echo "<input type = 'text' name = 'sentText'>";
		echo "<input type = 'submit'>"; 
		echo "</form>";

	}
	else if ( isset($_POST["array"]))
	{
		$_GLOBALS["dbArray"] = array();
		foreach($_POST["array"] as $x)
		{
			array_push($_GLOBALS["dbArray"], $x);
		}
		$string = "";
		foreach($_GLOBALS["dbArray"] as $x)
		{
			$string .= (" ".$x);
		}
		$string = trim($string);
		$db -> query("UPDATE users SET query= '$string'  WHERE username='malvee'");
		$string = "";


		if ( isset($_POST["sentText"])  && (preg_replace('/\s+/', '', $_POST["sentText"]) !== "") )
		{
			echo "here";	
			$sentTextArray = preg_split('/\s+/', trim($_POST["sentText"]));
			foreach ($sentTextArray as $x)
			{
				$count = 0;
				foreach ($_GLOBALS["dbArray"] as $y)
				{
					if (!(strtolower($x) == strtolower($y)))
						$count++;
					else
						break;
				}
				if ($count == count($_GLOBALS["dbArray"]))
					array_push($_GLOBALS["dbArray"], $x);

			}
			$string = "";
			foreach($_GLOBALS["dbArray"] as $x)
			{
				$string .= (" ".$x);
			}
			$string = trim($string);
			$db -> query("UPDATE users SET query= '$string'  WHERE username='malvee'");
			$string = "";

			
		}
		echo "<form action = test4.php method = 'POST'>";
		foreach($_GLOBALS["dbArray"] as $x)
		{
			echo "<input type = 'checkbox' name = 'array[]' value = '$x' checked> $x ";
		}
		echo "<br>";
		echo "<input type = 'text' name = 'sentText'>";
		echo "<input type = 'submit'>"; 
		echo "</form>";
	 }
	 
	
	


?>
</html>