<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>App tutorial</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container text-center mt-2">
                <h1>Tutorial</h1>
                <div class="container mt-2 col-md-8">
                    <h2>How to use our application in 5 steps</h2>
                    <p>
                        1.	<u><b >Sign Up or Log In:</b></u> Begin by either <a href="<?php echo BASE_URL; ?>signup">signing up</a> for a new account or <a href="<?php echo BASE_URL; ?>login">logging</a> into an existing one.
                    </p>
                    <p>
                        2.	<u><b>Include and upload your deck (.CSV file) or find one appropriate deck on the Public Decks:</b></u> You can either upload your own deck in CSV format on the <a href="<?php echo BASE_URL; ?>decks/deck-import">Import new Deck</a> page or explore and select a suitable deck from the <a href="<?php echo BASE_URL; ?>decks/public">Public Decks</a> section.
                    </p>
                    <p>
                        3.	<u><b>Open your deck on the Decks page:</b></u> Once uploaded or selected, navigate to the <a href="<?php echo BASE_URL; ?>decks">Decks</a> page to access your chosen deck.
                    </p>
                    <p>
                        4.	<u><b>Select known box or boxes (new, hard, bad, good easy), then click to the Start button and it starts the card flipping learning method:</b></u> <span style="color: #449DD1;">Choose the boxes</span> that contain the cards <span style="color: #449DD1;">you already know</span>, then click the <span style="color: #449DD1;">Start button</span> to begin the <span style="color: #449DD1;">card flipping learning method</span>, where you’ll <span style="color: #449DD1;">review</span> and <span style="color: #449DD1;">learn</span> the content of the cards.
                    </p>
                    <p>
                        5. <b>Learn and enjoy it!</b>
                    </p>
                    <p class="mt-4">Presentation video about download a CSV file from Excel and then log in, include and upload it and finally utilize it:</p>
                    <video style="border: 1px solid white; border-radius: 1%; width: 100%;" controls>
                        <source src="public/videos/login-in-and-upload-a-deck.mp4" type="video/mp4">
                    </video>
                    <p class="mt-3">Presentation video about a mobile view:</p>
                    <video style="border: 1px solid white; border-radius: 1%; max-height: 50%; max-width: 100%;" controls>
                        <source src="public/videos/video-from-the-application.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="container mt-2 mb-3 col-md-8">
                    <a class="blue-button" href="<?php echo BASE_URL; ?>signup">Get Started</a>
                </div>
            </div>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>

