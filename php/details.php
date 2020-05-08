<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> User Information | PS </title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" >
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Didact+Gothic"/>

    <!-- Css Styles -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/flaticon.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../css/barfiller.css">
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/fonts.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/cssTable/util.css">
	<link rel="stylesheet" type="text/css" href="../css/csstable/main.css">  
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="http://localhost/covid19/php/index.php">
                            <img src="../template/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <?php if (isset($_SESSION['logged']) && $_SESSION['username'] == "admin") { ?>
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li class="active"><a href="#">Relief Card</a>
                                    <ul class="dropdown">
                                        <li><a href="./registration.php">New Registration</a></li>
                                        <li><a href="./user_data.php">User Information</a></li>
                                    </ul>
                                </li>
                                <li><a href="./live_relief.php">Relief Distribution Data</a></li>
                                <li><a href="./live_covid19.php">Covid19 Update</a></li>
                                <li><a href="./logout.php">Log Out</a></li>
                            </ul>
							
                        <?php } else { ?> 
							<ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./live_relief.php">Relief Distribution Data</a></li>
                                <li><a href="./live_covid19.php">Covid19 Update</a></li>
                                <li><a href="./login.php">Admin Log In</a></li>
                            </ul>
						<?php } ?> 
                        
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-search search-switch">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="to-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="../image/card9.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Relief Card User Info</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Table Section Begin -->
    	<div id="wrapper">
            <div id="three-column" class="container">
				<div class="title">
					<h2>Relief Card User Info</h2>
					
				</div>
        
				<div class="table100 ver5 m-b-110">
					<table data-vertable="ver5">
						<thead>
							<tr class="row100 head" >
								<th class="column100 column1" data-column="column1">Name</th>
								<th class="column100 column1" data-column="column2">Card No.</th>

								<th class="column100 column1" data-column="column3">NID/Birth Cert</th>
								<th class="column100 column1" data-column="column3">Gender</th>

								<th class="column100 column1" data-column="column1">Family Size</th>

								<th class="column100 column1" data-column="column2">Upazilla</th>

                                <th class="column100 column1" data-column="column2">District</th>

								<th class="column100 column1" data-column="column3">Card Registration Date</th>

								<th class="column100 column1" data-column="column3">Received Relief Package</th>
							</tr>
						</thead>
						<tbody>
							<?php
                               include 'database.php';
                               $pdo = Database::connect();
                               $sql = 'SELECT * FROM card_user_info ORDER BY name ASC';
                               foreach ($pdo->query($sql) as $row) {
										echo '<tr class="row100">';
										echo '<td class="column100 column1" data-column="column1">' . $row['name'] . "</td>";
										echo '<td class="column100 column1" data-column="column2">' . $row['id'] . "</td>";
										echo '<td class="column100 column1" data-column="column3">' . $row['nid'] . "</td>";
										echo '<td class="column100 column1" data-column="column3">' . $row['gender'] . "</td>";
										echo '<td class="column100 column1" data-column="column3">' . $row['family_size'] . "</td>";
                                        echo '<td class="column100 column1" data-column="column3">' . $row['upazilla'] . "</td>";
                                        echo '<td class="column100 column1" data-column="column3">' . $row['district'] . "</td>";
										echo '<td class="column100 column1" data-column="column3">' . $row['registration_date'] . "</td>";
										echo '<td class="column100 column1" data-column="column3">' . $row['relief_collected'] . "</td>";
										echo "</tr>";
									}
                                Database::disconnect();
                              ?>
						</tbody>
					</table>
				</div>	
			</div>	
        </div>
     <!-- Table Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/masonry.pkgd.min.js"></script>
    <script src="../js/jquery.barfiller.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>

</body>
</html>