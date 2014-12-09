
<html>
	<head>
<?php
include "twitteroauth.php";
require_once('DatumboxAPI.php');
session_start();
$api_key='ba28ee0ae71432fe85206c36d0e6a641';
$consumer = "5blMAfvgOmZBZyfM2usfcX97c";
$counsumerSecret = "oYVA9roicxA0nVSX7kXujVnb0Eyn0EFpqy4cSpQ5ZpUyzxeaHQ";
$accessToken = "2319828684-dXOy6CW1Mf7nsm32YMbH9qcwMLP8NtetGTxTAbC";
$accessTokenSecret = "mp4svtYl7DQAWQmGCBAppHO5aBr8HVmB04T6xU4c7GK8E";

$twitter = new TwitterOAuth($consumer, $counsumerSecret, $accessToken, $accessTokenSecret);

?>
	<title>Twitter Analysis</title>
	<meta name = "viewport" content = "width= device-width, initial-scale=1.0">
	<link href  = "../css/bootstrap.min.css" rel = "stylesheet">
	<link href  = "../css/styles.css" rel = "stylesheet">
	</head>
	<body>
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">

					<a href = "../index.html" class = "navbar-brand" class = "active">
					<img class = "navbar-brand" class = "active" style="padding: 0.5em;width: 5em; height: 3.8em; float: left; margin-top: -1.25em" src="../logo.jpg">
				</a>
				
				<a href = "../team.html" class = "navbar-brand" class = "active">Team Presentation</a>
				<a href = "index.html" class = "navbar-brand" class = "active">Project</a>
				<a href = "../projectRequirement.html" class = "navbar-brand" class = "active">Project Requirements & Scope</a>
				<a href = "../research.html" class = "navbar-brand" class = "active">Research</a>
				<a href = "../prototypes.html" class = "navbar-brand" class = "active">Prototypes</a>
				<a href = "../ui.html" class = "navbar-brand" class = "active">UI</a>
				<a href = "../archive.html" class = "navbar-brand" class = "active">Archive</a>
				<a href = "../testing.html" class = "navbar-brand" class = "active">Testing</a>
				<a href = "../plans.html" class = "navbar-brand" class = "active">Plans</a>

			</div>
			
		</div>



			<div class = "container">
				<div class = "row">
					<div class = "col-md-3">
						<a href="bad.php" class = "btn btn-danger btn-block">Bad</a>
					</div>
					<div class = "col-md-3">
						<a href="success.php" class = "btn btn-success btn-block">Good</a>
					</div>
					<div class = "col-md-3">
						<a href="warning.php" class = "btn btn-warning btn-block">Neutral</a>
					</div>
					<div class = "col-md-3">
						<a href="all.php" class = "btn btn-default btn-block">All</a>
					</div>
				</div>
			</div>

			<br>

			<center>
				<div class = "container">
					<div class = "row">
						<div class = "col-md-12">
						<table class ="table">
						<tbody>
					<?php 
					$tweets = $twitter -> get("https://api.twitter.com/1.1/search/tweets.json?q=%40VirginTrains%20OR%20%40LondonMidland%20OR%20%40GNRailUK%20OR%20%40greateranglia%20OR%20%40c2c_Rail%20OR%20%40EMTrains%20OR%20%40chilternrailway%20OR%20%40FGW%20OR%20%40SW_Trains%20OR%20%40TLRailUK%20OR%20%40SouthernRailUK%20OR%20%40Se_Railway&result_type=recent&count=30");
					//print_r($tweets);
					$DatumboxAPI = new DatumboxAPI($api_key);
					$array = array("text" => array(), "sentiment" => array());
					$count = 0;
					$GLOBALS['contains'] = array();
					function isIn($x, $y)
					{
						if (empty($contains))
							return 0;
						for($counter = 0; $counter < $y; $counter++)
						{
							if ($contains[$counter] == $x)
								return 1;
						}
						return 0;
					}
					
					
					foreach($tweets as $tweet)
					{
						foreach ($tweet as $t)
						{
							if (isset($t->text))
							{
								
								if ( !isIn( (string)$t->text, $count))
								{
									$sentiment=$DatumboxAPI->SentimentAnalysis($t->text);
									if ((string)$sentiment == "positive")
									{
										echo "<tr class = \"success\">
    									<center><td>$t->text</td></center>
  										</tr>";
					  					$array["text"][$count] = (string) $t->text;
										$array["sentiment"][$count] = (string) $sentiment;
										$contains[$count] = (string)$t->text;
										$count++;
									}
									else if((string)$sentiment == "negative")
									{
										echo "<tr class = \"danger\">
    									<center><td>$t->text</td></center>
  										</tr>";
					  					$array["text"][$count] = (string) $t->text;
										$array["sentiment"][$count] = (string) $sentiment;
										$contains[$count] = (string)$t->text;
										$count++;
									}
									else if((string)$sentiment == "neutral")
									{
										echo "<tr class = \"warning\">
    									<center><td>$t->text</td></center>
  										</tr>";
					  					$array["text"][$count] = (string) $t->text;
										$array["sentiment"][$count] = (string) $sentiment;
										$contains[$count] = (string)$t->text;
										$count++;
									}
									else
									{
										echo "<tr class = \"warning\">
    									<center><td>$t->text</td></center>
  										</tr>";
					  					$array["text"][$count] = (string) $t->text;
										$array["sentiment"][$count] = "neutral";
										$contains[$count] = (string)$t->text;
										$count++;
									}
									
								}

							}
				
						}

				
					}
					
					$_SESSION["passed_array"] = $array;
					echo "<p>Tweets Ready</p>";
					?>
		</tbody>
		</table>




						</div>
					</div>
				</div>
			</center>
		
			
			

		</div>
		<div class = "navbar navbar-inverse navbar-fixed-bottom" style = "margin-top:5em;">
			<div class = "container">
				<p class = "navbar-text pull-left">2014 Developed by ATOS-4 Proud Team<br>All Rights Reserved</p>
			</div>
		</div>


		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="../js/bootstrap.js"></script>
	</body>
</html>
