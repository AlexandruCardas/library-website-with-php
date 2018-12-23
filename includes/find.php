<?php
if (isset($_POST['search_submit'])) {
    $_SESSION['search_for'] = $_POST['search_for'];
    $_SESSION['search_category'] = $_POST['search_category'];
    $_SESSION['search'] = TRUE;
    header("Location: /Web_dev/assignment/search.php");
    exit();
}
