<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Log In</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container mt-2">
                <h1>Log In</h1>
                <div class="container mt-2">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="<?php echo BASE_URL; ?>login" method="post" >
                                <div class="form-group">
                                    <label for="user_name">Username</label>
                                    <input type="text" id="user_name" class="form-control" name="user_name" placeholder="johndoe" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password"  placeholder="yourpassword">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="blue-button">Log In</button>
                                </div>
                                
                                <div class="form-group text-center">
                                    <a href="#" onclick="showAlert()" class="">Forgot password?</a>
                                </div>
                            </form>
                            <div class="text-center">
                                <p> Don't have an account? <a class="a-blue" href="<?php echo BASE_URL; ?>signup">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>