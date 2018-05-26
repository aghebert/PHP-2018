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


//connect to database
$db = dbConn();
//$user_key = $_SESSION['user_Key'];


// get the data from user, if any, and sanitize it.
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? null;
$searchTerm = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_URL) ?? filter_input(INPUT_POST, 'term', FILTER_SANITIZE_URL) ?? null;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;


switch ($action) {


    case "ADMIN_LOGIN":
        /*
        if($registered_user == true && $admin_rights == true){

        }else{*/
        echo "<h1>Administrator Login / Registration</h1>";
        include_once("assets/login_register.php");
        //}

        break;

    case 'LOGIN':
        echo "<h1>Login / Registration</h1>";
        include_once("assets/login_register.php");
        break;


    DEFAULT:
//default loading page
        break;

}

include_once("assets/footer.php");