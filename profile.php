<?php

require "dbBroker.php";
require "model/user.php";

session_start();
if(!isset($_SESSION['usrid'])){ 
    header('Location:home.php');
    exit();
}

$id=$_SESSION['usrid'];
$user=User::getUserById($id, $conn);
$row=$user->fetch_array();

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_POST['back'])) {
    header('Location:home.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

</head>
<body>
    
<table>
    <tbody>
        <tr>
         <td>Username<input type="text" value=<?php echo $row["username"]; ?>> </td>
         <td><button onclick="updateUserName(<?php echo $row['id']; ?>, $(this).parent().prev().find('input').val())">Izmeni username</button></td>
        </tr>
        <tr>
         <td>Password<input type="password" value=<?php echo $row["password"]; ?> ></td>
         <td><button onclick="updateUserPass(<?php echo $row['id'] ?>, $(this).parent().prev().find('input').val()) ">Izmeni lozinku</button></td>
        </tr>
        <tr>
         <td>Email<input type="text" value=<?php echo $row["email"] ?> ></td>
         <td><button onclick="updateUserEmail(<?php echo $row['id'] ?>, $(this).parent().prev().find('input').val()) ">Izmeni email</button></td>
        </tr>
        <tr>
    </tbody>
</table>


<form action="" method="POST">
<br>
    <button type="submit" name="back">Početna strana</button>
<br>
</form>


<br>
<form action="" method="POST">
<input type="submit" name="logout" value="Odjavi se">
</form>
<br>

<script src="js/script.js"></script>
</body>
</html>