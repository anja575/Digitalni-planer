<?php

require "dbBroker.php";
require "model/item.php";

session_start();

if(!isset($_SESSION['user_id'])){ 
    header('Location:index.php');
    exit();
}

$id=$_SESSION['user_id'];
$items = Item::getItems($conn,$id);

if (!$items) {
    echo "Nastala je greška!";
    exit();
}
if ($items->num_rows == 0) {
    echo "Digitalni planer trenutno nema stavki.";
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_POST['add'])) {
    $_SESSION['id'] = $id; 
    header('Location: add.php');
}

if(isset($_POST['update'])) {
    $_SESSION['usrid']=$id;
    header('Location: profile.php');
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitalni planer</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>


<table id="table">
    <thead>
     <tr>
      <th scope="col">Naziv</th>
      <th scope="col">Lokacija</th>    
      <th scope="col">Vreme i datum</th>        
     </tr>
    </thead>
    <tbody>
        <?php 
         while($row=$items->fetch_array()):
        ?>
        <tr>
         <td><?php echo $row["name"] ?></td>
         <td><?php echo $row["location"] ?></td>
         <td><?php echo $row["date"] ?></td>
         <td>
         <label class="radio-btn">
         <input type="radio" name="checked-donut" value=<?php echo $row["id"] ?>> 
         <span class="checkmark"></span>
         </label>
         </td>
        </tr>
        <?php
        endwhile;           
        ?>

    </tbody>
</table>




<form action="" method="POST">
<input type="submit" name="add" value="Dodaj stavku">
</form>


<br>
<button id="delete" >Izbrisi</button>
<br>

<br>
<button onclick="sortTableByDate()">Sortiraj</button>
<br>
<h3>Pretraga timova</h3>
<input type="text" id="input" class="btn" placeholder="Pretrazi timove" onkeyup="search()">
<br>

<form action="" method="POST">
<input type="submit" name="update" value="Profil">
</form>

<br>
<form action="" method="POST">
<input type="submit" name="logout" value="Odjavi se">
</form>
<br>



<script src="js/script.js"></script>
</body>
</html>
