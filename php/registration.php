<?php session_start(); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> User Registration | PS </title>

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
                                <li><a href="#">Relief Card</a>
                                    <ul class="dropdown">
                                        <li class="active"><a href="./registration.php">New Registration</a></li>
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
                        <h2>Vending Machine User Registration</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    <!-- Table -->
    	<div id="wrapper">
            <div id="three-column" class="container">
				<div class="title">
					<p style="font-size: 24px;color: #757575; padding-top: 20px;">Please input correct data in the fields.</p>
				</div>		
            </div>	
            <div style="margin: auto; max-width:500px; border-style: solid; border-color: #1E90FF">
                <div class="row">
                    <h3 align="center" style="padding-left: 160px;">Registration Form</h3>
                </div>
                <br>
                <form action="insertDB.php" style="max-width:400px; margin:auto" method="post" >
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
                        <input class="input-field" type="text" placeholder="Upazilla" name="upazilla" required>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-address-book icon"></i>
                        <input class="input-field" type="text" placeholder="District" name="district" required>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-address-book icon"></i>
                        <input class="input-field" type="text" placeholder="Division" name="division" required>
                    </div>
                    <button type="submit" class="btn">Register</button>
                </form>
                <br>
            </div> 
        </div>
     
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