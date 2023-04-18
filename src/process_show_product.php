<?php 
session_start();
$_SESSION['current_prod'] = "";
include_once('config.php');
$res = "";
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM products WHERE `prod_id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $res.="<div class=\"row\">
        <div class=\"col-md-5 how-img\">
            <img src=\"$row[image]\" class=\"rounded-circle img-fluid\"
                alt=\"\" />
        </div>
        <div class=\"col-md-5 mt-5\">
            <h2>$row[title]</h2>
            <h4 class=\"subheading\">$row[description]</h4>
            
            <p class=\"card-text\">$ $row[price]</p>
            <div class=\"card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto\">
            <a  class=\"btn btn-primary shadow-0 me-1 add-to-cart\" id=\"$row[prod_id]\">Add to cart</a>
            <a  class=\"btn btn-light border px-2 pt-2 icon-hover add-to-wishlist\" id=\"$row[prod_id]\" ><i
            class=\"fas fa-heart fa-lg text-secondary px-1\"></i></a>
            </div>
            </div>
    </div>
    </div>";
    $_SESSION['current_prod'] = $res;
}
?>