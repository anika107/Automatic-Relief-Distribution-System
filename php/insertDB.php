<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
		$name = $_POST['name'];
		$nid = $_POST['nid'];
		$gender = $_POST['gender'];
        $member = $_POST['family_size'];
		$upazilla = $_POST['upazilla'];
		$district = $_POST['district'];
		$division = $_POST['division'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO info (id,name,nid,gender,family_size,upazilla,district,division)
    values ('$id','$name','$nid','$gender','$member','$upazilla','$district','$division')";
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$name,$nid,$gender,'$member','$upazilla','$district','$division'));
		Database::disconnect();
		header("Location: ./user_data.php");
    }
?>