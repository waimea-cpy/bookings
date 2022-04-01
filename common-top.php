<?php
    require_once 'common-functions.php';
?>

<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Nelson Pet Dental</title>

    <link rel="icon" href="favicon.svg" type="image/svg+xml">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header id="main-header">

        <h1><a href="index.php">
            <img src="images/tooth.svg">
            Nelson Pet Dental
        </a></h1>

        <nav id="main-nav">
            <label for="toggle"><img src="images/menu.svg"></label>
            <input id="toggle" type="checkbox">

            <ul>
                <label for="toggle"><img src="images/close.svg"></label>

                <li><a href="index.php">Home</a></li>
                <li><a href="list-services.php">See Our Services</a></li>
                <li><a href="form-new-booking.php">Make a Booking</a></li>
                <li><a href="form-password.php">View Bookings</a></li>
            </ul>
        </nav>
   
    </header>

    <main>