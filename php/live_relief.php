<?php
session_start(); 
$connect = mysqli_connect("localhost","root","","rfid");
$query = "SELECT count(B) as People, division, sum(A * B) as Total FROM (SELECT `family_size` AS A, `relief_collected` AS B, division FROM `card_user_info`) AS T GROUP by division";
    
    
$result = mysqli_query($connect , $query);

$resultCount=$result->num_rows;

$color = ['#ff7878','#9ee2d9','#9f9ee2','#e29eba','#fc037b','#fc0303','#fc7b03','#a5fc03','#03fc52','#03fceb','#32a8a2','#8c32a8','#a8326b'];
$country = array();
$people = array();
foreach ($result as $peopleData) {
    $country[] = $peopleData['division'];
    $people[] = $peopleData['People'];
}
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Relief Distribution Data (Live) | PS </title>

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
    <style>
        #chart_container{
            position: relative;
            padding-bottom: 50px;
            height: 0 ;
        }

        .chart-div{
            margin-bottom: 20px;
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
                        <a href="./index.html">
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
                                        <li><a href="./registration.php">New Registration</a></li>
                                        <li><a href="./user_data.php">User Information</a></li>
                                    </ul>
                                </li>
                                <li class="active"><a href="./live_relief.php">Relief Distribution Data</a></li>
                                <li><a href="./live_covid19.php">Covid19 Update</a></li>
                                <li><a href="./logout.php">Log Out</a></li>
                            </ul>
							
                        <?php } else { ?> 
							<ul>
                                <li><a href="./index.php">Home</a></li>
                                <li class="active"><a href="./live_relief.php">Relief Distribution Data</a></li>
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
    <section class="breadcrumb-section set-bg" data-setbg="../image/relief7.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Live Updates of Relief Distribution</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->  
      
    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <h3 style = "color:black;">Division Wise Live Data</h3>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Division</th>
                                    <th>Relief Packages</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                   include 'database.php';
                                   $pdo = Database::connect();
                                   $sql = 'SELECT sum(A * B) AS relief_collected, division FROM 
                                            (SELECT `family_size` AS A, `relief_collected` AS B, division FROM `card_user_info`) AS T group by division order by division ASC';
                                
                                   foreach ($pdo->query($sql) as $row) {
                                        echo '<tr>';
                                        echo '<td class="point">' . $row['division'] . "</td>";
                                        echo '<td class="point" style="text-align:center;padding: 7px 0 7px 0px;">' . $row['relief_collected'] . "</td>";
                                        echo '</tr>';
                                    }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
<!--                        <span>check your body</span>-->
                        <h3 style = "color:black;">Distributed Food Per Division (%)</h3>
                    </div>
                    <div class="chart-calculate-form">
<!--                        <p style = "color:black;">Distributed Food Per District (%)</p>-->
                         <div id="chart_container" class="centre">
                            <div id="pie-chart" class="chart-div"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
    <!-- BMI Calculator Section End -->

    <!-- Table -->
    	<div id="wrapper">
            <div id="three-column" class="container">
				<div class="title">
					<h2>Complete Distribution Live Data</h2>
					<p style="font-size: 24px;color: #757575; padding-top: 20px;">All information about Upazilla, District and Division level distribution can be found here.</p>
				</div>
        
				<div class="container">
                    <div class="row">
                        <div class="chart-table">
                            <table>
                                <thead>
                                    <tr>
                                    <th class="column100 column1" data-column="column1">Division</th>
                                    <th class="column100 column1" data-column="column2">District</th>
                                    <th class="column100 column1" data-column="column3">Upazilla</th>
                                    <th class="column100 column1" data-column="column4">Distributed Relief Package</th>
                                    <th class="column100 column1" data-column="column5">Families Receiving Relief</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                       $sql = 'SELECT sum(A * B) AS relief, count(upazilla) as fam, upazilla, district, division FROM (SELECT `family_size` AS A, `relief_collected` AS B, upazilla, district, division FROM `card_user_info`) AS T group by upazilla order by division ASC';

                                           foreach ($pdo->query($sql) as $row) {
                                                echo '<tr>';
                                                echo '<td class="point">' . $row['division'] . "</td>";
                                                echo '<td class="point">' . $row['district'] . "</td>";
                                                echo '<td class="point">' . $row['upazilla'] . "</td>";
                                                echo '<td class="point" style="text-align:center;padding: 7px 0 7px 0px;">' . $row['relief'] . "</td>";
                                                echo '<td class="point" style="text-align:center;padding: 7px 0 7px 0px;">' . $row['fam'] . "</td>";
                                                echo '</tr>';
                                            }
                                        Database::disconnect();
                                      ?>
                                    </tbody>
                                </table>
			                 </div>
                            </div>	
                        </div>	
                    </div>
                </div>
     <!-- Table -->
      
      <br>
      <br>
      <br>
      <br>
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="graphite.js"></script>
    <script src="bar_chart.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawPieChart);

        function drawPieChart() {

          var data = new google.visualization.arrayToDataTable([
            ["Country","People"],
            <?php
            for($i=0;$i<$resultCount;$i++){
              ?>[<?php echo "'".$country[$i]."', ".$people[$i] ?>],
            <?php } 
            ?>
            ]);

          var options = {
        //          title: "Distributed Food per Districts (%)",
              width: 'auto',
              height: '400',
              is3D: 'true',
              colors: [
                <?php
                for($i=0;$i<$resultCount;$i++) {
                  echo "'".$color[$i]."',";
                } 
                ?>
              ]
            };
          var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
          chart.draw(data, options);
        }

        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawColumnChart);
        
        function drawColumnChart() {
          var data = google.visualization.arrayToDataTable([
            ['District', 'Food', { role: 'style' }, { role: 'annotation' }],
            <?php
            for($i=0;$i<$resultCount;$i++){
              ?>[<?php echo "'".$country[$i]."', ".$people[$i].", '".$color[$i]."' , "."'".$people[$i]."'" ?>],
            <?php } 
            ?>
            ]);


          var options = {
        //        title: "Distributed Food per Districts (#)",
            'height': 500,
                  'width': 1300,

                  'barFont': [0, 12, "bold"],
                  'labelFont': [0, 13, 0]
          };
          var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
          chart.draw(data, options);
        }
    </script>
    
  </body>
</html>
