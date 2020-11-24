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
    if (isset($_POST['Name']) && isset($_POST['Surname'])) {
        $fname = $_POST['Name'];
        $lname = $_POST['Surname'];

        if ($fname == "" || $lname == "") {
            $_SESSION["error"] = "Could not add author!";
            header("Location: authors.php");
            die;
        }

        $attempt = $dataAccess->addAuthor($fname, $lname);

        if ($attempt) {
            $_SESSION["success"] = "Author added successfully!";
            header("Location: authors.php");
            die;
        } else {
            $_SESSION["error"] = "Could not add author!";
            header("Location: authors.php");
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
            <p class="text"><i class="fas fa-signature"></i> Name: <input type="text" name="Name" style="margin:0 0 0 25px"><br></p>
            <p class="text"><i class="fas fa-signature"></i> Surname: <input type="text" name="Surname"><br></p>
            <button class="loginButton" type="submit">Add Author</button>
        </form>
    </div>

</body>

</html>