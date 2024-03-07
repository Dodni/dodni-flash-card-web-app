<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Register</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
        <h1>Register</h1>
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
                <input type="email" id="email" name="email" placeholder="E-Mail"><br>
                <br>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <br>
                <input type="password" id="password-again" name="password-again" placeholder="Password Again"><br>
                <br>
                <input id="login" type="submit" value="Login">
                </form>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
