<?php


require_once("assets/dbconn.php");
require_once("assets/corps.php");
require_once("assets/corp_form.php");
include_once("assets/header.php");
include_once("assets/sort_input.html");
include_once("assets/search_input.html");

//sets our connection function to a variable for ease of use
$db = dbConn();

//filters inputs
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";


//switch case based on buttons pushed, will do different things
switch ($action) {

    //runs sort function
    case "sort":
        echo addButton();
        //get the sort data and establishes a local variable
        $sqlSORT = sqlSORT($db);
        //gets the data back from sqlSORT() and displays it
        echo getCorporationsAsTable($db, $sqlSORT);
        break;
    //runs the search function
    case "search":
        echo addButton();
        //get the search data and establishes a local variable
        $sqlSEARCH = sqlSearch($db);
        //gets the data back from sqlSEARCH() and displays it
        echo getCorporationsAsTable($db, $sqlSEARCH);
        break;

    //Brings the user to the add company page
    case "Add Company":
        echo addHTML();
        echo goBackIndex();

        break;
    //adds the company provided by the user to the database
    case "Submit Company":
        echo addCorporation($db, $corp, $email, $zipcode, $owner, $phone);
        echo goBackIndex();
        break;

    //deletes the selected company from the database
    case "Delete":
        echo deleteCorporation($db, $id);
        echo goBackIndex();
        break;

    //gets the currently selected company from the database and allows the user to change the data
    case "Update":
        echo updateHTML($db, $id);
        echo goBackIndex();
        break;

    //updates the selected company in the database
    case "Update Corporation":
        echo updateCorportation($db, $id, $corp, $email, $zipcode, $owner, $phone);

        echo goBackIndex();
        break;

    //Shows the extended information on the selected company
    case "Read":

        echo getCorporation($db, $id);
        //adds an update and delete button to the page
        echo "<a href='?action=Update&id=" . $id . "'>Update</a>";
        echo "<br /> <br />";
        echo "<a href='?action=Delete&id=" . $id . "'>Delete</a>";
        echo goBackIndex();
        break;

    //goes back to index
    case 'Go Back':
        //sends the user back to the index page
        header('Location: index.php');
        break;

    default:
        echo addButton();
        $sqlDEFAULT = sqlSORT($db);
        echo getCorporationsAsTable($db, $sqlDEFAULT);
}


include_once("assets/footer.php");


?>