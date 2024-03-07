<!-- home_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<?php include_once 'header_view.php'; ?>
<body>
    <h2>Dodni's Flash Card Web App</h2>
    <a href="<?php echo BASE_URL;?>home">Home</a><br>
    <a href="<?php echo BASE_URL;?>about">About</a><br>
    <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
    <a href="<?php echo BASE_URL;?>register">Register</a><br>
    <a href="<?php echo BASE_URL;?>login">Login</a><br>
    <a href="<?php echo BASE_URL;?>deck">Decks //később törölni kell csak belépés után mutassa</a>
</body>
<?php include_once 'footer_view.php'; ?>
</html>