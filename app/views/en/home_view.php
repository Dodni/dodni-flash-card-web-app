<!-- home_view.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Home</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Dodni's Flash Card Web App</h1>
            <a href="<?php echo BASE_URL;?>home">Home</a><br>
            <a href="<?php echo BASE_URL;?>about">About</a><br>
            <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
            <a href="<?php echo BASE_URL;?>register">Register</a><br>
            <a href="<?php echo BASE_URL;?>login">Login</a><br>
            <a href="<?php echo BASE_URL;?>deck">Decks //később törölni kell csak belépés után mutassa</a>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>