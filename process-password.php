<?php

    require_once 'common-top.php';

    echo '<div class="card">';
    echo '<h2>Checking Password...</h2>';

    // Check that all data fields exist
    if( !isset( $_POST['password'] ) || empty( $_POST['password'] ) ) showErrorAndDie( 'Missing Password' );

    // Check the password
    if( $_POST['password'] == 'shiny' ) {
        showStatus( 'Password correct!' );
        addRedirect( 2000, 'list-bookings.php' );
    }
    else {
        showStatus( 'Password incorrect!' );
        addRedirect( 2000, 'index.php' );
    }

    echo '</div>';

    require_once 'common-bottom.php';
?>    