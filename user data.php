<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
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
		
		.table {
			margin: auto;
			width: 100%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
		<title>User Database</title>
	</head>
	
	<body>
		<br>
		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a class="active" href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<!-- <li><a href="read tag.php">Scan Card</a></li> -->
			<li><a href="live_chart.php">Live Data</a></li>
			<input type="text" placeholder="Search">
		</ul>
		<h2>User Information</h2>
		<div class="container">
            
            <div class="row">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr bgcolor="#1E90FF" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>NID</th>
					  <th>Gender</th>
                      <th>Family Member</th>
					  <th>Address</th>
					  <th>Date</th>
					  <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM info ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
							echo '<td>'. $row['id'] . '</td>';
							echo '<td>'. $row['nid'] . '</td>';
                            echo '<td>'. $row['gender'] . '</td>';
							echo '<td>'. $row['member'] . '</td>';
							echo '<td>'. $row['address'] . '</td>';
							echo '<td>'. $row['date'] . '</td>';
							echo '<td>'. $row['collect'] . '</td>';
							echo '<td><a class="btn btn-success" href="user data edit page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="user data delete page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
				<br>
			</div>
		</div> <!-- /container -->
	</body>
</html>
