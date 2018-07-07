<?php

class DB_Functions{
    private  $conn;

    function __construct()
    {
        require_once 'db_connect.php';
      // $db = new DB_Connect();
        //$this->conn =$db->connect();

    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }
    /*
     * check user exists
     * return true/false
     */

    function checkExistsUser($phone)
    {
        $stmt =$this->conn->prepare("SELECT * FROM registration WHERE phone=?");
        $stmt->bind_param("s",$phone);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows >0)
        {
            $stmt->close();
            return true;
        }
        else
        {
            $stmt->close();
            return false;
        }
    }
    /*
     * register new user
     * return user object if user was created
     * return error message if have exception
     */

    public  function registerNewUser($name,$phone,$email)
    {
        $stmt = $this->conn->prepare("INSERT INTO registration(phone,name,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $name, $phone, $email);
        $result = $stmt->execute();
        $stmt->close();


        if ($result){
            $stmt = $this->conn->prepare("SELECT * FROM User WHERE phone=?");
            $stmt->bind_param("s",$phone);
            $stmt->execute();
            $user=$stmt->get_result()->fetch_assoc();
            return $user;
        }
        else
            return false;

    }
}
?>