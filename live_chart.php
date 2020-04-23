<?php
$connect = mysqli_connect("localhost","root","","rfid");
$query = "SELECT count(collect) as People, address, sum(collect) as Total FROM `info` Where collect>=1 GROUP by address";
$result = mysqli_query($connect , $query);

$resultCount=$result->num_rows;

$color = ['#ff7878','#9ee2d9','#9f9ee2','#e29eba','#fc037b','#fc0303','#fc7b03','#a5fc03','#03fc52','#03fceb','#32a8a2','#8c32a8','#a8326b'];
$country = array();
$people = array();
foreach ($result as $peopleData) {
    $country[] = $peopleData['address'];
    $people[] = $peopleData['People'];
}
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="graphite.js"></script>
    <script src="bar_chart.js"></script>
    <meta charset="utf-8">
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
          title: "Distributed Food per Districts (%)",
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
        title: "Distributed Food per Districts (#)",
        'height': 500,
			  'width': 1300,
			  
			  'barFont': [0, 12, "bold"],
			  'labelFont': [0, 13, 0]
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
      chart.draw(data, options);
  }
  </script>
  
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
    @media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
    body{
        max-width: auto;
    }
    #chart_container{
        position: relative;
        padding-bottom: 684px;
        height: 0 ;
    }
    
    .chart-div{
        margin-bottom: 20px;
    }
    .topnav input[type=text] {
		float: right;
		padding: 5px;
		margin-top: 7px;
		margin-right: 16px;
		border: none;
		font-size: 17px;
		}
</style>

  </head>
  
  <body>
    <br>
		<ul class="topnav">
      <li><a href="home.php">Home</a></li>
			<li><a href="user data.php">User Data</a></li>
			<li><a href="registration.php">Registration</a></li>
			<!-- <li><a href="read tag.php">Scan Card</a></li> -->
			<li><a class="active" href="live_chart.php">Live Data</a></li>
      <input type="text" placeholder="Search">
		</ul>
    <h2>Vending Machine Live Data</h2>
    <div id="chart_container" class="centre">
      <div id="pie-chart" class="chart-div"></div>

      <div id="column-chart" class="chart-div"></div>
    </div>
  </body>
</html>
