<?php
    include('config.php');
    if(!$conn) {
        die("connection was unsuccessful!");
    }
    // connected successfully
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $address = $_POST['address'];

    $curr_query = "INSERT INTO `user`(`name`, `email`, `password`, `address`)
                   VALUES('$name', '$mail', '$pass', '$address')";
    $result = mysqli_query($conn, $curr_query);
?>