<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <title>Admin Login Form</title>
</head>

<body>
    <div class="login d-flex justify-content-center">
        <form>
            <h1 class="text-center">Admin Login</h1>
            <!-- Email input -->
            <div class="form-outline mb-4 ">
                <input type="email" id="form2Example1" class="form-control admin-login-email" />
                <label class="form-label" for="form2Example1">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="form2Example2" class="form-control admin-login-pass" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <button type="button" class="admin-login-btn btn btn-primary btn-block mb-4"
                onclick='adminLogin()'>Log in</button>
                <div class="row"><a href="./login.php">Login As User</a></div>
        </form>
        <div class="login-error"></div>
    </div>
    </div>
    <div class="column display-result d-flex justify-content-center text-center">
        <div class="output">
        </div>
</body>
<script src="./JS/main.js"></script>
</html>