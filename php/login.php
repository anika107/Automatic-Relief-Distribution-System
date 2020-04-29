<?php  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Log In | PS </title>

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
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/fonts.css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/cssTable/util.css">
	<link rel="stylesheet" type="text/css" href="../css/csstable/main.css">  
</head>
<body>
	
	<?php if (!isset($_SESSION['logged'])) { ?>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('../image/login1.jpg');">
                <div class="wrap-login100 p-t-190 p-b-30">
                    <form class="login100-form validate-form" method = "post">
                        <div class="wrap-input100 m-b-10" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="symbol-input100"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="wrap-input100 m-b-10" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                        </div>
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn">Log In</button>
                        </div>

                        <div class="text-center w-full p-t-25 p-b-10">
                            <a href="#" class="txt1" style="text-decoration:none;">Forgot Username / Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } else header('./index.php'); ?>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = mysqli_connect ('localhost', 'root', '', 'rfid');    
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = mysqli_real_escape_string($db, $_POST['password']);
            $errors = array();

                if(empty($username) || empty($password))    array_push($errors, "Please fill in the required fields.");

                while (count($errors) == 0) {

                    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result))	{
                        $row = mysqli_fetch_array($result);

                        $_SESSION['username'] = $row['username']; 
                        $_SESSION['logged']   = TRUE; 

                        header('location: ./index.php'); 
                        exit; }

                    array_push($errors, "Wrong username or password.");
                }

                for($x = 0; $x < count($errors); $x++)  
                    echo $errors[$x];
        }
    ?>

    
    <div id="copyright" class="container">
        <p>&copy; rfid. All rights reserved.</p>
    </div>
    
</body>
</html>