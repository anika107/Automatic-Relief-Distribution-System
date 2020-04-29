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

            $get_user = "select 
                            sum(case when admission_status = 'released' and living_status = 'alive' then 1 else 0 end) as recovered,
                            sum(case when admission_status = 'released' and living_status = 'dead' then 1 else 0 end) as deaths,
                            sum(case when admission_status = 'admitted' and critical_status = 'yes' then 1 else 0 end) as critical,
                            sum(case when admission_status = 'admitted' then 1 else 0 end) as active
                        from patient_info";
            $getJson = $conn->prepare($get_user);
            $getJson->execute();
            $result = $getJson->fetchAll(PDO::FETCH_ASSOC);
            if(count($result) > 0) 
            {        
                foreach($result as $data)
                {
                    array_push($response,
                    array(
                                        'active'=>$data['active'],
                                        'critical'=>$data['critical'],
                                        'recovered'=>$data['recovered'],
                                        'deaths'=>$data['deaths']
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