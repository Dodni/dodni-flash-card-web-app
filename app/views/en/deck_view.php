<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Deck's name here</title>

    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Deck's name here</h1>
            <div class="container">
            <form action="deck/card-flipping" method="post" onsubmit="return validateForm()">
                <input type="hidden" name="deck_id" value="<?php echo $oneDeck[0]["deck_id"]; ?>">
                
                <input type="checkbox" id="all" name="options[]" value="0" onchange="checkIfChecked()">
                <label for="all">NEW</label><br>
                
                <input type="checkbox" id="fail" name="options[]" value="1" onchange="checkIfChecked()">
                <label for="fail">FAIL</label><br>
                
                <input type="checkbox" id="bad" name="options[]" value="2" onchange="checkIfChecked()">
                <label for="bad">BAD</label><br>
                
                <input type="checkbox" id="good" name="options[]" value="3" onchange="checkIfChecked()">
                <label for="good">GOOD</label><br>
                
                <input type="checkbox" id="easy" name="options[]" value="4" onchange="checkIfChecked()">
                <label for="easy">EASY</label><br>
                
                <input type="submit" id="submitButton" value="Start Flipping Cards" disabled>
            </form>
            <?php
                    // Loop through the array and display each card's details
                    foreach ($oneDeck as $card) {
                        echo "Card ID: " . htmlspecialchars($card["card_id"]) . "<br>";
                        echo "First Word: " . htmlspecialchars($card["card_first"]) . "<br>";
                        echo "Second Word: " . htmlspecialchars($card["card_second"]) . "<br>";
                        echo "Known: " . ($card["card_known"] ? "Yes" : "No") . "<br>";
                        echo "Deck ID: " . htmlspecialchars($card["deck_id"]) . "<br>";
                        echo "<br>";
                    }
                ?>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
