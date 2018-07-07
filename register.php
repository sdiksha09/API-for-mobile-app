<?php
/*
 * endpoint: http://localhost/mobileapp/register.php
 */
require_once 'db_connect.php';



$sql = "INSERT INTO registration (id, name, phone,email)
VALUES ('','".$_POST['name']."', '".$_POST['phone']."', '".$_POST['email']."')";

if (mysqli_query($conn, $sql)) {
    echo   "New record created successfully";
    echo json_endcode($response);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo json_endcode($response);
}

mysqli_close($conn);

?>