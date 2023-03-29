<?php

require "dbBroker.php";
require "model/item.php";

session_start();
if (!isset($_SESSION['id'])) {
    header('Location:home.php');
    exit();
}
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.png" />
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <title>Dodaj stavku</title>
</head>
<body class="container">

    <div class="input-row">
        <label for="name">Naziv</label>
        <input name="name" type="text" required>
    </div>

    <div class="input-row">
        <label for="location">Lokacija</label>
        <input name="location" type="text" required>
    </div>

    <div class="input-row">
        <label for="date">Datum i vreme</label>
        <input name="date" type="datetime-local" required>
    </div>


    <div class="add-form-buttons">
        <a class="button-styles" href="home.php"> ⇤ Početna strana</a>
        <button onclick="addItem(<?php echo $id?>)"> 
            + Dodaj stavku
        </button>
    </div>


<script src="js/script.js"></script>
</body>
</html>
