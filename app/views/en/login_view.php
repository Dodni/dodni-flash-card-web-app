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
                            <form action="login" method="post" >
                                <div class="form-group">
                                    <label for="contact_name">Username</label>
                                    <input type="text" id="contact_name" class="form-control" name="contact_name" placeholder="John Doe" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Log In</button>
                                </div>
                                
                                <div class="form-group text-center">
                                    <a href="#" onclick="showAlert()" class="">Forgot password?</a>
                                </div>
                            </form>
                            <div class="text-center">
                                <p> Don't have an account? <a href="<?php echo BASE_URL; ?>signup">Sign up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>