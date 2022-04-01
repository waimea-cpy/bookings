<?php

    require_once 'common-top.php';

    // The query to get all bookings
    $sql = 'SELECT bookings.id,
                   bookings.name AS custname,
                   bookings.date,
                   bookings.time,

                   services.name AS servname

            FROM bookings
            JOIN services ON bookings.service = services.id

            ORDER BY bookings.date ASC, bookings.time ASC';

    // Run the query on the server to get data
    $bookings = getRecords( $sql );
?>

    <table id="booking-list">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Name</th>
                <th>Service</th>
                <th>View</th>
            </tr>
        </thead>

        <tbody>

<?php

    // Show each booking
    foreach( $bookings as $booking ) {

        $date = new DateTime( $booking['date'] );
        $niceDate = $date->format('j M Y' );

        $time = new DateTime( $booking['time'] );
        $niceTime = $time->format('h:i a' );

        echo '<tr>';

        echo   '<td>'.$niceDate.'</td>';
        echo   '<td>'.$niceTime.'</td>';
        echo   '<td>'.$booking['custname'].'</td>';
        echo   '<td>'.$booking['servname'].'</td>';

        // With a link to view all details
        echo   '<td><a href="show-booking.php?id='.$booking['id'].'">View</a></td>';

        echo '</tr>';
    }
?>

        </tbody>
    </table>


<?php

    require_once 'common-bottom.php';

?>