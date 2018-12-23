<?php
require_once("includes/header.php");

require_once("functions/authentication.php");
before_authentication();

require_once("functions/messages.php");

// switches the function of pagination and buttons
$_SESSION['show_all'] = FALSE;
$_SESSION['action_book'] = "Return";
$_SESSION['search'] = FALSE;

?>
    <main class="container-fluid">
        <div class="row justify-content-center text-center mt-5">
            <div class="col col-lg-6">
                <h1>Reservations by <?php echo $_SESSION['username'] ?></h1>
            </div>
        </div>
    </main>
<?php
require_once("functions/action_book.php");
require_once("functions/pagination.php");
require_once("includes/footer.php");