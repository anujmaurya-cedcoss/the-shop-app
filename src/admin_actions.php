<?php
session_start();
include('./config.php');

$type = $_POST['type'];
echo $type;
switch ($type) {
    case 'top_user':
        $sql = "SELECT * FROM user WHERE id IN
            (SELECT `user_id` FROM orders WHERE user.id = orders.user_id ORDER BY quantity  DESC) LIMIT 5";
        $result = mysqli_query($conn, $sql);
        $output = "";
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr><td>".$row["id"]."</td><td>".
                $row["name"]."</td><td>".$row["email"]."</td><td>".$row["address"]."</td></tr>";
            }
        }
        echo $output;
        break;

    case 'top_product':
        $sql = "SELECT * FROM products WHERE prod_id IN
        (SELECT `prod_id` FROM orders WHERE products.prod_id=orders.prod_id ORDER BY quantity_remaining DESC) LIMIT 5";
        $result = mysqli_query($conn, $sql);
        $output = "";
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr><td>".$row["prod_id"]."</td><td>".
                $row["title"]."</td><td>".$row["quantity_remaining"]."</td><td>".$row["price"]."</td></tr>";
            }
        }
        echo $output;
        break;

    case 'top_order':
        $sql = "SELECT `prod_id`,`status`,SUM(quantity) FROM orders
        GROUP BY prod_id,`status` ORDER BY SUM(quantity) DESC LIMIT 5";
        $result = mysqli_query($conn, $sql);
        $output = "";
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output .= "<tr><td>".$row["prod_id"]."</td><td>".
                $row['SUM(quantity)']."</td><td>".$row["status"]."</td></tr>";
            }
        }
        echo $output;
        break;
    
    default:
        break;
}
