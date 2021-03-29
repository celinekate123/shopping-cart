<?php
    // Same as add to cart except quantities are subtracted or removed if 0 quantity of that item remain
    session_start();

    $name = $_POST['name'];

    if ($_SESSION[$name]['quantity'] <= 1) {
        unset($_SESSION[$name]);
    } else {
        $_SESSION[$name]['quantity']--;
    }

    header('location:index.php');

?>