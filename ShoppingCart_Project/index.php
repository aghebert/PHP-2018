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


//include_once("assets/sitesLookup.php");

//connect to database
$db = dbConn();



// get the data from user, if any, and sanitize it.
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??
    filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$searchTerm = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_URL) ?? filter_input(INPUT_POST, 'term', FILTER_SANITIZE_URL) ?? null;
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;


switch ($action) {


    case "":


    DEFAULT:
//default loading page
        break;

}

include_once("assets/footer.php");