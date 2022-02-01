<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Secret tab</title>
</head>
<body class="text-center">
<header>
    <?php
    include ('header.php');
    ?>
</header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<h2 class="h2 mb-3 font-weight-bold">Data for logged user</h2>
<div class="table-responsive mx-auto" style="width: 25%" >
    <?php
    require './data/helper.php';
    require './data/config.php';
    $connect=openConnection(DBCONNECTIONDATA);
    $username1=$_SESSION['username'];

    $query="select secret_data.data from secret_data left join users on secret_data.user_id=users.id_user where users.username='".$username1."'";
    $result=mysqli_query($connect,$query);
    echo "<table class='table table-dark table-striped table-sm table-hover'>";
    echo "<thead><tr><th scope='col'>Data for user</th></tr></thead>";
        foreach($result as $row){
            echo "<tr><td>" . $row['data'] . "</td></tr>";
        }
    echo "</table>";

    closeConnection($connect);
    ?>

<?php
    $adminRole=$_SESSION['isAdmin'];
    if($adminRole==true){
        ?>
        <button class="btn btn-info btn-block" onclick="window.location.href='admin/users.php'" type="button">Admin page</button>
<?php
    }

?>
</div>

<footer>
    <?php
    include ('footer.php');

    ?>
</footer>

</body>
</html>



