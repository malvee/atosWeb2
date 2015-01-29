<html>
<body>
<?php
function addhref($x)
{
	return "<a href=\"" . $x . " \"> " . $x . "</a>" ;
}
function isLink($x)    // gets a string and prints out the links within it
{
	$words = explode(" ", $x);
	$counts = 0;
	foreach ($words as $word) 
	{
		if(strncmp("http://", $word, 7) == 0)
		{
			$replacement = array ($counts => addhref($word));
			array_replace($words, $replacement);
		}
		$counts++;
	}
	return implode(" ", $words);
}
 echo isLink("http://youtube.com");
?>
</body>
</html>