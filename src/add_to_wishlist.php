<?php
session_start();
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}
if (isset($_COOKIE['user'])) {
    // add the wishlist in db
} else {
    // add the wishlist in session
    // add the product id in session
}
$_SESSION['wishlist'][$_POST['id']] ^= 1;
echo "<pre></pre>";
print_r($_SESSION['wishlist']);
?>