
<html>
	<head>
<?php
session_start();
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
				<a href = "index.php" class = "navbar-brand" class = "active">Project</a>
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
						<a href="#" class = "btn btn-default btn-block">All</a>
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
					$count = 0;
					$array = $_SESSION["passed_array"];
					foreach( $array["sentiment"] as $temp)
					{
						if ($temp == "negative")
						{

						echo "<tr class = \"danger\">
    									<center><td>".(string)$array['text'][$count]."</td></center>
  										</tr>";
						}
						else if ($temp == "positive")
						{

						echo "<tr class = \"success\">
    									<center><td>".(string)$array['text'][$count]."</td></center>
  										</tr>";
						}
						else
						{
							echo "<tr class = \"warning\">
    									<center><td>".(string)$array['text'][$count]."</td></center>
  										</tr>";
						}

						$count++;
					}
					
					?>
		</tbody>
		</table>




						</div>
					</div>
				</div>
			</center>
		
			
			

		</div>
		<div class = "navbar navbar-inverse navbar-fixed-bottom">
			<div class = "container">
				<p class = "navbar-text pull-left">2014 Developed by ATOS-4 Proud Team<br>All Rights Reserved</p>
			</div>
		</div>


		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="../js/bootstrap.js"></script>
	</body>
</html>
