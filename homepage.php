<html>

<head>
    <?php
    include "database/database.php";
    include "database/validatesession.php";
    if (!$hasAccess) {
        header("Location: index.php");
        die;
    }
    ?>

    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body style="background-color: #333;">
    <div class="topnav">
        <a class="active" href="#home"><i class=" fas fa-home"></i></i> Home</a>
        <a class="btn" href="#books"><i class="fas fa-book"></i></i> Books</a>
        <a class="btn" href="#news"><i class="fas fa-pen-nib"></i> Authors</a>
        <a class="btn" href="#contact"><i class="fas fa-font"></i> Publishers</a>
        <a class="btn" href="pages/users.php"><i class="fas fa-user"></i> Users</a>
        <div class="topnav-right">
            <a href="pages/logout.php"><i class="fas fa-door-open"></i> Log Out</a>
        </div>
    </div>

    <p class=" bigText">Library Management System</p>
</body>

</html>