<?php

require("../assets/dbconn.php");
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/26/18
 * Time: 2:43 PM
 */

//This is just for deleting the table

$db = dbConn();

$query = "DROP TABLE  customers, orders, order_items, users, products, categories ;";

try{

    $sql = $db->prepare($query);

    $sql->execute();

    return "Successfully deleted all tables";
} catch (PDOException $e) {
    print_r($sql->errorInfo());
    die("There was a problem deleting all tables");

}