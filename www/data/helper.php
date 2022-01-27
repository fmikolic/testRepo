
<?php


function openConnection(array $conndata){
    $connection = mysqli_connect($conndata["dbhost"],$conndata["dbuser"],$conndata["dbpass"],$conndata["db"]);
    return $connection;
}

function closeConnection($connection){
    $connection->close();
}
?>