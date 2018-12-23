<?php
// register user function
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $address_1 = mysqli_real_escape_string($db, $_POST['address_1']);
    $address_2 = mysqli_real_escape_string($db, $_POST['address_2']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $telephone = mysqli_real_escape_string($db, $_POST['telephone']);
    $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

    $query = "INSERT INTO users VALUES ('$username', '$password', '$firstname', '$surname', '$address_1', '$address_2', '$city', '$telephone', '$mobile')";

    $result = mysqli_query($db, $query);
    if ($result) {
        $_SESSION['register_successful_message'] = TRUE;
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['register_unsuccessful_message'] = TRUE;
        $_SESSION['db_error'] = mysqli_error($db);
    }
}
?>