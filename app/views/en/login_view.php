<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Login</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1 class="">Login</h1>
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
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>