<html>
<?php
	$db_host = 'mysql10.000webhost.com';
	$db_username = 'a1634584_momshad';
	$db_pass = 'Lva44af?';
	$db_name = 'a1634584_lookup';	 
	@mysql_connect("$db_host", "$db_username", "$db_pass") or die (mysql_error());
	@mysql_select_db("$db_name") or die ("No database");
	$result = mysql_query("SELECT * FROM customer");
		$ans = mysql_fetch_assoc($result);
		echo $ans["Name"][0];

?>
</html>