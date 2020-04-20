<?php
/**
 * Created by PhpStorm.
 * User: abdullah
 * Date: 3/6/19
 * Time: 5:50 PM
 */

// include db connect class
require_once __DIR__ . '/Connection.php';

class status{
    
    function status(){
        $connection = new Connection();
        $conn = $connection->getConnection();
        //array for json response
        $response = array();
        $status="status";
        $message = "message";
        
        $get_user = "select 
        (SELECT COUNT(*)FROM affected WHERE status = 'affected') as affected,
        (SELECT COUNT(*)FROM affected WHERE status = 'recovered') as recovered,
        (SELECT COUNT(*)FROM affected WHERE status = 'dead') as dead
         from affected";
        $getJson = $conn->prepare($get_user);
        $getJson->execute();
        $result = $getJson->fetchAll(PDO::FETCH_ASSOC);
       
        if(count($result) > 0) 
        {        
            foreach($result as $data)
            {
                array_push($response,
                array(
                                    'affected'=>$data['affected'],
                                    'recovered'=>$data['recovered'],
                                    'dead'=>$data['dead']
                )); 
            }
            echo json_encode(array("response"=>$response,$status=>1, $message=>"Successful"));            //  On Successful Login redirects to home.php
            die(); 

        }
        else
        {
            echo json_encode(array("status"=>null,$status=>0, $message=>"Error"));
            die();
        }

    }
}

$status = new status();
$status->status();
