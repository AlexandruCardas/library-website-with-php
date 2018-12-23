<?php

// MESSAGES FOR ACROSS PAGES

if ($_SESSION['valid'] === -1) {
    echo "<div class='alert alert-danger' role = 'alert' >Login Failed!";
    echo $_SESSION["db_error"];
    echo "</div>";
    $_SESSION['valid'] = 0;
}

if ($_SESSION['profile_update'] === 1) {
    echo "<div class='alert alert-success' role = 'alert' >Profile Updated!</div > ";
    $_SESSION['profile_update'] = 0;
}

if ($_SESSION['profile_update'] === -1) {
    echo "<div class='alert alert-danger' role='alert'>Not updated!</div>";
    $_SESSION['profile_update'] = 0;
}

if ($_SESSION['already_logged_message'] === TRUE) {
    echo "<div class='alert alert-danger' role = 'alert' >Already Logged IN!</div > ";
    $_SESSION['already_logged_message'] = FALSE;
}

if ($_SESSION['not_logged_message'] === TRUE) {
    echo "<div class='alert alert-danger' role = 'alert' >Not logged in!</div > ";
    $_SESSION['not_logged_message'] = FALSE;
}

if ($_SESSION['register_unsuccessful_message'] === TRUE) {
    echo "<div class='alert alert-danger' role = 'alert' >Not Created!";
    echo $_SESSION["db_error"];
    echo "</div>";
    $_SESSION['register_unsuccessful_message'] = FALSE;
}

if ($_SESSION['register_successful_message'] === TRUE) {
    echo "<div class='alert alert-success' role = 'alert' >Account Created!</div > ";
    $_SESSION['register_successful_message'] = FALSE;
}