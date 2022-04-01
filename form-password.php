<?php

    require_once 'common-top.php';
?>

<form class="card" method="POST" action="process-password.php">
    <h2>Admin Access</h2>

    <label>Password</label>
    <input name="password" type="password" required>

    <input type="submit" value="Submit">
</form>


<?php

    require_once 'common-bottom.php';

?>

