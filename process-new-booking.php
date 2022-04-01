<?php

    require_once 'common-top.php';

    echo '<div class="card">';
    echo '<h2>Making Your Booking...</h2>';

    // Check that all data fields exist
    if( !isset( $_POST['service'] ) || empty( $_POST['service'] ) ) showErrorAndDie( 'Missing service ID' );
    if( !isset( $_POST['name'] )    || empty( $_POST['name'] ) )    showErrorAndDie( 'Missing name' );
    if( !isset( $_POST['email'] )   || empty( $_POST['email'] ) )   showErrorAndDie( 'Missing email' );
    if( !isset( $_POST['phone'] )   || empty( $_POST['phone'] ) )   showErrorAndDie( 'Missing phone' );
    if( !isset( $_POST['date'] )    || empty( $_POST['date'] ) )    showErrorAndDie( 'Missing date' );
    if( !isset( $_POST['time'] )    || empty( $_POST['time'] ) )    showErrorAndDie( 'Missing time' );

    // Setup query
    $sql = 'INSERT INTO bookings (service, name, email, phone, date, time)
            VALUES (?, ?, ?, ?, ?, ?)';
    $types = 'isssss';
    $data = [
        $_POST['service'], 
        $_POST['name'], 
        $_POST['email'],
        $_POST['phone'],
        $_POST['date'],
        $_POST['time']
    ];

    // Send data to server
    modifyRecords( $sql, $types, $data );

    // If we get here, all went well!
    showStatus( 'Success! Thanks for your booking - We will be in touch shortly' );
    echo '</div>';

    // Head back to the home page
    addRedirect( 2000, 'index.php' );

    require_once 'common-bottom.php';
?>    