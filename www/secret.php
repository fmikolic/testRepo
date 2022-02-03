<?php
session_start();
$title='User data';
include('header.php');
?>

<h2 class="h2 mb-3 font-weight-bold">Data for logged user</h2>
<div class="table-responsive mx-auto" style="width: 35%; margin-bottom: 3%">
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light " style="opacity: 0.9">
        <?php
        require './data/helper.php';
        require './data/config.php';
        $connect = openConnection(DBCONNECTIONDATA);
        $username1 = $_SESSION['username'];

        $query = "select secret_data.data from secret_data left join users on secret_data.user_id=users.id_user where users.username='" . $username1 . "'";
        $result = mysqli_query($connect, $query);
        echo "<table id='table1' class='display'>";
        echo "<thead><tr><th scope='col'>Data for user</th></tr></thead><tbody>";
        foreach ($result as $row) {
            echo "<tr><td>" . $row['data'] . "</td></tr>";
        }
        echo "</tbody></table>";

        closeConnection($connect);

        $adminRole = $_SESSION['isAdmin'];
        if ($adminRole == true) {
            ?>
            <button class="btn btn-info btn-block" onclick="window.location.href='admin/users.php'" type="button">Admin
                page
            </button>

            <?php
        } ?>
        <script>
            $(document).ready(function () {
                $('#table1').DataTable({});
            });
        </script>
    </div>
</div>
<?php

include('footer.php');
?>



