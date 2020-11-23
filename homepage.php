<html>

<head>
    <?php
    session_start();
    if (!array_key_exists("username", $_SESSION)) die("You have no access to this page!");
    include "database/database.php";

    $user = $_SESSION["username"];
    $pass = $_SESSION["password"];

    $hasAccess = $dataAccess->validateLogin($user, $pass);

    if (!$hasAccess) {
        die("You have no access to this page!");
    }
    ?>
</head>

<body>
    <h1>Welcome</h1>
</body>

</html>