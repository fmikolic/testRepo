<?php
session_start();
require './data/helper.php';
require './data/config.php';



$connect=openConnection(DBCONNECTIONDATA);


$username1= $_POST['username'];
$password1=$_POST['password'];

$query="SELECT username, password FROM users";
$result=mysqli_query($connect,$query);

$qusername='';
$qpassword='';
if (!$result || mysqli_num_rows($result)>0){
    while($row=$result->fetch_assoc()){
        $qusername=$row["username"];
        $qpassword=$row["password"];
    }
}

closeConnection($connect);

if(!($username1===$qusername) && !(password_hash($password1, PASSWORD_BCRYPT) === $qpassword)){
    echo ('Login failed!');
}
else{
    $_SESSION['username']= $username1;
    $_SESSION['password']=$password1;
    header("Location: ./secret.php");
}
