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
    if (isset($_POST['Name']) && isset($_POST['Type'])) {
        $Name = $_POST['Name'];
        $Type = $_POST['Type'];

        if ($Name == "" || $Type == "") {
            $_SESSION["error"] = "Could not add publisher!";
            header("Location: publishers.php");
            die;
        }

        $attempt = $dataAccess->addPublisher($Name, $Type);

        if ($attempt) {
            $_SESSION["success"] = "Publisher added successfully!";
            header("Location: publishers.php");
            die;
        } else {
            $_SESSION["error"] = "Publisher not add author!";
            header("Location: publishers.php");
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
            <p class="text"><i class="fas fa-font"></i> Name: <input type="text" name="Name"><br></p>
            <p class="text"><i class="fas fa-highlighter"></i> Type: <input type="text" name="Type" style="margin: 0 0 0 7px;"><br></p>
            <button class="loginButton" type="submit">Add Publisher</button>
        </form>
    </div>

</body>

</html>