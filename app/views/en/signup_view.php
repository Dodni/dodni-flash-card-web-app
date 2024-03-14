<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Sign Up</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container mt-2">
                <h1>Sign Up</h1>
                <div class="container mt-2">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="<?php echo BASE_URL; ?>signup" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCheckbox" name="termsCheckbox" required>
                                    <label class="form-check-label" for="termsCheckbox">I accept the Terms of Service and Privacy Policy</label>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary mt-3">Sign Up</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p>Have an account? <a href="<?php echo BASE_URL; ?>login">Log in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
