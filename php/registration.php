<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
		<style>
		
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
		}
		body {font-family: Arial, Helvetica, sans-serif;}
		* {box-sizing: border-box;}
		
		textarea {
			resize: none;
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
		/* Style the input container */
		.input-container {
		display: flex;
		width: 100%;
		margin-bottom: 15px;
		}

		/* Style the form icons */
		.icon {
		padding: 10px;
		background: #1E90FF;
		color: white;
		min-width: 50px;
		text-align: center;
		}

		/* Style the input fields */
		.input-field {
		width: 100%;
		padding: 10px;
		outline: none;
		}

		.input-field:focus {
		border: 2px solid #1E90FF;
		}

		/* Set a style for the submit button */
		.btn {
		background-color: #1E90FF;
		color: white;
		padding: 10px 20px;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
		}

		.btn:hover {
		opacity: 1;
		}
		</style>
		
		<title>Registration</title>
	</head>
	
	<body>

		<br>
		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a class="active" href="registration.php">Registration</a></li>
			<!-- <li><a href="read tag.php">Scan Card</a></li> -->
			<li><a href="live_chart.php">Live Data</a></li>
			<input type="text" placeholder="Search">
		</ul>
		<h2 align="center">Vending Machine User Registration</h2>

		<div class="container">
			<br>
			<div style="margin: auto; max-width:500px; border-style: solid; border-color: #1E90FF">
				<div class="row">
					<h3 align="center">Registration Form</h3>
				</div>
				<br>
				<form action="insertDB.php" style="max-width:400px; margin:auto" method="post" >
					<div class="input-container">
						<i class="fa fa-id-badge icon"></i>
						<input class="input-field" type="text" placeholder="Card ID No" name="id" required>
					</div>

					<div class="input-container">
						<i class="fa fa-user icon"></i>
						<input class="input-field" type="text" placeholder="Full Name" name="name" required>
					</div>

					<div class="input-container">
						<i class="fa fa-id-card icon"></i>
						<input class="input-field" type="text" placeholder="NID / Birth Certificate No" name="nid" required>
					</div>

					
					<div class="input-container">

							<i class="fa fa-venus-mars icon"></i>
							<select name="gender" >
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Female">Other</option>
							</select>
					</div>
					
					<div class="input-container">
					<i class="fa fa-calculator icon"></i>
					<input class="input-field" type="text" placeholder="No of Family Member" name="member" required>
					</div>
					
					<div class="input-container">
						<i class="fa fa-address-book icon"></i>
						<input class="input-field" type="text" placeholder="Address" name="address" required>
					</div>
					
					
					<button type="submit" class="btn">Register</button>
                
				</form>
				<br>
			</div>               
		</div> <!-- /container -->	
	</body>
</html>
