<?php
session_start();
require './data/config.php';


$username1= $_POST['username'];
$password1=$_POST['password'];
if(!($username1===USERNAME) && password_hash($password1, PASSWORD_BCRYPT) === PASSWORD){
    echo ('Login failed!');
}
else{
    $_SESSION['username']= $username1;
    $_SESSION['password']=$password1;
    header("Location: ./secret.php");
}
