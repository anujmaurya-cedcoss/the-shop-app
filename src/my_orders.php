<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

</head>

<body>
    <?php
    include('./header.php');
    include('./config.php');

    echo "<div class=\"container mt-5 mb-5\">
    <div class=\"d-flex justify-content-center row\">
        <div class=\"col-md-8\">
            <div class=\"p-2\">
                <h4>My Orders</h4>
            </div>";

    $sql = "SELECT * FROM `orders` WHERE `user_id` = '$_COOKIE[user]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sql = "SELECT * FROM `products` WHERE `prod_id` = $row[prod_id]";
            $stmt = mysqli_query($conn, $sql);
            $prod = mysqli_fetch_assoc($stmt);
            echo
            "<div class=\"d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded\">
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
    echo " </div>
    </div>
    </div>";
    include('./footer.php');
    ?>
</body>

</html>