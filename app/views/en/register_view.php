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
                <input type="checkbox" id="termsCheckbox" name="termsCheckbox">
                <label for="termsCheckbox">I accept the Terms of Service and Privacy Policy</label>
                <br>
                <br>
                <input id="login" type="submit" value="Register">
                </form>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
