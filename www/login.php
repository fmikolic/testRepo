<?php
session_start();
require './data/helper.php';
require './data/config.php';

$connect=openConnection(DBCONNECTIONDATA);

$username1= $_POST['username'];
$password1=$_POST['password'];

$hashedPass=password_hash($password1, PASSWORD_BCRYPT);


$query="SELECT * FROM users WHERE username='".$username1."' AND password = '".$hashedPass."'";
$result=mysqli_query($connect,$query);

if (!(!$result || mysqli_num_rows($result)==0)){
    echo ('Failed login');
}
else{
    $_SESSION['username']= $username1;
    $_SESSION['password']=$password1;
    header("Location: ./secret.php");
}
closeConnection($connect);
