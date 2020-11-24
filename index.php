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

        $_POST = array();
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

<head>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body style="background-color: #333;">

    <div class="loginForm">
        <img class="center" src="resources/logo.png" height=180></img>
        <form action="" method="post">
            <p class="text"><i class="fas fa-user"></i> Username: <input type="text" name="username"><br></p>
            <p class="text"><i class="fas fa-key"></i> Password: <input type="password" name="password"><br></p>
            <button class="loginButton" type="submit">Login</button>
        </form>
    </div>
    <p class="error">
        <?php
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