<?php
session_start();
require '../data/helper.php';
require '../data/config.php';
$connect = openConnection(DBCONNECTIONDATA);
$query = "select * from users";
$result = mysqli_query($connect, $query);

$title = "List of users";
include "../header.php";
?>
<h2 class="h2 mb-3 font-weight-bold">List of existing users</h2>
<div class="mx-auto" style="width: 40%;margin-bottom: 5%; overflow-x: auto; ">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light " style="opacity: 0.9">
        <?php
        echo "<table id='tablica' class='display'>";
        echo "<thead>
    <tr>
        <th scope='col'>ID</th> 
        <th scope='col'>Username</th>
        <th scope='col'>First name</th>
        <th scope='col'>Last name</th>
        <th scope='col'>Edit option</th>
    </tr>
    </thead>
    <tbody>";

        foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $row['id_user'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><a class='btn btn-primary' href="edit_user.php?id=<?php echo $row['id_user'] ?>"
                       type='submit'>EDIT</a>
                </td>
            </tr>

            <?php
        }
        echo "</tbody></table>";
        closeConnection($connect);
        ?>
        <script>
            $(document).ready(function () {
                $('#tablica').DataTable({});
            });
        </script>
        <a class='btn btn-primary mt-3' href="edit_user.php" type='submit'>ADD NEW USER</a>
    </div>
</div>
<?php
include "../footer.php";
?>




