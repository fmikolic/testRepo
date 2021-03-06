<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript">
        function checkInput() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (!(username == "") && !(password == "")) {
                //alert("PRolazim empty check");
                return true;
            } else {
                alert("Unesite username i/ili password!");
                return false;
            }
        }
    </script>
    <title>Testiranje</title>
</head>
<body class="text-center">
<header>
</header>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<div class="mx-auto" style="width: 25%; margin-top: 10%">

    <form class="form-signin" action="login.php" method="post" onsubmit="return checkInput()">
        <img class="mb-4" src="./imgs/packaging.png" alt width="72" height="72">
        <h2 class="h2 mb-3 font-weight-bold">Login </h2>
        <div class="form-group">
            <input class="form-control" type="text" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" id="password" name="password" placeholder="Password">
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Submit">
    </form>
</div>
<footer>
</footer>
</body>
</html>