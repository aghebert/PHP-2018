<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/11/18
 * Time: 4:03 PM
 */

error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');

require '../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\DynamoDb\Exception\DynamoDbException;


require_once("assets/dbconn.php");
require_once("assets/getWebsite.php");
require_once("assets/addHTML.php");
include_once("assets/header.php");

include_once("assets/siteEntry.php");
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
        $html = get_HTML($searchTerm);
        $searchDate = date('m-d-Y');
        $urls = find_URLs($html);

        add_URLS($db, $searchTerm, $urls, $searchDate);
       output($urls, $searchDate, $searchTerm);
        break;

    case "Reset":
        header("Location: index.php");
        break;

    DEFAULT:

        break;

}

include_once("assets/footer.php");