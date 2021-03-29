<?php
    // Setting up the session and products array given
    session_start();

    $products = [
        [ "name" => "Sledgehammer", "price" => 125.75 ],
        [ "name" => "Axe", "price" => 190.50 ],
        [ "name" => "Bandsaw", "price" => 562.131 ],
        [ "name" => "Chisel", "price" => 12.9 ],
        [ "name" => "Hacksaw", "price" => 18.45 ],
    ];
?>

<!DOCTYPE html>
<html>
    <button onclick="document.location.href='endSession.php'">Restart Session</button>
    <head>
        <title>
            Shopping Cart
        </title>
    </head>
    
    <body style="text-align:center;">
        <h1 style="color:red;"> Welcome to the ezyVet Shopping Cart </h1>
        <h4> To start, add an item to the list. </h4>
    
        <?php
            // Listing each product available
            // The add to cart button calls the addToCart.php page which adds the item to the cart
            foreach ($products as $product) { ?>
                <form action='addToCart.php' method="post">
                    <table style="width:100%;">
                        <tr>
                            <th><?php echo $product['name']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo '$' . money_format('%.2n', $product['price']); ?></td>
                        </tr>
                        <tr>
                            <input type="hidden" id="name" name="name" value="<?php echo $product['name']; ?>">
                            <input type="hidden" id="price" name="price" value="<?php echo $product['price']; ?>">
                            <td><input type="submit" name="addToCart" value="Add to Cart" /></td>
                        </tr>
                    </table>
                </form>
            <?php
                echo nl2br("\n");
                echo nl2br("\n");
            } 

            echo '-----------------CART-----------------';
            echo nl2br("\n");
            $orderTotal = 0;
            // Displays the list of items that are in the cart based off the values that have been stored in the session
            foreach ($_SESSION as $item) { ?>
                <form action='removeFromCart.php' method="post">
                    <table style="width:100%;">
                        <tr>
                            <th><?php echo $item['name']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo 'Price: $' . money_format('%.2n', $item['price']); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'Quantity: ' . $item['quantity']; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo 'Total: $' . money_format('%.2n', $item['quantity'] *  $item['price']); ?></td>
                        </tr>
                        <tr>
                            <input type="hidden" id="name" name="name" value="<?php echo $item['name']; ?>">
                            <td><input type="submit" name="removeFromCart" value="Remove from Cart" /></td>
                        </tr>
                    </table>
                </form>
            <?php
                $orderTotal += $item['quantity'] *  $item['price'];
                echo nl2br("\n");
                echo nl2br("\n");
            } 
        echo 'Cart Total: $' . money_format('%.2n', $orderTotal) . nl2br("\n"); ?>
    </body>
</html>