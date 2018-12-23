<?php
$username = $_SESSION['username'];

// Switches the buttons function depending on the page

if (isset($_GET['action']) && (isset($_GET['id']))) {
    $id = $_GET['id'];

    if ($_GET['action'] == "Return") {
        $query = "DELETE FROM reservations WHERE ISBN='$id'";
        $sql = mysqli_query($db, $query);

        $update_query = "UPDATE books SET Reserved='N' WHERE ISBN='$id'";
        $sql = mysqli_query($db, $update_query);

        header("Location: $_SERVER[PHP_SELF]?pageno=$_SESSION[page_number]");
        exit();
    }

    $today = date("Y-m-d");
    if ($_GET['action'] == "Reserve") {

        $query = "INSERT INTO reservations VALUES('$id', '$username', '$today')";
        $sql = mysqli_query($db, $query);

        $update_query = "UPDATE books SET Reserved='Y' WHERE ISBN='$id'";
        $sql = mysqli_query($db, $update_query);

        header("Location: $_SERVER[PHP_SELF]?pageno=$_SESSION[page_number]");
        exit();
    }
}
