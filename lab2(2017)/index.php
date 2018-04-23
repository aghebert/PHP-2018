<?php
//makes sure dbconn and corporations are connected so we can use them
require_once("assets/dbconn.php");
require_once("assets/actors.php");
//header and begining of html
include_once("assets/header.php");

//make database connection
$db = dbConn();

//Filter inputs
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) ?? "";
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";
switch ($action) {
    case "Add":
        addActor($db, $firstname, $lastname, $dob, $height);
break;
}

//echo out html with all corporations
echo getActorsAsTable($db);

//footer and end of html
include_once("assets/actor_form.php");
include_once("assets/footer.php");



?>
