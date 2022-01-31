<?php
require '../data/helper.php';
require '../data/config.php';
session_start();

$connect=openConnection(DBCONNECTIONDATA);
$user_id='';
if(isset($_GET["id"])){
    $user_id=$_GET["id"];
    $_SESSION['id']=$user_id;
}



$query="select * from users where id_user='".(int) $user_id."'";
$result2=mysqli_query($connect,$query);
$usernameData='';
$passwordData='';
$firstnameData='';
$lastnameData='';
$addressData='';
$isActiveDAta='';
$birthDAta='';
foreach ($result2 as $row){
    $usernameData=$row['username'];
    $passwordData=$row['password'];
    $firstnameData=$row['first_name'];
    $lastnameData=$row['last_name'];
    $addressData=$row['address'];
    $isActiveDAta=$row['is_active'];
    $birthDAta=$row['birthdate'];
}

if(isset($_POST['update'])){
    $usernameUpdate=$_POST['username'];
    $password1Update=$_POST['password'];
    $password2Update=$_POST['password1'];
    $fnameUpdate=$_POST['firstname'];
    $lnameUpdate=$_POST['lastname'];
    $addressUpdate=$_POST['address'];
    $birthUpdate=$_POST['birthdate'];

    if($password1Update==='' && $password2Update===''){
        $updatequery1="UPDATE users SET username='".$usernameUpdate."', first_name='".$fnameUpdate."', last_name='".$lnameUpdate."', address='".$addressUpdate."', birthdate='".$birthUpdate."' WHERE id_user='".(int) $_SESSION['id']."'";
        $result=mysqli_query($connect,$updatequery1);

        if($result){
            echo ('Data updated!');
        }else{
            echo ("Data not updated -----------");
        }
    }elseif ($password1Update!==$password2Update){
        echo ('Passwordi nisu isti');
    }elseif ($password1Update===$password2Update){
        $pw1UpdateHashed=password_hash($password1Update, PASSWORD_BCRYPT);
        $updatequery2="UPDATE users SET username='".$usernameUpdate."',password='".$pw1UpdateHashed."', first_name='".$fnameUpdate."', last_name='".$lnameUpdate."', address='".$addressUpdate."', birthdate='".$birthUpdate."' WHERE id_user='".(int) $_SESSION['id']."'";
        $result1=mysqli_query($connect,$updatequery2);

        if($result1){
            echo ('Data updated!');
        }else{
            echo ("Data not updated -----------");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit usera</title>
</head>
<body class="text-center">
<header>
    <?php
    include ('../header.php');
    ?>
</header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<h2 class="h2 mb-3 font-weight-normal">EDIT form</h2>
<div class="mx-auto" style="width: 25%" >
    <form action="edit_user.php" method="post" >

        <div class="form-group">
            <label for="username" >Username:</label>
            <input class="form-control" type="text" id="username" name="username" value=<?php echo $usernameData ?>>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password" >
        </div>
        <div class="form-group">
        <label for="password1">Repeat password:</label>
        <input class="form-control" type="password" id="password1" name="password1" >
        </div>
        <div class="form-group">
        <label for="firstname">First name:</label>
        <input class="form-control" type="text" id="firstname" name="firstname" value=<?php echo $firstnameData ?>>
        </div>
        <div class="form-group">
        <label for="lastname">Last name:</label>
        <input class="form-control" type="text" id="lastname" name="lastname" value=<?php echo $lastnameData ?>>
        </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input class="form-control" type="text" id="address" name="address" value=<?php echo $addressData ?>>
    </div>
    <div class="form-group">
        <label for="birthdate">Birthdate:</label>
        <input class="form-control" type="date" id="birthdate" name="birthdate" value=<?php echo $birthDAta ?>>
    </div>


        <input class="btn btn-primary" type="submit" name="update" value="Update" >
    </form>
</div>

<footer>
    <?php
    include ('../footer.php');
    closeConnection($connect);
    ?>
</footer>

</body>
</html>
