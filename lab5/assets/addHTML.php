<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/23/18
 * Time: 10:49 AM
 */


function output($urls, $searchDate, $website)
{

    //$searchDate->format('d-m-Y');
    $date = $searchDate->format('m-d-Y');
    $count = count($urls);
    $htmlOutput = "<section><table id='links'>";
    $htmlOutput .= "<caption>" . $count . " links for '" . $website . "' retrieved and stored on " . $date . "</caption>";
//$htmlOutput .= "<tr><td><a href='" . $searchTerm . "' target='popup'>" . $searchTerm . "</a>";
//$htmlOutput .= "</br></br>";
    foreach ($urls as $key => $value) {
        $htmlOutput .= "<tr><td><a href='" . $urls[$key] . "' target='popup'>" . $urls[$key] . "</a></tr></td>";
    }
    $htmlOutput .= "</table></section>";

    echo $htmlOutput;
}

function fetchURLs($db, $id){


    $query = "SELECT sites.site_id, sites.site, sitelinks.link, sites.date FROM sites
INNER JOIN sitelinks ON sites.site_id=sitelinks.site_id AND sites.site_id=$id";

//Prepare the select statement.
    $fetch = $db->prepare($query);

    //print_r($fetch);
//Execute the statement.
    $fetch->execute();

//Retrieve the rows using fetchAll.
    $fetchedURLS = $fetch->fetchAll(PDO::FETCH_NAMED);
/*
    echo "<pre>";
print_r($fetchedURLS);
echo "</pre>";
*/


    $date = $fetchedURLS[0]['date'];
    $date = strtotime($date);
    $date = date('m-d-Y', $date);
    //$date = $searchDate->format('m-d-Y');
   // print_r($date);



    $count = count($fetchedURLS);
    $htmlOutput = "<section><table id='links'>";
    $htmlOutput .= "<caption>" . $count . " links for '" . $fetchedURLS[0]['site'] . "' retrieved and stored on " . $date . "</caption>";
//$htmlOutput .= "<tr><td><a href='" . $searchTerm . "' target='popup'>" . $searchTerm . "</a>";
//$htmlOutput .= "</br></br>";
    foreach ($fetchedURLS as $key => $value) {
        $htmlOutput .= "<tr><td><a href='" . $fetchedURLS[$key]['link'] . "' target='popup'>" . $fetchedURLS[$key]['link'] . "</a></tr></td>";
    }
    $htmlOutput .= "</table></section>";

    echo $htmlOutput;

}


function fetchWebsites($db)
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