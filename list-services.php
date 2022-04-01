<?php

    require_once 'common-top.php';

    // The query to get all the diary entries
    $sql = 'SELECT id, name, description, cost 
            FROM services
            ORDER BY name ASC';

    // Run the query on the server to get data
    $services = getRecords( $sql );

    echo '<ol id="services-list">';

    foreach( $services as $service ) {

        echo '<li class="service card">';
      
        echo   '<h2>'.$service['name'].'</h2>';

        echo   '<p class="cost">$'.number_format( $service['cost'], 2 ).'</p>';

        echo   '<p class="desc">'.nl2br( $service['description'] ).'</p>';

        echo   '<a class="button" href="form-new-booking.php?id='.$service['id'].'">Book This</a>';

        echo '</li>';
    }

    echo '</ol>';

    require_once 'common-bottom.php';

?>