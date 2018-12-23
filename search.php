<?php
require_once("includes/header.php");

require_once("functions/authentication.php");
before_authentication();

require_once("functions/messages.php");

// switches the function of pagination and buttons
$_SESSION['show_all'] = FALSE;
$_SESSION['action_book'] = "Return";
$_SESSION['search'] = TRUE;

?>
    <main class="container-fluid">
        <div class="row justify-content-center text-center mt-5">
            <div class="col col-lg-6">
                <h1>Search for
                    "<?php echo $_SESSION['search_category'] === "None" ? $_SESSION['search_for'] : $_SESSION['search_category'] ?>
                    "</h1>
            </div>
        </div>
    </main>
<?php
require_once("functions/action_book.php");
require_once("functions/pagination.php");

// used to show the amount of results for the search
if ($_SESSION['counter'] == 0) {
    echo "<div class='alert alert-danger' role='alert'>No matches!</div>";
} else {
    echo "<div class='alert alert-success' role='alert'>We have found $_SESSION[counter] entries!</div>";
}
$_SESSION['counter'] = 0;
require_once("includes/footer.php");

