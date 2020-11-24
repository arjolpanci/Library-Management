<?php
session_start();
include "database/database.php";

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $user = $_SESSION["username"];
    $pass = $_SESSION["password"];

    $hasAccess = $dataAccess->validateLogin($user, $pass);
    if ($hasAccess) {
        header("Location: homepage.php");
    }
}

if (isset($_POST['username'])) {
    $uname = $_POST['username'];
    $passw = $_POST['password'];

    $hasAccess = $dataAccess->validateLogin($uname, $passw);

    if ($hasAccess) {
        $_SESSION["username"] = $uname;
        $_SESSION["password"] = $passw;

        header("Location: homepage.php");
        exit();
    } else {
        header("Location: index.php");
        $_SESSION["error"] = "That username and password combination does not exist!";
        exit();
    }
}

?>

<html>

<body>

    <form action="" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit">
    </form>

    <p> <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
        }
        ?>
    </p>
</body>

</html>

<?php

unset($_SESSION["error"]);

?>