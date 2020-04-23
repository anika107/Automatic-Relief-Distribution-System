<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin: auto;
			padding: 0;
			overflow: hidden;
			background-color: #1abc9c;
			width: 100%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #333;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		.topnav input[type=text] {
		float: right;
		padding: 5px;
		margin-top: 7px;
		margin-right: 16px;
		border: none;
		font-size: 17px;
		}

		
		</style>
		
		<title>Home</title>
	</head>
	
	<body>
		<br>
		<ul class="topnav">
			<li><a class="active" href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<!-- <li><a href="read tag.php">Scan Card</a></li> -->
			<li><a href="live_chart.php">Live Data</a></li>
			<input type="text" placeholder="Search">
		</ul>
		
		<h2 align="center">Vending Machine User Home Page</h2>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
			<img src="slide1.jpg" alt="Covid-19"  style="width:100%;">
			<div class="carousel-caption text-dark">
			<h3>CORONAVIRUS COVID-19</h3>
			<p>Stay Home & Stay Safe</p>
			</div>

			</div>

			<div class="item">
			<img src="slide2.jpg" alt="DNA"  style="width:100%;">
			<div class="carousel-caption">
			<h3>CORONAVIRUS COVID-19</h3>
			<p>Stay Home & Stay Safe</p>
			</div>

			</div>

			<div class="item">
			<img src="slide3.PNG" alt="Corona"  style="width:100%;">
			<div class="carousel-caption">
			<h3>CORONAVIRUS COVID-19</h3>
			<p>Stay Home & Stay Safe</p>
			</div>

			</div>
		</div>

  <!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
		</div>
		<h3>Vending Machine's World</h3>
		<br>
	</body>
</html>
