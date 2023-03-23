<?php

require "dbBroker.php";
require "model/user.php";
require "model/item.php";

session_start();
if(isset($_POST['usrname']) && isset($_POST['usrpass'])){
    $usrname = $_POST['usrname'];
    $usrpass = $_POST['usrpass'];

    $answer = User::logIn($usrname, $usrpass, $conn); 
    
    if($answer->num_rows==1){
        $loginuser = mysqli_fetch_assoc($answer); 
        $_SESSION['user_id'] = $loginuser['id']; 
        header('Location: home.php');
        exit();
    }
    else {
       echo 'Neuspešno logovanje';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitalni planer</title>
</head>
<body>
    <form method="POST" action="#">
 
    <label>Korisničko ime</label>
    <input type="text" name="usrname" required>
    <br>
    <label for="password">Lozinka</label>
    <input type="password" name="usrpass" required>
    <button type="submit">Prijavi se</button>

    </form>
</body>
</html>