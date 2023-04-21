<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [[]];
}
$method = $_POST['type'];
require('./config.php');

// function to sync the session cart with db cart
function syncCart()
{
    require('./config.php');
    $user_id = $_COOKIE['user'];
    $cart_query = mysqli_query($conn, "SELECT * FROM cart WHERE user_id=$user_id");
    $cart = array();
    while ($row = mysqli_fetch_assoc($cart_query)) {
        $cart[$row['product_id']] = $row['quantity'];
    }
    if (isset($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $idx => $item) {
            foreach ($item as $id => $quantity) {
                if (isset($cart[$id])) {
                    $db_query = "UPDATE `cart` SET `quantity`='$quantity'
                WHERE `user_id`='$user_id' AND `product_id`='$id'";
                } else {
                    $db_query = "INSERT INTO `cart` (`user_id`, `product_id`, `quantity`)
                VALUES ('$user_id', '$id', '$quantity')";
                }
                mysqli_query($conn, $db_query);
            }
            unset($cart[$id]);
        }
    }
    foreach ($cart as $id => $quantity) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE `user_id`='$user_id' AND `product_id`='$id'");
    }
}

// update all the queries in db also
switch ($method) {
    case 'increment':
        foreach ($_SESSION['cart'] as $idx => $arr) {
            foreach ($arr as $key => $quant) {
                if ($key == $_POST['id']) {
                    $_SESSION['cart'][$idx][$key]++;
                    syncCart();
                }
            }
        }
        break;

    case 'decrement':
        foreach ($_SESSION['cart'] as $idx => $arr) {
            foreach ($arr as $key => $quant) {
                if ($key == $_POST['id']) {
                    $_SESSION['cart'][$idx][$key]--;
                    if ($_SESSION['cart'][$idx][$key] < 1) {
                        unset($_SESSION['cart'][$idx]);
                        syncCart();
                    }
                }
            }
        }
        break;

    case 'delete':
        foreach ($_SESSION['cart'] as $idx => $arr) {
            foreach ($arr as $key => $quant) {
                if ($key == $_POST['id']) {
                    unset($_SESSION['cart'][$idx]);
                    syncCart();
                }
            }
        }
        break;

    case 'emptyCart':
        unset($_SESSION['cart']);
        syncCart();
        break;

    case 'checkout':
        if (isset($_COOKIE['user'])) {
            // insert everything in db, and then unset session['cart']
            $_SESSION['checkout'] = [];
            foreach ($_SESSION['cart'] as $idx => $arr) {
                foreach ($arr as $id => $quant) {
                    $sql = "INSERT INTO `orders`
                    (`prod_id`, `quantity`,`user_id`)
                    VALUES ('$id','$quant','$_COOKIE[user]')";
                    // inserting everthing inside the session['checkout'] to process in checkout page
                    $arr = array('id' => $id, 'quantity' => $quant);
                    array_push($_SESSION['checkout'], $arr);
                    $result = mysqli_query($conn, $sql);
                    $sql = "DELETE FROM `cart` WHERE `id` = $id AND `user_id` = $_COOKIE[user]";
                    $result = mysqli_query($conn, $sql);
                    echo "true";
                }
            }
            // unset session
            unset($_SESSION['cart']);
            syncCart();
        } else {
            echo "false";
        }
        break;


    default:
        break;
}