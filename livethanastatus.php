<?php
    // include db connect class
    session_start();
    require_once __DIR__ . '/Connection.php';

    class status{

        function status(){
            $connection = new Connection();
            $conn = $connection->getConnection();
            //array for json response
            $response = array();
            $status="status";
            $message = "message";

            $get_user = "select area as name , sum(case when admission_status = 'admitted' and critical_status = 'yes' then 1 else 0 end )
             as active from patient_info GROUP by area";
            $getJson = $conn->prepare($get_user);
            $getJson->execute();
            $result = $getJson->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0)
            {
                foreach($result as $data)
                {
                    array_push($response,
                    array(
                                        'name'=>$data['name'],
                                        'active'=>$data['active']
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
