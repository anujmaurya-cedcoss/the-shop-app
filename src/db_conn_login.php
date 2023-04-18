<?php
    session_start();
    include('config.php');
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM user WHERE `email` = '$mail' AND `password` = '$pass'";
    $result = mysqli_query($conn, $sql);
   
    $row = mysqli_fetch_assoc($result);
    if($row['status'] == 'approved') {
        $res = "you're authorized to log in";
        // now set this in cookies
        $cookie_name = "user";
        $cookie_value = $row['id'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        echo "success";
        // redirect to index.php
    } else {
        $res = "you're not authorized to log in";
        echo "fail";
    }
    // echo $res;
?>