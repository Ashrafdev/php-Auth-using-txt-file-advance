<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="loginform cf">
    <center>
        <br>
        <?php
        if (!isset($_SESSION['is_auth'])) :
            echo '<b>login Required! you will redirect to login page</b>';
            header("refresh:3; url=login.php");
            die;
        else:
            $r = '<b>' . 'Welcome ' . $_SESSION['username'] . ' to Dasboard </b>';
            $r .= '<a href="logout.php">Click here for logout</a>';
            echo $r;
        endif;
        ?>
        <br>
    </center>
</section>
</body>
</html>