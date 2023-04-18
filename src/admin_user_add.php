<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Manage Users</title>
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
</head>

<body style="background-color: white;">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!"><img src="./images/fake_logo.png" alt="logo" class="img-fluid w-50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="/admin_main.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin_product_add.php">Product</a></li>
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
    <!-- Section-->
    <section class="py-5">
        <div style="display:flex;flex-wrap:wrap;justify-content:center;" class="m-3" id="user_update_panel">
            <label for="user_name" class="m-2">Name:
                <input type="text" name="user_name" id="user_name" disabled>
            </label>
            <label for="user_email" class="m-2">Email:
                <input type="text" name="user_email" id="user_email" disabled>
            </label>
            <label for="user_address" class="m-2">Address:
                <input type="text" name="user_address" id="user_address" disabled>
            </label>
            <label for="user_password" class="m-2">Password:
                <input type="text" name="user_password" id="user_password" disabled>
            </label>
            <label for="user_status" class="m-2">Status:
                <select name="user_status" id="user_status" style="padding: 5px;">
                    <option value="approved">approved</option>
                    <option value="rejected">rejected</option>
                </select>
            </label>
            <button class="btn btn-danger" onclick="update_user()">Update</button>
        </div>
        <div class="section__box" style="display: flex;flex-direction:column;justify-content:center;text-align: center;">
            <h1 class="m-3">Users Table</h1>
            <div style="display:flex;justify-content:center;" class="m-3">
                <table>
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th> Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="alter_user_table_body"></tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <?php
    include('footer.php');
    ?>
</body>
<script src="./JS/main.js"></script>
</html>