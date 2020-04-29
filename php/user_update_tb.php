<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $nid = $_POST['nid'];
        $gender = $_POST['gender'];
        $member = $_POST['member'];
        $address = $_POST['address'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE info  set name = ?,nid =?, gender =?, member =?, address =? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$nid,$gender,$member,$address,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>
