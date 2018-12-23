<?php
// acts as a controller for all the other pages
require_once("db.php");

ob_start();
session_start();

require_once("init.php");
require_once("find.php");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo CSS_DIR ?>css.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <title>Books</title>
</head>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark mb-2 fixed-top">
    <a class="navbar-brand" href="#">
        <h1 class="text-danger">
            <i class="fas fa-book"></i> Library</h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navbar-dark bg-dark" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php if ($_SESSION['valid'] === 1) { ?>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo MAIN_PATH ?>main.php">Home <span
                            class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo MAIN_PATH ?>profile.php">Profile</a>
                    <a class="dropdown-item" href="<?php echo MAIN_PATH ?>reservations.php">Reservations</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo FUNCTIONS_PATH ?>logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-group form-group mr-sm-2">
                <label for="inputGroupSelect04"></label>
                <select class="custom-select" id="inputGroupSelect04"
                        aria-label="Example select with button addon " name="search_category">
                    <?php
                    $query = "SELECT CategoryDetails FROM category";
                    $get_category = mysqli_query($db, $query);
                    echo "<option value='None'>";
                    echo "None";
                    echo "</option>";

                    while ($row = mysqli_fetch_array($get_category)) {
                        for ($i = 0; $i < 1; $i++) {
                            echo "<option value='$row[$i]'>";
                            echo(htmlentities($row[$i]));
                            echo "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                   name="search_for">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search_submit">
        </form>
        <?php } ?>
    </div>
</nav>

<body class="d-flex h-100 mx-auto flex-column">







