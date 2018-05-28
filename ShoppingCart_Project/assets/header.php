<?php
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 10/16/17
 * Time: 8:12 AM
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lab 5 - Aaron Hebert</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link href="./css/custom.css" rel="stylesheet">
    <!-- A grey horizontal navbar that becomes vertical on small screens -->


    <!--navbar was referenced from w3schools.com-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">Home</a>

        <div class="button-group">
            <form action="" method="post" class="button-group">
                <button class="btn btn-sm btn-outline-success navbar-btn" type="submit">Login or Register</button>
                <input type="hidden" name="action" value="GETIN">
            </form>
            <form action="" method="post" class="button-group">
                <button class="btn btn-sm btn-outline-success navbar-btn" type="submit">Admin</button>
                <input type="hidden" name="action" value="ADMIN">
            </form>
        </div>
        <div class="collapse navbar-collapse" id=navb">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
            </form>
        </div>
    </nav>
</head>
<body>

<section id="mainpage">
