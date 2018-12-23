<?php
require_once("includes/header.php");

require_once("functions/authentication.php");
before_authentication();

require_once("functions/messages.php");

// switches the function of pagination and buttons
$_SESSION['show_all'] = TRUE;
$_SESSION['action_book'] = "Reserve";
$_SESSION['search'] = FALSE;

?>
    <main class="container-fluid mt-5">
        <div class="row justify-content-center text-center ">
            <div class="col col-lg-6">
                <h1>Books available to rent for <?php echo $_SESSION['username'] ?></h1>
            </div>
        </div>
    </main>
<?php

require_once("functions/action_book.php");
require_once("functions/pagination.php");
require_once("includes/footer.php");