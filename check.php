<?php
    //Connect to database
    require 'database.php';

    $id = null;
    if ( !empty($_POST['UIDresult'])) {
        $id = $_REQUEST['UIDresult'];
    }

    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM info where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
    $conn = new mysqli("localhost", "root", "", "rfid");
    
    if ($id==$data['id']) {
        $count=$data['collect'];
        $count++;
        $sql = "UPDATE info SET collect=$count WHERE id='$id'";
        if($conn->query($sql) === TRUE)
        {
            echo "ok";
            exit();
        }
	}
   
    else {
        echo "No Match";
        exit();
    }
?>
