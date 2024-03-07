<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php include_once 'header_view.php'; ?>
<body>
    <h1>Login</h1>
    <a href="<?php echo BASE_URL;?>home">Home</a><br>
    <a href="<?php echo BASE_URL;?>about">About</a><br>
    <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
    <a href="<?php echo BASE_URL;?>register">Register</a><br>
    <a href="<?php echo BASE_URL;?>login">Login</a><br>
    <br>
    <div class="container">
            <form action="login" method="post"> 
            <input type="text" id="username" name="username" placeholder="Username"><br>
            <br>
            <input type="password" id="password" name="password" placeholder="Password"><br><br>
            <input id="login" type="submit" value="Login">
            </form>
            <br>
            <a href="#" onclick="showAlert()">Forgot password?</a>
      </div>
</body>
<?php include_once 'footer_view.php'; ?>
</html>