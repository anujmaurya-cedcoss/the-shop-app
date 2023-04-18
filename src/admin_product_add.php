<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Add Product</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- MDB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery CDN  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- My CSS  -->
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!"><img src="./images/fake_logo.png" alt="logo" class="img-fluid w-50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="/admin_main.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin_product_page.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin_user_add.php">Users</a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Order Status
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center">
                <h1 class="display-4 fw-bolder">Product Info</h1>
                <h5>You can add and delete products from here</h5>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="section__box" style="display: flex;flex-direction:column;justify-content:center;text-align: center;">
            <h1 class="m-3">Add New Product</h1>
            <div style="display:flex;justify-content:center;flex-direction:column;" class="m-3">
                <label for="product_title" class="m-2">Product Title: 
                    <input type="text" name="product_title" id="product_title">
                </label>
                <label for="product_price" class="m-2">Price: 
                    <input type="text" name="product_price" id="product_price">
                </label>

                <label for="product_description" class="m-2">Description: 
                    <input type="text" name="product_description" id="product_description">
                </label>
                <label for="product_category" class="m-2">Product Category: 
                    <input type="text" name="product_category" id="product_category">
                </label>
                <label for="product_image" class="m-2">Image URL: 
                    <input type="text" name="product_image" id="product_image">
                </label>
                <label for="product_quantity" class="m-2">Quantity: 
                    <input type="text" name="product_quantity" id="product_quantity">
                </label>
            </div>
            <div>
                <button style="width: 200px;margin:auto;" class="btn bg-success" onclick="add_product()">Submit</button>
                <button style="width: 200px;margin:auto;" class="btn bg-success" id="update_product" onclick="update_product()">Update</button>
            </div>
        </div>
        <div class="section__box" style="display: flex;flex-direction:column;justify-content:center;text-align: center;">
            <h1 class="m-3">Product Table</h1>
            <div style="display:flex;justify-content:center;" class="m-3">
                <table>
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image URL</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="alter_product_table_body"></tbody>
                </table>
            </div>
    </section>
    <!-- Footer-->
    <?php
        include('footer.php');
    ?>
</body>
<script src="./JS/main.js"></script>
</html>