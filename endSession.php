<?php
    // Ends the current session and removes all session variables (cart items)
    session_start();
    session_destroy();
    header('location:index.php');
?>