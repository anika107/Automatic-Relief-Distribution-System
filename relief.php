<?php session_start(); ?>
  
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="http://localhost/project/cssTable/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/project/csstable/main.css">
	<title>Latest Update</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a href="http://localhost/project/index.php">Project</a></h1>
                <h3>Corona</h3>
            </div>
        
            <?php if (!isset($_SESSION['logged'])) { ?>
                <div id="menu">
                    <ul>
                        <li><a href="http://localhost/project/index.php">Homepage</a></li>
                        <li class="active"><a href="http://localhost/project/relief.php">Latest Update</a></li>
                        <li><a href="http://localhost/project/logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
			
        </div>
		
		<div id="wrapper">
			<div id="three-column" class="container">
				<div class="title">
					<h2>Distribution of Clothing Relief</h2>
					<p>Will enter three tables: total relief, clothes, medicine and whatever.</p>
				</div>
        
				<div class="table100 ver5 m-b-110">
					<table data-vertable="ver5" id="live_status">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1">Total Active Case</th>
								<th class="column100 column1" data-column="column2">Total Recover Case</th>
								<th class="column100 column1" data-column="column3">Total Death</th>
							</tr>
						</thead>
						<tbody>
						<tr class="row100">
							<td class="column100 column1" data-column="column1"></td>
							<td class="column100 column1" data-column="column2"></td>
							<td class="column100 column1" data-column="column3"></td>
						</tr>
							
							
						</tbody>
					</table>
				</div>	
			</div>

			<script>
				var interval    =   0;
				function start(){
					setTimeout( function(){
						ajax_function();
						interval    =   5;
						setInterval( function(){
							ajax_function();
						}, interval * 1000);
					}, interval * 1000);    
				}

				function ajax_function(){
					$.ajax({
						url: "livestatus.php",
						context: document.body,
						success: function(result){
							var obj = JSON.parse(result);

							var datas = obj.response;
							
							var options = '';
							//alert(datas[0]['affected']);
							var x=document.getElementById('live_status').rows[1].cells;
							x[0].innerHTML=datas[0]['affected'];
							x[1].innerHTML=datas[0]['recovered'];
							x[2].innerHTML=datas[0]['dead'];
							
						}
					}); 
				}
				$(window).on("load", function (e) {
					start();
				});

				
			</script>
		
           
		<?php } else { ?>
                <div id="menu">
                    <ul>
                        <li class="active"><a href="http://localhost/project/index.php">Homepage</a></li>
                        <li><a href="http://localhost/project/login.php">Log In</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div id="copyright" class="container">
	   <p>&copy; project. All rights reserved.</p>
    </div>

</body>
</html>