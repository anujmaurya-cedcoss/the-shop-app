<?php
    include('./config.php');
    $type = $_POST['type'];

    switch ($type) {
        case 'login':
            $user_name = $_POST['uname'];
            $pass = $_POST['pass'];
            $sql = "SELECT * FROM `admin` WHERE `email` = '$user_name' AND `password` = '$pass'";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res) > 0) {
                echo 'success';
            } else {
                echo 'failure';
            }
            break;
        
        default:
            # code...
            break;
    }
?>