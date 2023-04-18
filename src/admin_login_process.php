<?php
    include('./config.php');
    $type = $_POST['type'];

    switch ($type) {
        case 'login':
            $user_name = $_POST['uname'];
            $pass = $_POST['pass'];

            $sql = "SELECT * FROM `admin` WHERE `email` = '$user_name' AND `password` = '$pass'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($res);
            
            echo "<pre>";
            print_r($res);
            print_r($row);
            break;
        
        default:
            # code...
            break;
    }
?>