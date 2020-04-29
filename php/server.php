<?php 
	$username        = "";
	$first_name      = "";
	$last_name       = "";
	$email           = "";
	$errors          = array();
	$password        = "";
	$companyid       = "";
	$category        = "";
	$disaster_date   = "";
	$killed_people   = "";
	$affected_people = "";
	$affected_zone   = "";
	$disasterid      = "";
	$name            = "";
	$family_number   = "";
	$birth_date      = "";
	$age             = "";
	$gender          = "";
	$bloodgroup      = "";


$db = mysqli_connect ('localhost', 'root', '', 'rfid');


if (isset($_POST['register'])) {
		$username   = $_POST['username'];
		$first_name = $_POST['first_name'];		
		$last_name  = $_POST['last_name'];
		$email      = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
    
        if(empty($username))			array_push($errors, "Username is required");
		if(empty($first_name))			array_push($errors, "First Name is required");
		if(empty($last_name))			array_push($errors, "Last Name is required");
		if(empty($email))				array_push($errors, "Email is required");
		if(empty($password_1))			array_push($errors, "Password is required");
		if($password_1 != $password_2)	array_push($errors, "The passwords do not match!");
    
    if (count($errors)== 0) {
			$sql = "INSERT INTO users (username, password, first_name, last_name, email) VALUES ('$username', '$password_1', '$first_name', '$last_name', '$email')";
			mysqli_query($db,$sql);
			header('Location: http://localhost:8080/rfid/index.php'); }
	}


if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password_1'];
			
			if(empty($username) || empty($password)) array_push($errors, "Please fill in the required fields!");

			while (count($errors) == 0) {
				$sql    = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
				$result = mysqli_query($db, $sql);
				
				if (mysqli_num_rows($result))	{
					$row = mysqli_fetch_array($result);
					
					session_start(); 
					$_SESSION['username'] = $row['username']; 
					$_SESSION['logged']   = TRUE; 
					
					header('Location: http://localhost/HelpingHand/index.php'); 
					exit; }
                    
                array_push($errors, "Wrong username/password");
            }
            
        for($x = 0; $x < count($errors); $x++)  
            echo $errors[$x];
            
}
		
		if (isset($_POST['newEntry'])) {
			$companyid       = $_POST['companyid'];
			$category        = $_POST['category'];
			$disaster_date   = $_POST['disaster_date'];		
			$killed_people   = $_POST['killed_people'];
			$affected_people = $_POST['affected_people'];
			$affected_zone   = $_POST['affected_zone'];

			if(empty($companyid))			    array_push($errors, "Required");
			if(empty($category))			    array_push($errors, "Required");
			if(empty($disaster_date))			array_push($errors, "Required");
			if(empty($killed_people))			array_push($errors, "Required");
			if(empty($affected_people))			array_push($errors, "Required");
			if(empty($affected_zone))			array_push($errors, "Required");
			
			if (count($errors)== 0) {
				$sql = "INSERT INTO disaster (category, disaster_date, companyid, killed_people, affected_people, affected_zone) VALUES ('$category', '$disaster_date', '$companyid', '$killed_people', '$affected_people', '$affected_zone')";
				mysqli_query($db, $sql);
				
                header('Location: http://localhost/helpinghand/crisis.php'); }
		}

if (isset($_POST['victimEntry'])) {
			$disasterid      = $_POST['disasterid'];
			$name            = $_POST['name'];
			$family_number   = $_POST['family_number'];
			$birth_date      = $_POST['birth_date'];
			$age             = $_POST['age'];
			$gender          = $_POST['gender'];
			$bloodgroup      = $_POST['bloodgroup'];
		
			if(empty($disasterid))			array_push($errors, "Required");
			if(empty($name))			    array_push($errors, "Required");
			if(empty($family_number))		array_push($errors, "Required");
			if(empty($birth_date))			array_push($errors, "Required");
			if(empty($age))					array_push($errors, "Required");
			if(empty($gender))				array_push($errors, "Required");
			if(empty($bloodgroup))			array_push($errors, "Required");
			
			if (count($errors) == 0) {
				$sql = "INSERT INTO victim (disasterid, name, family_number, birth_date, age, gender, bloodgroup) VALUES ('$disasterid', '$name', '$family_number', '$family_number', '$age', '$gender', '$bloodgroup')";
				mysqli_query($db,$sql);
				header('Location: http://localhost/helpinghand/index.php'); }

            else array_push($errors, "Status Unknown");	
                
		}


if (isset($_POST['vsearch'])) {
    $vname   = $_POST['name'];

    if(empty($name))			array_push($errors, "Victim name is required");

    if (count($errors) == 0) {
            $sql   = "SELECT NAME FROM victim WHERE NAME = '$vname'";
            $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result))	{
                $row = mysqli_fetch_array($result);
                echo "<td>" . $row['NAME'] . "</td>";
        
                header('Location: http://localhost/helpinghand/vresult.php'); 
                exit; 
                }

     else	array_push($errors, "Status Unknown");
    }
}

 ?>