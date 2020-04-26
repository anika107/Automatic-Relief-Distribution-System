<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$id = $_POST['id'];
		$name = $_POST['name'];
		$nid = $_POST['nid'];
		$gender = $_POST['gender'];
        $member = $_POST['member'];
		$address = $_POST['address'];
		
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO info (id,name,nid,gender,member,address)
    values ('$id','$name','$nid','$gender','$member','$address')";
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$name,$nid,$gender,$member,$address));
		Database::disconnect();
		header("Location: user data.php");
    }
?>