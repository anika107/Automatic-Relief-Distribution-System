<?php session_start(); ?>
  
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
	<link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/fonts.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/cssTable/util.css">
	<link rel="stylesheet" type="text/css" href="../css/cssTable/main.css">
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
        
            
                <div id="menu">
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li class="active"><a href="live_relief.php">Latest Update</a></li>
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
								<th class="column100 column1" data-column="column2">Total Critical Case</th>
								<th class="column100 column1" data-column="column2">Total Recover Case</th>
								<th class="column100 column1" data-column="column4">Total Death</th>
							</tr>
						</thead>
						<tbody>
						<tr class="row100">
							<td class="column100 column1" data-column="column1"></td>
							<td class="column100 column1" data-column="column2"></td>
							<td class="column100 column1" data-column="column3"></td>
							<td class="column100 column1" data-column="column4"></td>
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
							x[0].innerHTML=datas[0]['active'];
							x[1].innerHTML=datas[0]['critical'];
							x[2].innerHTML=datas[0]['recovered'];
							x[3].innerHTML=datas[0]['deaths'];
							
						}
					}); 
				}
				$(window).on("load", function (e) {
					start();
				});

				
			</script>
		
           
		
                <div id="menu">
                    <ul>
                        <li class="active"><a href="index.php">Homepage</a></li>
                        <li><a href="login.php">Log in</a></li>
                    </ul>
                </div>
       
        </div>
    </div>
    
    <div id="copyright" class="container">
	   <p>&copy; project. All rights reserved.</p>
    </div>

</body>
</html>