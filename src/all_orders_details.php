<?php
include('config.php');
session_start();
$type = $_POST['type'];
switch ($type) {
    case 'display':
        $output = "";
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = "SELECT * FROM `products` WHERE `prod_id` = $row[prod_id]";
                $stmt = mysqli_query($conn, $sql);
                $prod = mysqli_fetch_assoc($stmt);

                $output .= "<div class=\"d-flex flex-row justify-content-between
                 align-items-center p-2 bg-white mt-4 px-3 rounded\">
                    <div class=\"mr-1\"><img class=\"rounded\" src=\"$prod[image]\" width=\"70\"></div>
                    <div class=\"d-flex flex-column align-items-center
                    product-details\"><span class=\"font-weight-bold\">
                    $prod[title]</span>
                    <div class=\"d-flex flex-row product-desc\">
                    <div class=\"mr-1\">
                    <label for=\"status\">status</label>
                    <select id=\"order-" . $row['order_id'] . "\" class=\"status\">
                        <option value=\"placed\"" . ($row['status'] == 'placed' ? ' selected' : '') . ">placed</option>
                        <option value=\"in-process\"" .
                        ($row['status'] == 'in-process' ? ' selected' : '') . ">in-process</option>
                        <option value=\"in-transit\"" .
                        ($row['status'] == 'in-transit' ? ' selected' : '') . ">in-transit</option>
                        <option value=\"delivered\"" .
                        ($row['status'] == 'delivered' ? ' selected' : '') . ">delivered</option>
                    </select>
                    </div>
                    </div>
                    </div>
                    <div>
                    <h5 class=\"text-grey\">Price : $$prod[price]</h5>
                    <div ><span class=\"text-grey\">Quantity:</span><span class=\"font-weight-bold\">&nbsp;
                    $row[quantity]</span></div>
                        </div>
                    </div>";
            }
        }
        $_SESSION['orders'] = $output;
        break;
    default:
        break;
}
