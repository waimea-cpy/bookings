<?php

    require_once 'common-top.php';

    // Check we have an id
    if( !isset( $_GET['id'] ) || empty( $_GET['id']) ) showErrorAndDie( 'Missing booking ID' );

    // Grab the ID
    $bookingID = $_GET['id'];


    // The query to get all the diary entries
    $sql = 'SELECT bookings.id,
                   bookings.name AS custname,
                   bookings.email,
                   bookings.phone,
                   bookings.date,
                   bookings.time,

                   services.name AS servname,
                   services.cost

            FROM bookings
            JOIN services ON bookings.service = services.id

            WHERE bookings.id = ?';

    // Run the query on the server to get data
    $bookings = getRecords( $sql, 'i', [$bookingID] );
    $booking = $bookings[0];

    echo '<div class="card">';

    $date = new DateTime( $booking['date'] );
    $niceDate = $date->format('j M Y' );

    $time = new DateTime( $booking['time'] );
    $niceTime = $time->format('h:i a' );

    echo   '<label>Service Required</label>';
    echo   '<p>'.$booking['servname'].'</p>';
    
    echo   '<label>Date / Time</label>';
    echo   '<p>'.$niceDate.' at '.$niceTime.'</p>';

    echo   '<label>Customer Name</label>';
    echo   '<p>'.$booking['custname'].'</p>';

    echo   '<label>Customer Email</label>';
    echo   '<p>'.$booking['email'].'</p>';

    echo   '<label>Customer Phone</label>';
    echo   '<p>'.$booking['phone'].'</p>';

    echo   '<label>Service Cost</label>';
    echo   '<p>$ '.$booking['cost'].'</p>';

    echo '</div>';

    echo '<p><a href="list-bookings.php">Back to booking list</a></p>';

    require_once 'common-bottom.php';

?>