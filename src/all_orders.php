<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="./JS/main.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!"><img src="./images/fake_logo.png" alt="logo" class="img-fluid w-50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="./admin_main.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./admin_product_add.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./admin_user_add.php">Users</a></li>
                </ul>
                <form class="d-flex">
                    <button class="all-orders" >
                        <i class="bi-cart-fill me-1"></i>
                        All Orders
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div >
        <h1 class = "d-flex text-center">List of all orders</h1>
        <div class = "all-orders-list"><?php session_start(); echo $_SESSION['orders']?></div>
    </div>
    <!-- Footer-->
    <?php
        include('footer.php');
    ?>
</body>

</html>