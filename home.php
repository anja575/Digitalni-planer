<?php

require "dbBroker.php";
require "model/item.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:index.php');
    exit();
}

$id = $_SESSION['user_id'];
$items = Item::getItems($conn, $id);

if (!$items) {
    echo "Nastala je greška!";
    exit();
}
//if ($items->num_rows == 0) {
//    echo "Digitalni planer trenutno nema stavki.";
//}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_POST['add'])) {
    $_SESSION['id'] = $id;
    header('Location: add.php');
}

if (isset($_POST['update'])) {
    $_SESSION['usrid'] = $id;
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
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body class="container">

<header>
    <form action="" method="POST" class="title-form">
        <h1>Digitalni planer</h1>
        <div>
            <button type="submit" name="update">Profil</button>
            <button type="submit" name="logout">Odjavi se</button>
        </div>
    </form>

    <form action="" method="POST">
        <?php if ($items->num_rows == 0): ?>
            <p>Digitalni planer trenutno nema stavki.</p>
        <?php else: ?>
            <p>Lista svih stavki:</p>
        <?php endif; ?>

        <button type="submit" name="add" class="add-button"> + Dodaj stavku</button>
    </form>
</header>

<table id="planner-table">
    <thead>
    <tr>
        <th scope="col">Naziv</th>
        <th scope="col">Lokacija</th>
        <th scope="col">Datum i vreme</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = $items->fetch_array()):
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

<div class="action-buttons">
    <button onclick="sortTableByDate()">Sortiraj</button>
    <button id="delete" class="logout-button">Izbriši</button>
</div>

<h3>Pretraga</h3>
<input type="text" id="input" class="btn" placeholder="Pretraži stavke" onkeyup="search()">

<script src="js/script.js"></script>
</body>
</html>
