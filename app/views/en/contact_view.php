<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Contact</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Contact</h1>
            <a href="<?php echo BASE_URL;?>home">Home</a><br>
            <a href="<?php echo BASE_URL;?>about">About</a><br>
            <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
            <a href="<?php echo BASE_URL;?>register">Register</a><br>
            <a href="<?php echo BASE_URL;?>login">Login</a><br>
            <div class="contact_container">
                <h2>Contact Us</h2>
                <form action="submit.php" method="post">
                    <label for="contact_name">Name:</label>
                    <input type="text" id="contact_name" name="contact_name" required>

                    <label for="contact_email">Email:</label>
                    <input type="email" id="contact_email" name="contact_email" required>

                    <label for="contact_message">Message:</label>
                    <textarea id="contact_message" name="contact_message" rows="4" required></textarea>

                    <button type="submit">Send Message</button>
                </form>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>