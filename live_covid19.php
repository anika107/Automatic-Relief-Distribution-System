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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <!-- Page Preloder
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!--
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Density", { role: "style" } ],
          ["", 50, "orange"],
          ["", 90, "orange"],
          ["", 140, "orange"],
          ["", 200, "color: orange"],
          ["", 500, "color: orange"],
          ["", 740, "color: orange"],
          ["", 960, "color: orange"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "Chart of Covid-19 data, in days(5)/(critical cases)",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
   -->
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

                            <a href="#" class="fb-xfbml-parse-ignore"><i class="fa fa-facebook"></i></a>

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

    <section class="breadcrumb-section set-bg" data-setbg="../image/relief7.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Live Updates of Covid-19</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Density", { role: "style" } ],
          ["", 50, "orange"],
          ["", 90, "orange"],
          ["", 140, "orange"],
          ["", 200, "color: orange"],
          ["", 500, "color: orange"],
          ["", 740, "color: orange"],
          ["", 960, "color: orange"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "Chart of Covid-19 data, in days(5)/(critical cases)",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
    	<div id="wrapper">
        <div id="three-column" class="container">
          <div class="title">
            <h2>Covid-19 Live Data</h2>
            <p style="font-size: 24px;color: #757575; padding-top: 20px;">All information about Covid-19 data can be found here.</p>
          </div>


        <div class="row">
          <div class="chart-table" style="padding-left: 70px;">
          <table id="live_status">
              <thead>
                  <tr>
                    <th class="column100 column1" data-column="column1">Total Active Case</th>
                    <th class="column100 column1" data-column="column2">Total Critical Case</th>
                    <th class="column100 column1" data-column="column3">Total Recover Case</th>
                    <th class="column100 column1" data-column="column4">Total Death</th>
                    <!--<th class="column100 column1" data-column="column5">Total Critical Case in Divison</th>
                    <th class="column100 column1" data-column="column6">Total Critical case in District</th>
                    <th class="column100 column1" data-column="column7">Total Critical case in Thana</th>
                    <th class="column100 column1" data-column="column8">Today Critical Case</th>
                    <th class="column100 column1" data-column="column9">Today Recovered Case</th>
                    <th class="column100 column1" data-column="column10" style="padding-right: 200px;">Today Death Case</th -->
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="point"></td>
                      <td class="point"></td>
                      <td class="point"></td>
                      <td class="point"></td>
                  </tr>
              </tbody>
              </table>
             <script>
              var interval    =   0;
              function start1(){
                  setTimeout( function(){
                      ajax_function1();
                      interval    =   5;
                      setInterval( function(){
                          ajax_function1();
                      }, interval * 1000);
                  }, interval * 1000);
              }

              function ajax_function1(){
                  $.ajax({
                      url: "livestatus.php",
                      context: document.body,
                      success: function(result){
                          var obj = JSON.parse(result);

                          var datas = obj.response;

                          var options = '';
                          //alert(datas[0]['affected']);
                          var x=document.getElementById('live_status').rows[1].cells;
                          x[0].innerHTML=datas[0]['active'];
                          x[1].innerHTML=datas[0]['critical'];
                          x[2].innerHTML=datas[0]['recovered'];
                          x[3].innerHTML=datas[0]['deaths'];

                      }
                  });
              }
              $(window).on("load", function (e) {
                  start1();
              });


          </script>
     </div>

      </div>

      </div>

      <div id="three-column" class="container">
        <div class="title">

        </div>


      <div class="row">
        <div class="chart-table" style="padding-left:200px;">
          <h2>Today Live Data</h2>
          <table>
              <thead>
                  <tr>
                      <th class="column100 column1" data-column="column1">Today Critical Case</th>
                      <th class="column100 column1" data-column="column1">Today Recovered Case</th>
                      <th class="column100 column1" data-column="column1">Today death</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                     include 'database.php';
                    $pdo = Database::connect();
                     echo '<tr>';
                     $sql = "SELECT count(*) as today_critical from patient_info where admission_date = curdate() and admission_status = 'admitted' and critical_status = 'yes'";
                         foreach ($pdo->query($sql) as $row) {
                              echo '<td class="point">' . $row['today_critical'] . "</td>";
                          }
                          $sql = "SELECT count(*) as today_recovered from patient_info where admission_date = curdate() and admission_status = 'released' and living_status = 'alive'";
                              foreach ($pdo->query($sql) as $row) {
                                   echo '<td class="point">' . $row['today_recovered'] . "</td>";
                               }
                               $sql = "SELECT count(*) as today_death from patient_info where admission_date = curdate() and admission_status = 'released' and living_status = 'dead'";
                                   foreach ($pdo->query($sql) as $row) {
                                        echo '<td class="point">' . $row['today_death'] . "</td>";
                                    }

                      echo '</tr>';
                      Database::disconnect();
                ?>
              </tbody>
          </table>

   </div>

    </div>

    </div>


    <div id="three-column" class="container">
      <div class="title">

      </div>


    <div class="row">
      <div class="chart-table" style="padding-left:100px;">
        <h2>Total Critical Case in Divison</h2>
        <table id="live_status_division">
            <thead>
                <tr>
                  <th class="column100 column1" data-column="column1">Name Of Division</th>
                  <th class="column100 column1" data-column="column2">Total</th>
                 </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="point"></td>
                    <td class="point"></td>
                </tr>
            </tbody>
            </table>
            <script>
             var interval    =   0;
             function start2(){
                 setTimeout( function(){
                     ajax_function2();
                     interval    =   5;
                     setInterval( function(){
                         ajax_function2();
                     }, interval * 1000);
                 }, interval * 1000);
             }

             function ajax_function2(){
                 $.ajax({
                     url: "livedivisionstatus.php",
                     context: document.body,
                     success: function(result){
                         var obj = JSON.parse(result);

                         var datas = obj.response;

                         var options = '';
                         //alert(datas[0]['affected']);

                         $("#live_status_division > tbody").empty();

                         var tableRef = document.getElementById('live_status_division').getElementsByTagName('tbody')[0];
                         jQuery.each(datas, function(i, val) {
                             // Insert a row in the table at the last row
                             var newRow   = tableRef.insertRow();

                             // Insert a cell in the row at index 0
                             var newCell  = newRow.insertCell(0);

                             // Append a text node to the cell
                             var newText  = document.createTextNode(datas[i]['name']);
                             newCell.appendChild(newText);
                             // Insert a cell in the row at index 0
                             var newCell  = newRow.insertCell(1);

                             // Append a text node to the cell
                             var newText  = document.createTextNode(datas[i]['active']);
                             newCell.appendChild(newText);
                            // $("#" + i).append(document.createTextNode(" - " + val));
                         });



                     }
                 });
             }
             $(window).on("load", function (e) {
                 start2();
             });


         </script>

 </div>

    <div id="columnchart_values" style="width: 50px; height: 300px;"></div>
  </div>


  </div>

  <div id="three-column" class="container">
    <div class="title">

    </div>


  <div class="row">
    <div class="chart-table" style="padding-left:100px;">
      <h2>Total Critical Case in Thana</h2>
      <table id="live_status_thana">
          <thead>
              <tr>
                <th class="column100 column1" data-column="column1">Name Of Thana</th>
                <th class="column100 column1" data-column="column2">Total</th>
               </tr>
          </thead>
          <tbody>
              <tr>
                  <td class="point"></td>
                  <td class="point"></td>
              </tr>
          </tbody>
          </table>
         <script>
          var interval    =   0;
          function start3(){
              setTimeout( function(){
                  ajax_function3();
                  interval    =   5;
                  setInterval( function(){
                      ajax_function3();
                  }, interval * 1000);
              }, interval * 1000);
          }

          function ajax_function3(){
              $.ajax({
                  url: "livethanastatus.php",
                  context: document.body,
                  success: function(result){
                      var obj = JSON.parse(result);

                      var datas = obj.response;

                      var options = '';
                      //alert(datas[0]['affected']);

                      $("#live_status_thana > tbody").empty();

                      var tableRef = document.getElementById('live_status_thana').getElementsByTagName('tbody')[0];
                      jQuery.each(datas, function(i, val) {
                          // Insert a row in the table at the last row
                          var newRow   = tableRef.insertRow();

                          // Insert a cell in the row at index 0
                          var newCell  = newRow.insertCell(0);

                          // Append a text node to the cell
                          var newText  = document.createTextNode(datas[i]['name']);
                          newCell.appendChild(newText);
                          // Insert a cell in the row at index 0
                          var newCell  = newRow.insertCell(1);

                          // Append a text node to the cell
                          var newText  = document.createTextNode(datas[i]['active']);
                          newCell.appendChild(newText);
                         // $("#" + i).append(document.createTextNode(" - " + val));
                      });



                  }
              });
          }
          $(window).on("load", function (e) {
              start3();
          });


      </script>




</div>

      <div id="columnchart_values1" style="width: 50px; height: 300px;"></div>
</div>

</div>



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

    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Density", { role: "style" } ],
          ["", 4, "orange"],
          ["", 5, "orange"],
          ["", 12, "orange"],
          ["", 17, "color: orange"],
          ["", 25, "color: orange"],
          ["", 33, "color: orange"],
          ["", 35, "color: orange"]
        ]);
        var data1 = google.visualization.arrayToDataTable([
          ["Element", "Density", { role: "style" } ],
          ["", 1, "orange"],
          ["", 3, "orange"],
          ["", 4, "orange"],
          ["", 7, "color: orange"],
          ["", 5, "color: orange"],
          ["", 3, "color: orange"],
          ["", 5, "color: orange"]
        ]);

        var view = new google.visualization.DataView(data);
        var view1 = new google.visualization.DataView(data1);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "Chart of Covid-19 data, in day/(critical cases)",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var options1 = {
          title: "Chart of Covid-19 data, in day/(death cases)",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
        chart.draw(view1, options1);
    }
    </script>

  </body>
</html>

