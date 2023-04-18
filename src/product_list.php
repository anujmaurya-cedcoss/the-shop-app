<?php
include('config.php');
$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<div class=\"row\">";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class=\"col-lg-3 col-md-6 col-sm-6 d-flex\"  >
        <div class=\" card w-100 my-2 shadow-2-strong\" >
            <img src=\"$row[image]\" class=\"product card-img-top\" id = \"$row[prod_id]\"
                style=\"aspect-ratio: 1 / 1\" />
            <div class=\"card-body d-flex flex-column\">
                <h5 class=\"card-title\">$row[title]</h5>
                <p class=\"card-text\">$ $row[price]</p>
                <div class=\"card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto\">
                    <a href=\"#!\" class=\"btn btn-primary shadow-0 me-1 add-to-cart\" id=\"$row[prod_id]\">Add to cart</a>
                    <a href=\"#!\" class=\"btn btn-light border px-2 pt-2 icon-hover add-to-wishlist\" id=\"$row[prod_id]\" ><i
                            class=\"fas fa-heart fa-lg text-secondary px-1\"></i></a>
                </div>
            </div>
        </div>
    </div>";
    }
    echo "</div>";
} else {
    echo "";
}
?>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>