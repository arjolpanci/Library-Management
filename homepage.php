<html>

<head>
    <?php
    session_start();
    if (!array_key_exists("username", $_SESSION)) header("Location: index.php");;
    include "database/database.php";

    $user = $_SESSION["username"];
    $pass = $_SESSION["password"];

    $hasAccess = $dataAccess->validateLogin($user, $pass);

    if (!$hasAccess) {
        header("Location: index.php");
    }
    ?>

    <script type="text/javascript">
        function onButtonClick(clickedButton) {
            var current = document.getElementsByClassName("active");
            current[0].className = "btn";
            clickedButton.className = "active";
        }

        var topNav = document.getElementsByClassName("topnav");
        var buttons = document.getElementsByClassName("btn");
    </script>

    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body>
    <div class="topnav">
        <a class="active" href="#home" onclick="onButtonClick(this)"><i class="fas fa-book"></i></i> Books</a>
        <a class="btn" href="#news" onclick="onButtonClick(this)"><i class="fas fa-pen-nib"></i> Authors</a>
        <a class="btn" href="#contact" onclick="onButtonClick(this)"><i class="fas fa-font"></i> Publishers</a>
        <a class="btn" href="#about" onclick="onButtonClick(this)"><i class="fas fa-user"></i> Users</a>
    </div>
</body>

</html>