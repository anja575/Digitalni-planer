<?php
require "dbBroker.php";

class User{
    public $id;
    public $username;
    public $password;
    public $email;

    public function __construct($id=null,$username=null,$password=null,$email=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email=$email;
    }

    public static function logIn($usrname, $usrpass, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$usrname' and password='$usrpass' ";

        return $conn->query($query);
    }

    public static function createUser($usremail,$usrname,$usrpass,mysqli $conn)
    {
        $query = "INSERT INTO user(email, username, password) 
        VALUES('$usremail', '$usrname', '$usrpass')";

        if (mysqli_query($conn, $query)) {
            header('Location: login.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }

    public static function getUserById($usrid, mysqli $conn) 
    {
        $query = "SELECT * FROM user WHERE id='$usrid'";

        return $conn->query($query);
    }

    public static function updateUserName($usrid, $usrname, mysqli $conn)
    {
        $query = "UPDATE user SET username='$usrname' WHERE id='$usrid'";

        return $conn->query($query);
    }

    public static function updateUserPass($usrid, $usrpass, mysqli $conn)
    {
        $query = "UPDATE user SET password='$usrpass' WHERE id='$usrid'";

        return $conn->query($query);
    }

    public static function updateUserEmail($usrid, $usremail, mysqli $conn)
    {
        $query = "UPDATE user SET email='$usremail' WHERE id='$usrid'";

        return $conn->query($query);
    }

    public static function getUserByName($usrname, mysqli $conn) 
    {
        $query = "SELECT * FROM user WHERE username = '$usrname'";
        return $conn->query($query);
    }





}




?>