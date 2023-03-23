<?php

require "dbBroker.php";
require "model/item.php";

session_start();
if(!isset($_SESSION['id'])){ 
    header('Location:home.php');
    exit();
}
$id=$_SESSION['id'];


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $result=Item::createItem($id, $name, $location, $date, $conn);
        
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
</head>
<body>
    
<form action="" method="POST">
    <label for="name">Naziv</label>
    <input type="text" name="name" required>
    <br>
    <label for="location">Lokacija</label>
    <input type="text" name="location" required>
    <br>
    <label for="date">Datum i vreme</label>
    <input type="datetime-local" name="date" required>
    <br>
    <button type="submit" name="add">Dodaj stavku</button>
    
</form>

<form action="" method="POST">
<br>
    <button type="submit" name="back">Početna strana</button>
<br>
</form>


<script src="js/script.js"></script>
</body>
</html>