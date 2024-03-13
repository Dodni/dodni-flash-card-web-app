<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Contact</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container mt-2">
                <h1>Contact Us</h1>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="submit.php" method="post" >
                                <div class="form-group">
                                    <label for="contact_name">Name</label>
                                    <input type="text" id="contact_name" class="form-control" name="contact_name" placeholder="John Doe" required>
                                </div>

                                <div class="form-group">
                                    <label for="contact_email">Email address</label>
                                    <input type="email" id="contact_email" class="form-control" name="contact_email" placeholder="name@example.com" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>

                                <div class="form-group">
                                    <label for="contact_message">Message:</label>
                                    <textarea id="contact_message" class="form-control" name="contact_message" rows="6" required></textarea>
                                </div>

                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                                    <label class="form-check-label" for="termsCheckbox">I accept the Terms of Service and Privacy Policy</label>
                                </div>
                                <div class="text-center container">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>