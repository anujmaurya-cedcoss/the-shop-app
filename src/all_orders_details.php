<?php
    include('config.php');
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
                    $output .= "<div class=\"d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded\">
                    <div class=\"mr-1\"><img class=\"rounded\" src=\"$prod[image]\" width=\"70\"></div>
                    <div class=\"d-flex flex-column align-items-center product-details\"><span class=\"font-weight-bold\">
                    $prod[title]</span>
                    <div class=\"d-flex flex-row product-desc\">
                    <div class=\"mr-1\"><span class=\"text-red\">Status:</span><span class=\"font-weight-bold\">&nbsp;
                    $row[status]</span></div>
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
            echo $output;

            break;
        
        default:
            # code...
            break;
    }
?>