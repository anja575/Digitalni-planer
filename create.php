<?php

require "dbBroker.php";
require "model/user.php";

if (isset($_POST['submit'])) { 
    $usremail = $_POST['usremail'];
    $usrpass = $_POST['usrpass'];
    $usrname = $_POST['usrname'] ;

    $answer=User::getUserByName($usrname, $conn);
    if($answer->num_rows==1){
       echo 'Ovo ime već postoji!';
    } else {
    $result=User::createUser($usremail,$usrname,$usrpass,$conn);
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
                
    <label for="email">E-mail adresa</label>
    <input type="text" name="usremail" required>
    <br>
    <label for="name">Korisničko ime</label>
    <input type="text" name="usrname" required>
    <br>
    <label for="password">Lozinka</label>
    <input type="password" name="usrpass" required>
    <br>
    <button type="submit" name="submit">Kreiraj nalog</button>
                
</form>



</body>
</html>