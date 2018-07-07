<?php

/*
 * Endpoint : http://localhost/mobileapp/checkuser.php
 * Method : POST
 * Param: phone
 * Result :JSON
 */

require_once 'db_connect.php';

$quer="select * from registration where phone='".$_POST['phone']."'";

$result = mysqli_query($conn, $quer);


if (mysqli_num_rows($result) > 0) {
    //$nr = mysqli_fetch_assoc($result);


    echo "data exist";
    echo json_endcode($response);
}else{

    echo "continue";
    echo json_endcode($response);
}











/*$response =array();
if(isset($_POST['phone']))
{
    $phone =$_POST['phone'];
    if($db->checkExistsUser($phone))
    {
        $response["exists"]= TRUE;
        echo json_endcode($response);
    }
    else{
        $response["exists"]= FALSE;
        echo json_endcode($response);
    }
}
else{
    $response["error_msg"]= "Required parameter (phone) is missing!";
    echo json_encode($response);

}*/
?>