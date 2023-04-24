<?php
include('./config.php');
$type = $_POST["type"];
switch ($type) {
    
    case 'edit':
        $id = $_POST["id"];
        $sql = "SELECT * FROM user WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        print_r(json_encode(mysqli_fetch_assoc($result)));
        break;
    
    case 'update':
        $id = $_POST["id"];
        $status = $_POST["status"];
        $sql = "UPDATE `user` SET `status` = '$status' WHERE `user`.`id` = '$id';";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;

    case 'delete':
        $id = $_POST["id"];
        $sql = "DELETE FROM `user` WHERE `user`.`id` = $id";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    
    case 'display':
        $output = "";
        $sql = "SELECT * FROM user";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)>0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $output .= "<tr><td>".$row["id"]
                ."</td><td>".$row["name"]
                ."</td><td>".$row["email"]
                ."</td><td>".$row["address"]
                ."</td><td>".$row["status"]
                ."</td><td><button class='btn bg-success' onclick='edit_user(".$row["id"].")'>Edit</button></td>
                <td><button class='btn bg-warning' onclick='delete_user(".$row["id"].")'>Delete</button></td></tr>";
            }
        }
        echo $output;
        break;

    default:
        # code...
        break;
}
