<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:45 AM
 */

function dbConn(){
$dsn = "mysql:host=localhost;dbname=PHPClassFall2017";
$username = "root";

try{
    $db = new PDO($dsn, $username);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (PDOException $e) {
    die("There was a problem connecting to the DB.");
}
}
    ?>