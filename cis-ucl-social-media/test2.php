<html>
 




<body>
<?php
	include "twitteroauth.php";
	$api_key='ba28ee0ae71432fe85206c36d0e6a641';
			$consumer = "5blMAfvgOmZBZyfM2usfcX97c";
			$counsumerSecret = "oYVA9roicxA0nVSX7kXujVnb0Eyn0EFpqy4cSpQ5ZpUyzxeaHQ";
			$accessToken = "2319828684-dXOy6CW1Mf7nsm32YMbH9qcwMLP8NtetGTxTAbC";
			$accessTokenSecret = "mp4svtYl7DQAWQmGCBAppHO5aBr8HVmB04T6xU4c7GK8E";
			$twitter = new TwitterOAuth($consumer, $counsumerSecret, $accessToken, $accessTokenSecret);
			$twitterQueryString = "https://api.twitter.com/1.1/search/tweets.json?q="."%40hello"."&result_type=recent&count=30";
			$tweets = $twitter -> get($twitterQueryString);
			foreach($tweets as $tweet)
					{
						foreach ($tweet as $t)
						{
							$a = (string) $t->user->created_at;
							echo $a;
							$a = (string) $t->user->profile_image_url;
							echo $a;
							
							echo "<br>";
							// echo "<tr class = \"success\">
    			// 						<center><td><img src = '$t->user->profile_image_url'></td></center>
							// 			<center><td>$t->created_at</td></center>
    			// 						<center><td>$t->text</td></center>
  					// 					</tr>";

						}
					}

?>
</body>
</html>