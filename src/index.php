<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fake Shop</title>

</head>

<body>
    <!--Main Navigation-->
    <?php
    include('./header.php');
    ?>
    <!-- Products -->
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>New products</h3>
            </header>

            <div class="row">

            </div>
        </div>
    </section>
    <!-- Products -->
    <?php
    include('product_list.php');
    ?>
    <!-- Feature -->
    <section class="mt-5" style="background-color: #f5f5f5;">
        <div class="container text-dark pt-3">
            <header class="pt-4 pb-3">
                <h3>Why choose us</h3>
            </header>

            <div class="row mb-4">
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-camera-retro fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Reasonable prices</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-star fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Best quality</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-plane fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Worldwide shipping</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-users fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Customer satisfaction</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-thumbs-up fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Happy customers</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
                <div class="col-lg-4 col-md-6">
                    <figure class="d-flex align-items-center mb-4">
                        <span class="rounded-circle bg-white p-3 d-flex me-2 mb-2">
                            <i class="fas fa-box fa-2x fa-fw text-primary floating"></i>
                        </span>
                        <figcaption class="info">
                            <h6 class="title">Thousand items</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmor</p>
                        </figcaption>
                    </figure>
                    <!-- itemside // -->
                </div>
                <!-- col // -->
            </div>
        </div>
        <!-- container end.// -->
    </section>
    <!-- Feature -->

    <?php
    include('./footer.php');
    ?>
    <!-- MDB -->
    <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
    <!-- Custom scripts -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
</body>

</html>