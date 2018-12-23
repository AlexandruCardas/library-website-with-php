<?php
require_once("includes/header.php");

require_once("functions/authentication.php");
before_authentication();

require_once("functions/messages.php");
require_once("functions/update_profile.php");
?>
<div class="container mb-5" id="update_form">
    <div class="row justify-content-md-center">
        <div class="col col-lg-4 mt-5">
            <h1><?php echo $_SESSION['username']; ?> profile</h1>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <form method="post">
                <?php
                for ($i = 0; $i < sizeof($my_array); $i++) {
                    echo "<div class='form-group'>
                    <label for='exampleInputEmail1'>$field_names[$i]</label>
                    <input type='text' class='form-control' placeholder='Enter $field_names[$i]' name='$field_names[$i]'
                     required value='$my_array[$i]'></div>";
                }
                ?>
                <button type="submit" class="btn btn-primary" name="update_profile">Update</button>
            </form>
        </div>
    </div>
</div>

<?php require_once("includes/footer.php"); ?>



