<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/14/18
 * Time: 9:15 AM
 */


//Thank you internet (https://davidwalsh.name/curl-download)
// Gets the html from the website passed in to $url and returns it. Comments are mine.
function get_HTML($url)
{
    //initializes curl session
    $ch = curl_init();
    //sets timeout
    $timeout = 5;
    //sets the url
    curl_setopt($ch, CURLOPT_URL, $url);
    //sets the return as a string instead of outputting the value
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //number of seconds to wait while trying to connect
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    //closes curl session
    curl_close($ch);
    return $data;


}

function find_URLs($websiteHTML)
{
    //https://stackoverflow.com/questions/36564293/extract-urls-from-a-string-using-php
    //I used this as reference for the REGEX function
    //REGEX was retrieved from regexr.com
    //regex101 is amazing for generating php code!

    preg_match_all('/([a-z]{1,2}tps?):\/\/([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,15}/', $websiteHTML, $inpageURLs);

    echo "<pre>";
    //removes duplicates and prints it to the page
    $inpageURLs = array_values(array_unique($inpageURLs[0], SORT_REGULAR));
    print_r($inpageURLs);
    echo "</pre>";


    return $inpageURLs;
}

function add_URLS($db, $site, $urls, $date)
{
    //This damned piece of code was the biggest hurdle here. Gets the max ID from the sites table
    $counter = count($urls);
   $getID = $db->query("SELECT MAX(site_id) FROM sites; ");
   $getID->execute();
    $currentMaxID= $getID->fetch(PDO::FETCH_NUM);
    //print_r($currentMaxID);

$newID = $currentMaxID[0];

print_r($newID);

    try {


        $query = "INSERT INTO sites VALUES (null, '$site', '$date' ); ";

        //$query .= "INSERT INTO sitelinks ( site_id, link ) VALUES ";
        echo "<pre>";
        //"INSERT INTO sitelinks (site_id, link) VALUES ((SELECT site_id FROM sites WHERE site_id='$key'), 'http://schema.org')"

        $query .= "INSERT INTO sitelinks ( site_id, link ) VALUES ";

        foreach ($urls as $key => $value) {
            //$query .= "INSERT INTO sitelinks ( site_id, link ) VALUES ";
            $query .= "($newID,  '$urls[$key]')";
            if($key < $counter - 1) {
                $query .= ", ";
            }

            /*
            $query .= "(";
            $query .= $site;
            $query .= ", ";
            $query .= $urls;
            $query .= ")";
            if($key < $value){
                $query .= ",";
            }
            echo("Got here too");
*/
            /*
            $query .= "bindParam($key, $value)";

            echo $value;
            echo $key;

            $query .= "(null, \'";
            $query .= $urls[$key];

            if ($key < $counter) {
                $query .= "\' ),";
            } else {
                $query .= "\' )";
            }
            }
            */

        }

        echo "</pre>";
        print_r($query);
        //print_r($key);
        $sql = $db->prepare($query);

        $sql->execute();
        /*
                $sql = 'SELECT * FROM Organization WHERE City = :City AND State= :State';
                $wherestr = array('string1', 'string2');
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':City', $wherestr[0]);
                $stmt->bindParam(':State', $wherestr[1]);
                $stmt->execute();

        */
        return "Successfully added website";
    } catch (PDOException $e) {
       print_r($sql->errorInfo());
        die("There was a problem adding website");

    }
}

