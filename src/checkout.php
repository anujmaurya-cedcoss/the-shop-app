<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout!</title>
</head>

<body>
    <?php
    include('./header.php');
    include('./config.php');
    $grand_total = 0;
    if(isset($_SESSION['checkout'])) {
        foreach ($_SESSION['checkout'] as $key => $arr) {
            $id = $arr['product_id'];
            $quant = $arr['quantity'];
            $sql = "SELECT * FROM products WHERE `prod_id` = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $curr_cost = $quant * $row['price'];
            $grand_total += $curr_cost;
    
            echo "<section class=\"vh-60\" style=\"background-color: #fdccbc;\">
            <div class=\"container h-100\">
              <div class=\"row d-flex justify-content-center align-items-center h-100\">
                <div class=\"col\">
            <div class=\"card mb-4\">
            <div class=\"card-body p-4\">
    
              <div class=\"row align-items-center\">
                <div class=\"col-md-2\">
                  <img src=\"$row[image]\"
                    class=\"img-fluid h-100\" alt=\"product image\">
                </div>
                <div class=\"col-md-2 d-flex justify-content-center\">
                  <div>
                    <p class=\"small text-muted mb-4 pb-2\">Name</p>
                    <p class=\"lead fw-normal mb-0\">$row[title]</p>
                  </div>
                </div>
                <div class=\"col-md-2 d-flex justify-content-center\">
                  <div>
                    <p class=\"small text-muted mb-4 pb-2\">Quantity</p>
                    <p class=\"lead fw-normal mb-0\">$quant</p>
                  </div>
                </div>
                <div class=\"col-md-2 d-flex justify-content-center\">
                  <div>
                    <p class=\"small text-muted mb-4 pb-2\">Price</p>
                    <p class=\"lead fw-normal mb-0\">$$row[price]</p>
                  </div>
                </div>
                <div class=\"col-md-2 d-flex justify-content-center\">
                  <div>
                    <p class=\"small text-muted mb-4 pb-2\">Total</p>
                    <p class=\"lead fw-normal mb-0\">$$curr_cost</p>
                  </div>
                </div>
              </div>
    
            </div>
          </div>
          </div></div></div></div></section>";
        }
        echo " <div class=\"card mb-5\">
        <div class=\"card-body p-4\">
          <div class=\"float-end\">
            <p class=\"mb-0 me-5 d-flex align-items-center\">
              <span class=\"small text-muted me-2\">Order total:</span> <span
                class=\"lead fw-normal\">$$grand_total</span>
            </p>
          </div>
        </div>";
    }else {
        echo "<div class = 'text-center mt-3'>
            <h1>Nothing here ! <a href = './index.php'>Buy More</a></h1>
        </div>";
    }
    include('./footer.php');
    ?>
</body>
<script src="./JS/main.js"></script>
</html>