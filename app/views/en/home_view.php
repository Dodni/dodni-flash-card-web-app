<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'head-main_view.php'; ?>
    <title>Welcome to Dodni's Flash Card World!</title>

</head>
<body>
    <?php include_once 'header_view.php'; ?>
    <div class="container text-center mt-2">
        <h1>Welcome to Dodni's Flash Card World!</h1>
        <div class="container mt-5 col-md-7">
            <p>Embark on a journey of <span style="color: #4CAF50;">learning</span> and <span style="color: #4CAF50;">discovery</span> with Dodni's Flash Card Web App!</p>
            <p>Unlock the power of <span style="color: #4CAF50;">rapid learning</span> through technology. Our app transforms studying into an <span style="color: #4CAF50;">adventure</span>, making education both engaging and effective.</p>
            <p>Ready to dive in? Start creating your first flashcard deck now and let the <span style="color: #4CAF50;">learning adventure</span> begin!</p>
        </div>
        <div class=" container mt-5">
            <p><a class="green-button" href="<?php echo BASE_URL; ?>signup">Create Your Deck</a></p>
        </div>
    </div>
    <?php include_once 'footer_view.php'; ?>
</body>
</html>