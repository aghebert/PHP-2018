<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/11/18
 * Time: 4:03 PM
 */


require '../vendor/autoload.php';



require_once("assets/dbconn.php");
require_once("assets/getWebsite.php");
require_once("assets/addHTML.php");
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


    case "Search":
        validateSearchTerm($searchTerm);
        $searchDate = DateTime::createFromFormat('Y-m-d', 'H:i:s');
        //$output = $date->format('F j, Y');
        //$searchDate = date("Y-m-d H:i:s");//date('m-d-Y');
        $html = get_HTML($searchTerm);
        $urls = find_URLs($html);

        add_URLS($db, $searchTerm, $urls, $searchDate);
       output($urls, $searchDate, $searchTerm);
        break;

    case "Reset":
        header("Location: index.php");
        break;

    case "siteEntry":
        include("assets/siteEntry.php");
        echo "siteentry";
        break;

    case "sitesLookup":
        $fetchedURLS = fetchURLS($db);
        include("assets/sitesLookup.php");
        echo "sitelookup";
        break;

    DEFAULT:
//default loading page
        include_once("assets/siteEntry.php");
        break;

}

include_once("assets/footer.php");