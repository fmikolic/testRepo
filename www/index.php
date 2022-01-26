<?php

?>
<html>
<head>
<title>My Page</title>
</head>
<body>
<h2>PHPINFO---------- <?php echo phpinfo(); ?></h2>

<form action="login.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required="true">
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required="true">

    <button type="submit">Login</button>
</form>


</body>
</html>