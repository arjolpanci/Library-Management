<html>

<head>
    <?php
    include "../database/database.php";
    include "../database/validatesession.php";
    if (!$hasAccess) {
        header("Location: ../index.php");
        die;
    }
    ?>

    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #333;">
    <div class="topnav">
        <a class="btn" href="../homepage.php"><i class="fas fa-home"></i></i> Home</a>
        <a class="btn" href="books.php"><i class="fas fa-book"></i></i> Books</a>
        <a class="btn" href="authors.php"><i class="fas fa-pen-nib"></i> Authors</a>
        <a class="btn" href="publishers.php"><i class="fas fa-font"></i> Publishers</a>
        <a class="active" href="users.php"><i class="fas fa-user"></i> Users</a>
        <div class="topnav-right">
            <a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a>
        </div>
    </div>

    <table id="styledtable">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
        </tr>

        <?php
        $query = "select * from users";
        $result = $dataAccess->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["ID"];
                $user = $row["user"];
                $pass = $row["pass"];
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $user . "</td>";
                echo "<td>" . $pass . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <form action="add-user.php">
        <button class="loginButton" type="submit">Add User</button>
    </form>

    <p class="error">
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
        }
        ?>
    </p>
    <p class="success">
        <?php
        if (isset($_SESSION["success"])) {
            echo $_SESSION["success"];
        }
        ?>
    </p>

</body>

</html>

<?php

unset($_SESSION["error"]);
unset($_SESSION["success"]);

?>