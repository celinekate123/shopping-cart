<?php
    // Takes in name and price of an item from the form and adds it to the cart using name as the session variable
    session_start();

    $name = $_POST['name'];
    $price = $_POST['price'];

    if (empty($_SESSION[$name])) {
        $_SESSION[$name] = array('name' => $name, 'price' => $price, 'quantity' => 1);
    } else {
        $_SESSION[$name]['quantity']++;
    }

    header('location:index.php');

?>