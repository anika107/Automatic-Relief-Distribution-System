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
        $member = $_POST['family_size'];
        $upazilla = $_POST['upazilla'];
		$district = $_POST['district'];
		$division = $_POST['division'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE card_user_info  set name = ?,nid =?, gender =?, family_size =?, upazilla =?, district =?, division =? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$nid,$gender,$member,$upazilla,$district,$division,$id));
		Database::disconnect();
		header("Location: user_data.php");
    }
?>
