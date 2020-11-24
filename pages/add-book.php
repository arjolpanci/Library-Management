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
    if (isset($_POST['Title']) && isset($_POST['Author']) && isset($_POST['Publisher'])) {
        $Title = $_POST['Title'];
        $AuthorID = $_POST['Author'];
        $PublisherID = $_POST['Publisher'];

        if ($Title == "" || $AuthorID == null || $PublisherID == null) {
            $_SESSION["error"] = "Could not add book!";
            header("Location: books.php");
            die;
        }

        $attempt = $dataAccess->addBook($Title, $AuthorID, $PublisherID);

        if ($attempt) {
            $_SESSION["success"] = "Book added successfully!";
            header("Location: books.php");
            die;
        } else {
            $_SESSION["error"] = "Could not add book!";
            header("Location: books.php");
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
            <p class="text" style="margin:0 0 0 11px;"><i class="fas fa-heading"></i> Title: <input type="text" name="Title" style="width:72%; margin: 0 0 0 35px;"><br></p>

            <div class="combobox" style="width:100%;">
                <label for="authors" style="color: white; font-family: Verdana; width:25%"><i class="fas fa-pen-nib"></i> Author:</label>
                <select name="Author" id="authors" style="height:35px; width:70%; margin: 0 0 0 17px;">
                    <?php
                    $query = "select * from authors";
                    $result = $dataAccess->conn->query($query);

                    if (mysqli_num_rows($result) != 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $fname = $row["Name"];
                            $lname = $row["Surname"];
                            $fullname = $fname . " " . $lname;
                            echo "<option value=" . "\"" . $id . "\"" . ">" . $fullname . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>


            <div class="combobox" style="width:100%;">
                <label for="publishers" style="color: white; font-family: Verdana; width:25%"><i class="fas fa-font"></i> Publisher:</label>
                <select name="Publisher" id="publishers" style="height:35px; width:70%;">
                    <?php
                    $query = "select * from publishers";
                    $result = $dataAccess->conn->query($query);

                    if (mysqli_num_rows($result) != 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row["ID"];
                            $name = $row["Name"];
                            echo "<option value=" . "\"" . $id . "\"" . ">" . $name . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button class="loginButton" type="submit">Add Book</button>
        </form>
    </div>

</body>

</html>