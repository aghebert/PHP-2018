<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/23/18
 * Time: 10:49 AM
 */


function output($urls, $searchDate, $website)
{
    $date = date_create($searchDate);
    $date = date_format($date, "m-d-Y");
    //$date = $searchDate->format('m-d-Y');
    $count = count($urls);
    $htmlOutput = "<section><table id='links'>";
    $htmlOutput .= "<caption>" . $count . " links for '" . $website . "' retrieved and stored on" . $date . "</caption>";
//$htmlOutput .= "<tr><td><a href='" . $searchTerm . "' target='popup'>" . $searchTerm . "</a>";
//$htmlOutput .= "</br></br>";
    foreach ($urls as $key => $value) {
        $htmlOutput .= "<tr><td><a href='" . $urls[$key] . "' target='popup'>" . $urls[$key] . "</a></tr></td>";
    }
    $htmlOutput .= "</table></section>";

    echo $htmlOutput;
}


function fetchURLS($db)
{
    $query = "SELECT site_id, site FROM sites;";

//Prepare the select statement.
    $fetch = $db->prepare($query);

    //print_r($fetch);
//Execute the statement.
    $fetch->execute();

//Retrieve the rows using fetchAll.
    $fetchedURLS = $fetch->fetchAll();

    /*
    echo "<pre>";
    print_r($fetchedURLS);
    echo "</pre>";
    */
    return $fetchedURLS;
}

?>