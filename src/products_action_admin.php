<?php
include_once('./config.php');

$type = $_POST['type'];

switch ($type) {
    case 'add':
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $image = $_POST['image'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO `products` (`title`, `price`, `description`, `category`, `image`, `quantity_remaining`)
                    VALUES ('$title', '$price', '$description', '$category', '$image', '$quantity')";
        $result = mysqli_query($conn, $sql);
        echo "<pre>";
        print_r($result);
        break;

    case 'edit':
        $pid = $_POST['id'];
        $sql = "SELECT * FROM products WHERE `prod_id` = '$pid'";
        $res = mysqli_query($conn, $sql);
        print_r(json_encode(mysqli_fetch_assoc($res)));
        break;



    case 'display':
        $output = "";
        $sql = "SELECT * FROM products";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $output .= "<tr><td>" . $row["prod_id"]
                    . "</td><td>" . $row["title"]
                    . "</td><td>" . $row["description"]
                    . "</td><td>" . $row["price"]
                    . "</td><td>" . $row["quantity_remaining"]
                    . "</td><td>" . $row["image"]
                    . "</td><td><button class='btn bg-warning' onclick='edit_product(" . $row["prod_id"] . ")'>EDIT</button></td>
                <td><button class='btn bg-danger' onclick='delete_product(" . $row["prod_id"] . ")'>DELETE</button></td></tr>";
            }
        }
        echo $output;
        break;

    case 'update':
        $prod_id = $_POST["id"];
        $title = $_POST["title"];
        $price = $_POST["price"];
        $description = $_POST['description'];
        $image = $_POST["image"];
        $quantity_remaining = $_POST["quantity"];
        $sql = "UPDATE `products` SET `title` = '$title', `price` = '$price',`description` = '$description',`image` = '$image', `quantity_remaining` = '$quantity_remaining' WHERE `prod_id` = $prod_id";
        print_r($sql);
        $result = mysqli_query($conn, $sql);
        print_r($result);

    case 'delete':
        $prod_id = $_POST['id'];
        $sql = "DELETE FROM `products` WHERE `prod_id` = '$prod_id'";
        $res = mysqli_query($conn, $sql);
        break;

    case 'status':
        $status = $_POST['curr_status'];
        $order_id = $_POST['order_id'];
        $sql = "UPDATE `orders` SET `status`= '$status' WHERE `order_id` = '$order_id'";
        $result = mysqli_query($conn, $sql);
        // echo $status. ' '. $order_id;
        break;
    default:
        # code...
        break;
}
?>