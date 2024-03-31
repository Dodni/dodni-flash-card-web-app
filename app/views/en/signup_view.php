<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Sign Up</title>
        <!-- FontAwesome CSS needs for the togglePassword -->
        <script src="https://kit.fontawesome.com/c36a3aebae.js" crossorigin="anonymous"></script>    
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
                                    <input type="text" class="form-control" id="username" name="username" placeholder="johndoe" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@email.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="yoursafepassword" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye" id="togglePassword"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCheckbox" name="termsCheckbox" required>
                                    <label class="form-check-label" for="termsCheckbox">I accept the Terms of Service and Privacy Policy</label>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="blue-button mt-3">Sign Up</button>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
});
</script>