<?php
$host = "localhost";
$database = "digitalniplaner";
$user = "root";
$password = "";

$conn = new mysqli($host,$user,$password,$database);


if ($conn->connect_errno){
    exit("Neuspešna konekcija: ".$conn->connect_error);
}

