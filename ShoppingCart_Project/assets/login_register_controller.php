<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/26/18
 * Time: 5:40 PM
 */

function checkPOST()
{
    if (isset($_POST['emailLogin']) == true) {
        $emailLogin = $_POST['emailLogin'];
        $pswLogin = $_POST['pswLogin'];

        echo $emailLogin;
        echo "<br/>";
        echo $pswLogin;
    }

    if (isset($_POST['emailReg']) == true) {
        $emailReg = $_POST['emailReg'];
        $pswReg = $_POST['pswReg'];
        $pswrepeatReg = $_POST['pswrepeatReg'];

        echo $emailReg;
        echo "<br/>";
        echo $pswReg;
        echo "<br/>";
        echo $pswrepeatReg;
    }
}

function validateEmailFormat($givenEmail)
{

    if (!filter_var($givenEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return false;
    } else {
        return true;
    }
}

function checkIfEmailExists($db, $givenEmail, $from)
{
    try {
        $getID = $db->query("SELECT COUNT(email)FROM $from WHERE email=$givenEmail; ");
        $getID->execute();
        $fetched = $getID->fetchALL(PDO::FETCH_NUM);

        if ($fetched->fetchColumn() == 1) {
            return true;
        } elseif ($fetched->fetchColumn() == 0) {
            return false;
        } else {
            echo "database issue: email dupe";
            return false;
        }
    } catch (PDOException $e) {
        print_r($getID->errorInfo());
        die("There was a problem checking database: email");

    }
}

function registerUser($db, $from, $email, $pass){

    $getID = $db->query("SELECT MAX(site_id) FROM $from; ");
    $getID->execute();
    $currentMaxID = $getID->fetch(PDO::FETCH_NUM);


    //$newID = $currentMaxID[0] + 1;

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