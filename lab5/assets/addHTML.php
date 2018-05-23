<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/23/18
 * Time: 10:49 AM
 */


function output($urls, $date, $website)
{
    $count = count($urls);
    $htmlOutput = "<section><table id=links>";
    $htmlOutput .= "<caption>" . $count . " links for '" . $website . "', retrieved and stored " . $date . "</caption>";
//$htmlOutput .= "<tr><td><a href='" . $searchTerm . "' target='popup'>" . $searchTerm . "</a>";
//$htmlOutput .= "</br></br>";
    foreach ($urls as $key => $value) {
        $htmlOutput .= "<tr><td><a href='" . $urls[$key] . "' target='popup'>" . $urls[$key] . "</a></tr></td>";
    }
    $htmlOutput .= "</table></section>";

    echo $htmlOutput;
}