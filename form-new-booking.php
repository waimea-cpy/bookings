<?php

    require_once 'common-top.php';
?>

<form class="card" method="POST" action="process-new-booking.php">


<?php
    // Are we making a booking for a specific service?
    if( isset( $_GET['id'] ) && !empty( $_GET['id']) ) {
        // Yes, so grab the ID
        $serviceID = $_GET['id'];

        // And get the service details
        $sql = 'SELECT id, name, cost FROM services WHERE id = ?';
        $services = getRecords( $sql, 'i', [$serviceID] );
        $service = $services[0];

        echo '<h2>New Booking for '.$service['name'].'</h2>';

        // Pass the service id via a hidden field
        echo '<input name="service" type="hidden" value="'.$serviceID.'">';
    }
    else {
        // No, so get the names of all the services
        $sql = 'SELECT id, name, cost FROM services ORDER BY name ASC';
        $services = getRecords( $sql );

        echo '<h2>New Booking</h2>';

        // And show a list of services to pick from
        echo '<label>Service Required</label>';

        echo '<select name="service">';

        foreach( $services as $service ) {
            echo '<option value="'.$service['id'].'">';
            echo   $service['name'];
            echo   ' ($'.number_format( $service['cost'], 2 ).')';
            echo '</option>';
        }
    
        echo '</select>';
    }
?>

    <label>Your Name</label>
    <input name="name" type="text" required>

    <label>Your Email</label>
    <input name="email" type="email" required>

    <label>Your Phone Number</label>
    <input name="phone" type="tel" required>

    <label>Date Required</label>
    <input name="date" type="date" min="<?= date( 'Y-m-d' ) ?>" required>

    <label>Preferred Time</label>
    <input name="time" type="time" value="08:00" min="08:00" max="17:00" required>


    <input type="submit" value="Make Booking">
</form>


<?php

    require_once 'common-bottom.php';

?>

