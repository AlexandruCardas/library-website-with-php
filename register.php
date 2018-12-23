<?php
require_once("includes/header.php");
require_once("functions/messages.php");

require_once("functions/authentication.php");
after_authentication();

require_once("functions/register_user.php");
?>
    <div class="container-fluid mb-5">
        <div class="row justify-content-md-center">
            <div class="col col-lg-5 mt-5">
                <h1>Register</h1>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-lg-5">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label class="control-label text-info" for="input_username">Username</label>
                            <input type="text" class="form-control" id="input_username" placeholder="Username"
                                   name="username"
                                   minlength="6" maxlength="24" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label text-info" for="input_password">Password</label>
                            <input type="password" class="form-control" id="input_password" placeholder="Password"
                                   name="password" minlength="6" maxlength="24" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" class="control-label">Firstname</label>
                            <input type="text" class="form-control" placeholder="Firstname"
                                   name="firstname" minlength="6" maxlength="24" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="control-label">Surname</label>
                            <input type="text" class="form-control" placeholder="Surname"
                                   name="surname" minlength="6" maxlength="24" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" placeholder="1234 Main St"
                               name="address_1">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2"
                               placeholder="Apartment, studio, or floor" name="address_2">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="input_city" class="control-label">City</label>
                            <input type="text" class="form-control" id="input_city" name="city" placeholder="Dublin"
                                   required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input_tel">Telephone</label>
                            <input type="tel" class="form-control" id="input_tel" name="telephone"
                                   placeholder="(01)-000-0000" pattern="^01\d{3}\d{4}$"
                                   minlength="9" maxlength="9">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="input_mobile" class="control-label">Mobile</label>
                            <input type="tel" class="form-control" id="input_mobile" name="mobile"
                                   placeholder="080-0000-000" pattern="^08\d{1}\d{3}\d{4}$"
                                   minlength="10" maxlength="10" required>
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="col">
                            <a href="index.php">Already have an account?</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-lg btn-primary ml-2" name="register">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once("includes/footer.php");
