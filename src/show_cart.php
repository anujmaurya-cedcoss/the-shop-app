<?php
session_start();
include_once('header.php');
include('config.php');
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
    $_SESSION['sync_cart'] = false;
}
echo "<h1 class = 'text-center'>My cart</h1>";
// total cost of cart items
$total = 0;
if (isset($_COOKIE['user']) && !$_SESSION['sync_cart']) {
    $_SESSION['sync_cart'] = true;
    // then print the databse cart item
    $id = $_COOKIE['user'];
    $sql = "SELECT `user_id`, `product_id`, `quantity` FROM `cart` WHERE `user_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $found = false;
            foreach ($_SESSION['cart'] as $k => $arr) {
                if (isset($value))
                    foreach ($arr as $key => $value) {
                        if ($key == $row['product_id']) {
                            $found = true;
                            $_SESSION['cart'][$key] += $row['quantity'];
                        }
                    }
            }
            $arr = array($row['product_id'] => $row['quantity']); // setting quantity 1 at that id
            if (!$found) {
                array_push($_SESSION['cart'], $arr);
            }
        }
    }
}
if (isset($_SESSION['cart'])) {
    // get id from session
    foreach ($_SESSION['cart'] as $k => $arr) {
        foreach ($arr as $key => $quantity) {
            if ($quantity >= 1) { //if quantity is greater than 1, only then show it
                $sql = "SELECT * FROM products WHERE prod_id = $key";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $left = $row['quantity_remaining'];
                    $str = "";
                    if ($left < $quantity) {
                        $str = "Please decrease the quantity";
                    }
                    if ($left < 5) {
                        $str = "Only few left, hurry up !";
                    }
                    if ($left < 1) {
                        $str = "Out of Stock";
                    }
                    $total += ($row['price']);
                    echo "<div class=\"row\" style = 'box-sizing: border-box;'>"; // see how to give box-sizing border-box here
                    echo "<div class=\"col-lg-3 col-md-6 col-sm-6 d-flex\">
                        <div class=\"card w-100 my-2 shadow-2-strong\">
                            <img src=\"$row[image]\" class=\"card-img-top\"
                                style=\"aspect-ratio: 1 / 1\" />
                            <div class=\"card-body d-flex flex-column\">
                                <h5 class=\"card-title\">$row[title]</h5>
                                <p class=\"card-text\">$ $row[price]</p>
                                <div class=\"card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto\">
                                <a  class=\"m-3 btn btn-primary shadow-0 me-1 decrement-quantity\" id=\"$row[prod_id]\" onclick = 'decrement($row[prod_id])'>-</a>
                                <h3 class = 'quantity_in_cart pl-3 mb-3' id=\"$row[prod_id]\">$quantity</h3>
                                <a  class=\"m-3 btn btn-primary shadow-0 me-1 increment-quantity\" id=\"$row[prod_id]\" onclick = 'increment($row[prod_id])'>+</a>
                                    <a class=\"m-3 btn btn-danger shadow-0 me-1 delete-from-cart\" id=\"$row[prod_id]\" onclick = 'del($row[prod_id])'>Delete</a>
                                    </div>
                                    <p style = 'color : red' class = 'text-center'>$str</p>
                            </div>
                        </div>
                    </div>";
                    echo "</div>";
                }
            }
        }
    }
    echo "<div class = 'text-center'>";
    echo "<button class = 'checkout m-3 btn btn-success shadow-0 me-1' onclick = 'checkoutCart()'>Checkout</button>";
    echo "<button class = 'empty-cart m-3 btn btn-danger shadow-0 me-1' onclick = 'emptyCart()'>Empty Cart</button>";
    echo "</div>";
}
include('footer.php');

// session_unset();
// session_destroy();
?>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="./JS/main.js"></script>