<?php
require_once("../includes/header.php");

session_destroy();
ob_end_clean();

header("Location: /Web_dev/assignment/index.php");
exit();
