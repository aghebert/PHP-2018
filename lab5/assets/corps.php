<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:55 AM
 */

//Grabs all the information from the database and formats them into HTML
//While adding buttons to either read the entire information on them, update them,
//or delete them

//Searchs the sql database for parameters provided by the users
function sqlSearch($db){
    $column = '';
    $term = '';

    //get variables from url and set if it exists
    if (!empty($_GET["col"])) {
        $column = $_GET["col"];
    }

    if (!empty($_GET["term"])) {
        $term = $_GET["term"];
    }

    //if it exists, search the SQL database
    if (!empty($term)) {
        //returns the prepared dbo stated to whoever called this functions
           return $db->prepare("SELECT * FROM corps WHERE $column LIKE '%" . $term . "%' ");

    } else {
        //grabs everything from corps table
        return $db->prepare("SELECT * FROM corps");

    }

}

function sqlSort($db)
{

    $colSort = '';
    $direction = '';
//get variables from url and set if it exists
    if (!empty($_GET["column_sort"])) {
        $colSort = $_GET["column_sort"];
    }
    if (!empty($_GET["dir"])) {
        $direction = $_GET["dir"];
    }



    if (!empty($colSort)) {
        if ($direction == "ASC") {
            //returns the prepared dbo stated to whoever called this functions
           return $db->prepare("SELECT * FROM corps ORDER BY " . $colSort . " ASC");
        } else {
            return $db->prepare("SELECT * FROM corps ORDER BY " . $colSort . " DESC");
        }
    } else {
        return $db->prepare("SELECT * FROM corps");

    }



}
//gets the corporations from the database depending on what the prepared statement is in variable $sql.
//This function used to require $db, but now that is handled by the function that returns the prepared dbo statement --> sqlSort/Search()
function getCorporationsAsTable($db, $sql)
{
    try {

            $sql->execute();

            $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
            if ($sql->rowCount() > 0) {
                $table = "<table class='table'>" . PHP_EOL;
//for loop that creates the html table
                foreach ($corps as $corpor) {
                    $table .= "<tr><td>";
                    $table .= $corpor['corp'];
                    //$table .= "</td><td><form action='#' method='post'><input type='hidden' name='id' value='" . $corpor['id'] . "' /><input type='submit' name='action' value='Read' /> </form>";
                    $table .= "</td><td><a href='?action=Read&id=" . $corpor['id'] . "'>Read</a>";
                    $table .= "</td><td><a href='?action=Update&id=" . $corpor['id'] . "'>Update</a>";
                    $table .= "</td><td><a href='?action=Delete&id=" . $corpor['id'] . "'>Delete</a>";
                    $table .= "</td></tr>";
                }
                $table .= "</table>" . PHP_EOL;
            } else {
                $table = "There are no corporations in the DB" . PHP_EOL;
            }
            return $table;


        }

    catch
        (PDOException $e) {
            die("There was a problem getting the list");
        }

}

//adds a corporation to the database
function addCorporation($db, $corp, $email, $zipcode, $owner, $phone)
{
    try {
        $sql = $db->prepare("INSERT INTO corps VALUES (null, :corp, NOW(), :email, :zipcode, :owner, :phone)");
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);

        $sql->execute();

        return "Successfully added company";
    } catch (PDOException $e) {
        die("There was a problem adding this corporation");
    }
}


//gets the corporation for when the user clicks the "Read" button. Formats it
//and adds all the relevant information
function getCorporation($db, $id)
{
    $sql = $db->prepare("SELECT * FROM corps WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $table = "<table class='table'>" . PHP_EOL;
    $table .= "<tr><th>";
    $table .= "Corporation";
    $table .= "</th><th>";
    $table .= "Incorporation Date";
    $table .= "</th><th>";
    $table .= "Email";
    $table .= "</th><th>";
    $table .= "Zipcode";
    $table .= "</th><th>";
    $table .= "Owner";
    $table .= "</th><th>";
    $table .= "Phone Number";
    $table .= "</th></tr>";

    $table .= "<tr><td>";
    $table .= $row['corp'];
    $table .= "</td><td>";
    //formats this to the desired output
    $date = $row['incorp_dt'];
    $table .= date("m/d/Y", strtotime($date));
    $table .= "</td><td>";
    $table .= $row['email'];
    $table .= "</td><td>";
    $table .= $row['zipcode'];
    $table .= "</td><td>";
    $table .= $row['owner'];
    $table .= "</td><td>";
    $table .= $row['phone'];
    $table .= "</td></tr>";
    $table .= "</table>" . PHP_EOL;
    return $table;
}

//edits the desired table data by use of $id
function updateCorportation($db, $id, $corp, $email, $zipcode, $owner, $phone)
{
    try {
        $sql = $db->prepare("UPDATE corps SET corp=:corp, email=:email, zipcode=:zipcode, owner=:owner, phone=:phone WHERE id=:id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);

        $sql->execute();
        return "Corporation was successfully updated.";
    } catch (PDOException $e) {
        echo "$id, $corp, $email, $zipcode, $owner, $phone";
        die("There was a problem updating this corporation");

    }

}

//deletes desired table row using $id
function deleteCorporation($db, $id)
{
    try {
        $sql = $db->prepare("DELETE FROM corps WHERE id=:id");
        $sql->bindParam(':id', $id);

        $sql->execute();

        return "Corporation was successfully deleted.";
    } catch (PDOException $e) {
        die("There was a problem deleting this corporation");

    }

}

?>