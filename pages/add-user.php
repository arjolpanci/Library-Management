<html>

<head>
    <?php
    include "../database/database.php";
    include "../database/validatesession.php";
    if (!$hasAccess) {
        $_SESSION["error"] = "Could not access the database!";
        header("Location: ../index.php");
        die;
    }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $uname = $_POST['username'];
        $passw = $_POST['password'];

        if ($uname == "" || $passw == "") {
            $_SESSION["error"] = "Could not add user!";
            header("Location: users.php");
            die;
        }

        $attempt = $dataAccess->addUser($uname, $passw);

        if ($attempt) {
            $_SESSION["success"] = "User added successfully!";
            header("Location: users.php");
            die;
        } else {
            $_SESSION["error"] = "Could not add user!";
            header("Location: users.php");
            die;
        }
    }
    ?>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #333;">

    <div class="loginForm">
        <form action="" method="post">
            <p class="text"><i class="fas fa-user"></i> Username: <input type="text" name="username"><br></p>
            <p class="text"><i class="fas fa-key"></i> Password: <input type="password" name="password"><br></p>
            <button class="loginButton" type="submit">Add User</button>
        </form>
    </div>

</body>

</html>