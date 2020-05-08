<?php
    //Connect to database
    require 'database.php';

    $id = null;
    if ( !empty($_POST['UIDresult'])) {
        $id = $_REQUEST['UIDresult'];
    }

    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM card_user_info where id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
    $conn = new mysqli("localhost", "root", "", "rfid");
    
    if ($id==$data['id']) {
        $count=$data['relief_collected'];
        $date=$data['last_relief_date'];
        $today = time();
        $interval = $today - strtotime($date);
        $days = floor($interval / 86400); // 1 day
        if($days >= 7) {
            $count++;
            //$date=now();
            $sql = "UPDATE card_user_info SET relief_collected=$count, last_relief_date=now() WHERE id='$id'";
            if($conn->query($sql) === TRUE)
            {
                echo "ok";
                exit();
            }
            else {
                echo "Connection Failed";
                exit();
            }
        }
        else 
        {
            echo "Please contact after $days days";
            exit();
        }
	}
   
    else {
        echo "No Match";
        exit();
    }
?>
