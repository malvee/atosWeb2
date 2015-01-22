<html>
<?php
ini_set('max_execution_time', 300);
include "twitteroauth.php";
	include "DatumboxAPI.php";
	$api_key='ba28ee0ae71432fe85206c36d0e6a641';
			$consumer = "5blMAfvgOmZBZyfM2usfcX97c";
			$counsumerSecret = "oYVA9roicxA0nVSX7kXujVnb0Eyn0EFpqy4cSpQ5ZpUyzxeaHQ";
			$accessToken = "2319828684-dXOy6CW1Mf7nsm32YMbH9qcwMLP8NtetGTxTAbC";
			$accessTokenSecret = "mp4svtYl7DQAWQmGCBAppHO5aBr8HVmB04T6xU4c7GK8E";
			$twitter = new TwitterOAuth($consumer, $counsumerSecret, $accessToken, $accessTokenSecret);
			$tweets = $twitter -> get("https://api.twitter.com/1.1/search/tweets.json?q=%40VirginTrains%20OR%20%40LondonMidland%20OR%20%40GNRailUK%20OR%20%40greateranglia%20OR%20%40c2c_Rail%20OR%20%40EMTrains%20OR%20%40chilternrailway%20OR%20%40FGW%20OR%20%40SW_Trains%20OR%20%40TLRailUK%20OR%20%40SouthernRailUK%20OR%20%40Se_Railway&result_type=recent&count=30");
			$DatumboxAPI = new DatumboxAPI($api_key);
			foreach($tweets as $tweet)
					{
						foreach ($tweet as $t)
						{
							if (isset($t->text))
							{
								
								
									$text =  preg_replace("/(?![:\)\()])\p{P}/u", "", $t->text);
									$sentiment=$DatumboxAPI->SentimentAnalysis($text);
									if ((string)$sentiment == "positive")
									{
										echo $t->text." "."positive";
  										
									}
									else if((string)$sentiment == "negative")
									{
										echo $t->text." "."negative";
									}
									else if((string)$sentiment == "neutral")
									{
										echo $t->text." "."neutral";
									}
									else
									{
										echo $t->text." "."no value returned";
									}
									
								

							}
				
						}

				
					}

?>
</html>