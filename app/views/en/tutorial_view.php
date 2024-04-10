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
                    <h2 class="mb-4">How to Use Our Application in 5 Simple Steps</h2>
                    <h4>1. Sign Up or Log In</h4>
                    <p>
                        Begin by either <a href="<?php echo BASE_URL; ?>signup">signing up</a> for a new account or <a href="<?php echo BASE_URL; ?>login">logging in</a> to an existing one.
                    </p>
                    <div class="border-50 mb-4"></div>
                    <h4>2. Upload Your Deck or Choose from Public Decks</h4>
                    <p>
                        You can either upload your own deck in CSV format on the <a href="<?php echo BASE_URL; ?>decks/deck-import">Import new Deck</a> page or explore and select a suitable deck from the <a href="<?php echo BASE_URL; ?>decks/public">Public Decks</a> section.
                    </p>
                    <div class="border-50 mb-4"></div>
                    <h4>3. Open Your Deck</h4>
                    <p>
                        Once uploaded or selected, navigate to the <a href="<?php echo BASE_URL; ?>decks">Decks</a> page to access your chosen deck.
                    </p>
                    <div class="border-50 mb-4"></div>
                    <h4>4. Select Known Boxes and Start Learning</h4>
                    <p>
                        Choose the boxes containing cards you which you would like to learn, then click the Start button to begin the card flipping learning method where you’ll review and learn the content of the cards.
                    </p>
                    <div class="border-50 mb-4"></div>
                    <h4>5. Learn and Enjoy!</h4>
                    <p class="mb-4">
                        Dive into your learning journey and enjoy the process!
                    </p>
                    
                    <div class="border-50 mb-4"></div>
                    <h4 class="mb-3">Watch our presentation video demonstrating how to download a CSV file from Excel, log in, upload the file, and start using it:</h4>
                    <video class="video-desktop mb-4" controls>
                        <source src="public/videos/login-in-and-upload-a-deck.mp4" type="video/mp4">
                    </video>
                    <div class="border-50 mb-4"></div>
                    <h4 class="mb-3">Check out our presentation video showcasing the mobile view of our application:</h4>
                    <video class="video-mobile" controls>
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

