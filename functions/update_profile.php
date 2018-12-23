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

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE Username= '{$username}'";

$select_user_profile = mysqli_query($db, $query);

// fetch the information from the database
while ($row = mysqli_fetch_array($select_user_profile)) {
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

// put all the data into an array so we can loop through it
$my_array = array($db_user_firstname, $db_user_surname, $db_user_address_1, $db_user_address_2, $db_user_city, $db_user_telephone, $db_user_mobile);
$field_names = array("Firstname", "Surname", "Address_Line_1", "Address_Line_2", "City", "Telephone", "Mobile");

if (isset($_POST['update_profile'])) {
    $something_else = array();
    for ($i = 0; $i < sizeof($my_array); $i++) {
        $something_else[$i] = $_POST[$field_names[$i]];
    }

    $update_query = "UPDATE users SET Firstname ='{$something_else[0]}', Surname ='{$something_else[1]}', AddressLine1 ='{$something_else[2]}', AddressLine2 ='{$something_else[3]}', City ='{$something_else[4]}', Telephone ='{$something_else[5]}', Mobile ='{$something_else[6]}' WHERE Username='{$db_username}'";

    $sql = mysqli_query($db, $update_query);

    if ($sql) {
        $_SESSION['profile_update'] = 1;
        header("Location: main.php");
        exit();

    } else {
        $_SESSION['profile_update'] = -1;
        header("Location: profile.php");
        exit();
    }
}
