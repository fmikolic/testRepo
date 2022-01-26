<?php

?>
<html>
<head>
<title>My Page</title>
</head>
<body>

<form action="/login.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required="true"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required="true"><br>

    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>