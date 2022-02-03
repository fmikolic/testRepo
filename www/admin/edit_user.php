<?php
require '../data/helper.php';
require '../data/config.php';
session_start();
$connect = openConnection(DBCONNECTIONDATA);
$user_id = '';
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $_SESSION['id'] = $user_id;
}
$query = "select * from users where id_user='" . (int)$user_id . "'";
$result2 = mysqli_query($connect, $query);
$usernameData = '';
$passwordData = '';
$firstnameData = '';
$lastnameData = '';
$addressData = '';
$isActiveDAta = '';
$birthDAta = '';
foreach ($result2 as $row) {
    $usernameData = $row['username'];
    $passwordData = $row['password'];
    $firstnameData = $row['first_name'];
    $lastnameData = $row['last_name'];
    $addressData = $row['address'];
    $isActiveDAta = $row['is_active'];
    $birthDAta = $row['birthdate'];
}
//add user
if (isset($_POST['insert'])) {
    $usernameUpdate = $_POST['username'];
    $password1Update = $_POST['password'];
    $password2Update = $_POST['password1'];
    $fnameUpdate = $_POST['firstname'];
    $lnameUpdate = $_POST['lastname'];
    $addressUpdate = $_POST['address'];
    $birthUpdate = $_POST['birthdate'];
    if (mysqli_num_rows($result2) == 0) {
        if ($password1Update === $password2Update) {
            $pw1UpdateHashed = password_hash($password1Update, PASSWORD_BCRYPT);
            $newUserQ = "INSERT INTO users(username, password, first_name, last_name, address, birthdate) VALUES ('" . $usernameUpdate . "', '" . $pw1UpdateHashed . "', '" . $fnameUpdate . "', '" . $lnameUpdate . "', '" . $addressUpdate . "', '" . $birthUpdate . "')";
            $result3 = mysqli_query($connect, $newUserQ);
            if ($result3) {
                echo('Data updated!');
            } else {
                echo("Data not updated -----------");
            }
        } else {
            echo 'Passwordi nisu isti!';
        }
    }
    return header("Location: ./users.php");
}
//update user
if (isset($_POST['update'])) {
    $usernameUpdate = $_POST['username'];
    $password1Update = $_POST['password'];
    $password2Update = $_POST['password1'];
    $fnameUpdate = $_POST['firstname'];
    $lnameUpdate = $_POST['lastname'];
    $addressUpdate = $_POST['address'];
    $birthUpdate = $_POST['birthdate'];
    if ($password1Update === '' && $password2Update === '') {
        $updatequery1 = "UPDATE users SET username='" . $usernameUpdate . "', first_name='" . $fnameUpdate . "', last_name='" . $lnameUpdate . "', address='" . $addressUpdate . "', birthdate='" . $birthUpdate . "' WHERE id_user='" . (int)$_SESSION['id'] . "'";
        $result = mysqli_query($connect, $updatequery1);

        if ($result) {
            echo('Data updated!');
        } else {
            echo("Data not updated -----------");
        }
    } elseif ($password1Update !== $password2Update) {
        echo('Passwordi nisu isti');
    } elseif ($password1Update === $password2Update) {
        $pw1UpdateHashed = password_hash($password1Update, PASSWORD_BCRYPT);
        $updatequery2 = "UPDATE users SET username='" . $usernameUpdate . "',password='" . $pw1UpdateHashed . "', first_name='" . $fnameUpdate . "', last_name='" . $lnameUpdate . "', address='" . $addressUpdate . "', birthdate='" . $birthUpdate . "' WHERE id_user='" . (int)$_SESSION['id'] . "'";
        $result1 = mysqli_query($connect, $updatequery2);

        if ($result1) {
            echo('Data updated!');
        } else {
            echo("Data not updated -----------");
        }
    }
    return header("Location: ./users.php");
}
$title = "Edit or add users";
include('../header.php');
?>
<div class="table-responsive mx-auto" style="width: 35%; margin-bottom: 3%">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light " style="opacity: 0.9">
        <form action="edit_user.php" method="post">
            <div class="mx-auto" style="width: 350px; height: 350px; overflow-y: scroll; overflow-x: hidden">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input class="form-control" type="text" id="username" name="username"
                           value=<?php echo $usernameData ?>>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password1">Repeat password:</label>
                    <input class="form-control" type="password" id="password1" name="password1">
                </div>
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input class="form-control" type="text" id="firstname" name="firstname"
                           value=<?php echo $firstnameData ?>>
                </div>
                <div class="form-group">
                    <label for="lastname">Last name:</label>
                    <input class="form-control" type="text" id="lastname" name="lastname"
                           value=<?php echo $lastnameData ?>>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input class="form-control" type="text" id="address" name="address"
                           value=<?php echo $addressData ?>>
                </div>
                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
                    <input class="form-control" type="date" id="birthdate" name="birthdate"
                           value=<?php echo $birthDAta ?>>
                </div>
            </div>
            <?php
            if ($user_id == '') {
                ?>
                <input class="btn btn-primary" type="submit" name="insert" value="Add user">
                <?php
            } else {
                ?>
                <input class="btn btn-primary" type="submit" name="update" value="Update">
                <?php
            }
            ?>
        </form>
    </div>
</div>
<?php
include('../footer.php');
closeConnection($connect);
?>

