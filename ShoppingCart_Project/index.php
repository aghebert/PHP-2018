<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/11/18
 * Time: 4:03 PM
 *
 * Shopping Cart Project
 */


require_once("assets/dbconn.php");


include_once("assets/header.php");
require_once("assets/login_register_controller.php");

//connect to database
$db = dbConn();
//$user_key = $_SESSION['user_Key'];
$_POST['whereami']= '2';
echo $_POST['whereami'];


// get the data from user, if any, and sanitize it.
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? null;
$searchTerm = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_URL) ?? filter_input(INPUT_POST, 'term', FILTER_SANITIZE_URL) ?? null;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
$email;

switch ($action) {

//brings the user to the Admin login and registration page
    case "ADMIN":

        $_POST['whereami']  = "ADMIN";

        echo "<div class=\"container\">";
        echo "<h1>Administrator Login / Registration</h1>";
        echo "</div>";
        include_once("assets/login_register_interface.php");
//checkPOST();


        break;

        //brings the user to the customer login and registration page
    case 'GETIN':
       $_POST['whereami'] = 'GETIN';
        echo "<div class=\"container\">";
        echo "<h1>Login / Registration</h1>";
        echo "</div>";
        include_once("assets/login_register_interface.php");
        // checkPOST();

        break;

        //starts the login process when the forms are filled out
    case 'LOGIN':
        echo $_POST['whereami'];
        echo $_POST['action'];
        echo "hello";
        break;

        //starts the registration process when the forms are filled out
    case 'REGISTER':
        echo $_POST['whereami'];
        echo $_POST['action'];
        echo "hello";
        break;


    DEFAULT:
//default loading page
        break;

}

include_once("assets/footer.php");