<?php
require_once("includes/header.php");

require_once("functions/authentication.php");
after_authentication();

require_once("functions/messages.php");
require_once("functions/check_login.php");
?>
    <div class="container-fluid" id="login_form">
        <div class="row justify-content-md-center">
            <div class="col col-md-5 mt-5">
                <h1>Login</h1>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-md-5">
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Enter username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               placeholder="Enter password"
                               name="password" required>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <a href="register.php">Need an account?</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-lg btn-primary" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once("includes/footer.php"); ?>