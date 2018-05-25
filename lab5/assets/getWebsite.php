<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/14/18
 * Time: 9:15 AM
 */


function validateSearchTerm($searchTerm)
{
    if (preg_match('/([a-z]{1,2}tps?):\/\/([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,15}/', $searchTerm) == 1) {

    } else {
        header("Location: index.php");
        echo("That is a not a valid website");
        exit();
    }

}


//Thank you internet (https://davidwalsh.name/curl-download)
// Gets the html from the website passed in to $url and returns it. Comments are mine.
function get_HTML($url)
{
    //initializes curl session
    $ch = curl_init();
    //sets timeout
    $timeout = 5;
    //sets the url

    if (curl_setopt($ch, CURLOPT_URL, $url) == true) {

        //sets the return as a string instead of outputting the value
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //number of seconds to wait while trying to connect
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        //closes curl session
        curl_close($ch);
        return $data;
    } else {
        echo "This is not a valid website";
        exit(1);
    }

}

function find_URLs($websiteHTML)
{
    //https://stackoverflow.com/questions/36564293/extract-urls-from-a-string-using-php
    //I used this as reference for the REGEX function
    //REGEX was retrieved from regexr.com
    //regex101 is amazing for generating php code!

    preg_match_all('/([a-z]{1,2}tps?):\/\/([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,15}/', $websiteHTML, $inpageURLs);

    //echo "<pre>";
    //removes duplicates and prints it to the page
    $inpageURLs = array_values(array_unique($inpageURLs[0], SORT_REGULAR));
    //print_r($inpageURLs);
    //echo "</pre>";


    return $inpageURLs;
}

function add_URLS($db, $site, $urls, $date)
{
    //This damned piece of code was the biggest hurdle here. Gets the max ID from the sites table
    $counter = count($urls);
    $getID = $db->query("SELECT MAX(site_id) FROM sites; ");
    $getID->execute();
    $currentMaxID = $getID->fetch(PDO::FETCH_NUM);
    //print_r($currentMaxID);

    $date = $date->format('Y-m-d H:i:s');

    $newID = $currentMaxID[0] + 1;

//print_r($newID);

    try {

//creates SQL statement that inserts data to sites and sitelinks
        $query = "INSERT INTO sites VALUES (null, '$site', '$date' ); ";
        //echo "<pre>";
        $query .= "INSERT INTO sitelinks ( site_id, link ) VALUES ";
//for loop to insert each link found
        foreach ($urls as $key => $value) {

            $query .= "($newID,  '$urls[$key]')";
            if ($key < $counter - 1) {
                $query .= ", ";
            }


        }

        // echo "</pre>";
        //print_r($counter);
        //print_r($query);


        $sql = $db->prepare($query);

        $sql->execute();

        return "Successfully added website";
    } catch (PDOException $e) {
        print_r($sql->errorInfo());
        die("There was a problem adding website");

    }
}



