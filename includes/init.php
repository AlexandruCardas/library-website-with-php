<?php

// INITIALISE SESSION VARIABLES //

if (!isset($_SESSION['search_for'])) {
    $_SESSION['search_for'] = NULL;
}

if (!isset($_SESSION['search'])) {
    $_SESSION['search'] = FALSE;
}

if (!isset($_SESSION['logout'])) {
    $_SESSION['logout'] = FALSE;
}

if (!isset($_SESSION['profile_update'])) {
    $_SESSION['profile_update'] = 0;
}

if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "";
}

if (!isset($_SESSION['valid'])) {
    $_SESSION['valid'] = 0;
}

if (!isset($_SESSION['not_logged_message'])) {
    $_SESSION['not_logged_message'] = FALSE;
}

if (!isset($_SESSION['already_logged_message'])) {
    $_SESSION['already_logged_message'] = FALSE;
}

if (!isset($_SESSION['show_all'])) {
    $_SESSION['show_all'] = TRUE;
}
if (!isset($_SESSION['action_book'])) {
    $_SESSION['action_book'] = 0;
}

if (!isset($_SESSION['register_message'])) {
    $_SESSION['register_message'] = FALSE;
}

if (!isset($_SESSION['register_successful_message'])) {
    $_SESSION['register_successful_message'] = FALSE;
}

if (!isset($_SESSION['register_unsuccessful_message'])) {
    $_SESSION['register_unsuccessful_message'] = FALSE;
}

if (!isset($_SESSION['db_error'])) {
    $_SESSION['db_error'] = NULL;
}

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = NULL;
}

if (!isset($_SESSION['search_category'])) {
    $_SESSION['search_category'] = NULL;
}

// used for redirection inside the URL
if (!isset($_SESSION['page_number'])) {
    $_SESSION['page_number'] = 0;
}

// DEFINE PATHS //

define("MAIN_PATH", "/");
define("CSS_DIR", "/style/");
define("FUNCTIONS_PATH", "/functions/");
define("INCLUDES_PATH", "/includes/");

