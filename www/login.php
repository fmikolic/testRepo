<?php
session_start();
require './data/helper.php';
require './data/config.php';

$connect=openConnection(DBCONNECTIONDATA);

$username1=$_POST['username'];
$password1=$_POST['password'];


$hashedPass=password_hash($password1, PASSWORD_DEFAULT);

$query="SELECT * FROM users WHERE username='".$username1."'";
$result=mysqli_query($connect,$query);
$adminRole=false;
$databasepass='';
foreach ($result as $row){
    $databasepass=$row['password'];

    if($row['admin_role']==="1")
        $adminRole=true;
}
if(mysqli_num_rows($result)==0){
    echo ('NO such user.');
}
else{
    if (!password_verify($password1, $databasepass)){
        echo ('Failed login');
    }
    else{
        $_SESSION['username']= $username1;
        $_SESSION['password']=$password1;
        $_SESSION['isAdmin']=$adminRole;
        header("Location: ./secret.php");
    }
}

closeConnection($connect);
