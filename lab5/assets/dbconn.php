<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:45 AM
 */

//connects to the database
function dbConn(){
$dsn = "mysql:host=localhost;dbname=PHPClassSpring2018";
$username = "PHPClassSpring2018";
$pword = "se266";

try{
    $db = new PDO($dsn, $username, $pword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (PDOException $e) {
    die("There was a problem connecting to the DB. " . "Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
}
}
    ?>