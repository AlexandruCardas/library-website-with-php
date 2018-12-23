<?php

function before_authentication()
{
    if ($_SESSION['valid'] != 1) {
        $_SESSION['not_logged_message'] = TRUE;
        header("Location: /index.php");
        exit();
    }
}

function after_authentication()
{
    if ($_SESSION['valid'] == 1) {
        $_SESSION['already_logged_message'] = TRUE;
        header("Location: /main.php");
        exit();
    }
}