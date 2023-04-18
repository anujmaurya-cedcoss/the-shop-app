<?php
session_start();
include('header.php');
echo $_SESSION['current_prod'];
include('footer.php');
?>
<script src="./JS/main.js"></script>
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>