<?php
require "dbBroker.php";

class Item{
public $id;
public $userid;
public $name;
public $location;
public $date;

public function __construct($id=null, $userid=null, $name=null, $location=null, $date=null)
{
$this->id=$id;
$this->userid=$userid;
$this->name=$name;
$this->location=$location;
$this->date=$date;
}

public static function getItems(mysqli $conn, $id){
    $query = "SELECT * FROM item WHERE userid='$id'";
    return $conn->query($query);
}

public static function createItem($usrid, $itemname, $itemlocation, $itemdate, mysqli $conn)
{
    $query = "INSERT INTO item(userid, name, location, date) 
    VALUES('$usrid', '$itemname', '$itemlocation', '$itemdate')";

    if (mysqli_query($conn, $query)) {
        echo 'Stavka je uneta';
        header('Location: add.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

public static function deleteItem($itemid, mysqli $conn) 
{
    $query= "DELETE FROM item WHERE id='$itemid'";
    return $conn->query($query);
}

}

?>