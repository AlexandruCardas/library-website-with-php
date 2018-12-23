<?php
/** @var $db_username */
/** @var $db_password */
/** @var $db_user_firstname */
/** @var $db_user_surname */
/** @var $db_user_address_1 */
/** @var $db_user_address_2 */
/** @var $db_user_city */
/** @var $db_user_telephone */
/** @var $db_user_mobile */

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $query = "SELECT * FROM users WHERE BINARY Username='$username' AND Password ='$password'";
    $authentication_user = mysqli_query($db, $query);

    // fetch data from the database
    while ($row = mysqli_fetch_array($authentication_user)) {
        $db_username = $row['Username'];
        $db_password = $row['Password'];
        $db_user_firstname = $row['Firstname'];
        $db_user_surname = $row['Surname'];
        $db_user_address_1 = $row['AddressLine1'];
        $db_user_address_2 = $row['AddressLine2'];
        $db_user_city = $row['City'];
        $db_user_telephone = $row['Telephone'];
        $db_user_mobile = $row['Mobile'];
    }

    // if authentication passes, initialise these session variables
    if ($username == $db_username && $password == $db_password) {
        $_SESSION['username'] = $db_username;
        $_SESSION['password'] = $db_password;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['surname'] = $db_user_surname;
        $_SESSION['address1'] = $db_user_address_1;
        $_SESSION['address2'] = $db_user_address_2;
        $_SESSION['city'] = $db_user_city;
        $_SESSION['telephone'] = $db_user_telephone;
        $_SESSION['mobile'] = $db_user_mobile;

        $_SESSION['valid'] = 1;
        header("Location: /main.php");
        exit();

    } else {
        $_SESSION['valid'] = -1;
        $_SESSION['db_error'] = mysqli_error($db);
        header("Location: /index.php");
        exit();
    }
}
