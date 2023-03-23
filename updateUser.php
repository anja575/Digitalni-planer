<?php
require "dbBroker.php";
require "model/user.php";

if(isset($_POST['id']) && isset($_POST['name']) ){
    
    $answer = User::updateUserName($_POST['id'], $_POST['name'], $conn);
    if($answer){
        echo 'Success';
    }else{
        echo 'Failed';
    }

}


if(isset($_POST['id']) && isset($_POST['pass']) ){
    
    $answer = User::updateUserPass($_POST['id'], $_POST['pass'], $conn);
    if($answer){
        echo 'Success';
    }else{
        echo 'Failed';
    }

}


if(isset($_POST['id']) && isset($_POST['email']) ){
    
    $answer = User::updateUserEmail($_POST['id'], $_POST['email'], $conn);
    if($answer){
        echo 'Success';
    }else{
        echo 'Failed';
    }

}