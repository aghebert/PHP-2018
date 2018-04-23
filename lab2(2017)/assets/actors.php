<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:55 AM
 */

function getActorsAsTable($db)
{
    try {
        $sql = $db->prepare("SELECT * FROM actors");
        $sql->execute();

        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
if($sql->rowCount() > 0) {
    $table = "<table class='table'>" . PHP_EOL;
    foreach ($actors as $actor) {
        $table .= "<tr><td>";
        $table .= $actor['firstname'];
        $table .= "</td><td>";
        $table .= $actor['lastname'];
        $table .= "</td><td>";
        $table .= $actor['dob'];
        $table .= "</td><td>";
        $table .= $actor['height'];
        $table .= "</td></tr>";
    }
    $table .= "</table>" . PHP_EOL;
}else{
    $table = "There are no actors in the DB" . PHP_EOL;
}
        return $table;


    } catch (PDOException $e) {
        die("There was a problem getting the list");
    }
}

function addActor($db, $firstname, $lastname, $dob, $height){
    try {
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);

        $sql->execute();
        return $sql->rowCount();
    } catch (PDOException $e){
        die("There was a problem adding this actor");
    }
}

function getActor($db, $id){
    $sql = $db->prepare("SELECT * FROM actors WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    return $row;

}

?>