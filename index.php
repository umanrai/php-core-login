<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">

    <title>Login</title>
</head>
<body>

<h3>Login</h3>

<form action="includes/login.inc.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="pwd" placeholder="Password">
    <button>Login</button>
</form>

<h3>Signup</h3>

<form action="includes/signup.inc.php" method="post">
    <?php
        signup_input();
    ?>

    <button>Signup</button>
</form>

<?php

var_dump($_SESSION);
check_signup_errors();

?>


</body>

</html>
