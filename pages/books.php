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
        <a class="btn" href="../homepage.php" onclick="onButtonClick(this)"><i class="fas fa-home"></i></i> Home</a>
        <a class="active" href="books.php" onclick="onButtonClick(this)"><i class="fas fa-book"></i></i> Books</a>
        <a class="btn" href="authors.php" onclick="onButtonClick(this)"><i class="fas fa-pen-nib"></i> Authors</a>
        <a class="btn" href="publishers.php" onclick="onButtonClick(this)"><i class="fas fa-font"></i> Publishers</a>
        <a class="btn" href="users.php" onclick="onButtonClick(this)"><i class="fas fa-user"></i> Users</a>
        <div class="topnav-right">
            <a href="logout.php"><i class="fas fa-door-open"></i> Log Out</a>
        </div>
    </div>

    <table id="styledtable">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
        </tr>

        <?php
        $query = "select * from books";
        $result = $dataAccess->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["ID"];
                $title = $row["Title"];
                $authorID = $row["AuthorID"];
                $publisherID = $row["PublisherID"];
                $authorName = $dataAccess->getAuthorFromId($authorID);
                $publisherName = $dataAccess->getPublisherFromId($publisherID);
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $title . "</td>";
                echo "<td>" . $authorName . "</td>";
                echo "<td>" . $publisherName . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <form action="add-book.php">
        <button class="loginButton" type="submit">Add Book</button>
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