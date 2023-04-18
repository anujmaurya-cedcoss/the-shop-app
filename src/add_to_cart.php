<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [[]];
}
if (isset($_COOKIE['user'])) {
    // add the wishlist in db
} else {
    // add the wishlist in session
    // add the product id in session
}

$found = false;

foreach ($_SESSION['cart'] as $k => $arr) {
    foreach ($arr as $key => $value) {
        if($key == $_POST['id'] && $value > 0) {
            $found = true;
        }
    }
}
$arr = Array ($_POST['id'] => 1);  // setting quantity 1 at that id
if(!$found) {
    array_push($_SESSION['cart'], $arr);
}

echo "<pre></pre>";
print_r($_SESSION['cart']);

// session_unset();
// session_destroy();
?>