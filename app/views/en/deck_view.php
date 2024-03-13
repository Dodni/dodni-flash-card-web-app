<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title><?php echo $deckName ?></title>

    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
        <div class="container text-center mt-2 mb-5">
                <h3><?php echo $deckName ?></h3>
                <div class="m-5">
                    <p>Settings:</p>
                    <p>Maximum cards per session: <?php echo $deckSettingsData[0]["deck_settings_max_flip"]?></p>
                    <p>Coming soon..</p>
                </div>
                <div class="m-5">
                    <p>Statistics:</p>
                    <p>Coming soon..</p>
                </div>
                    <form action="<?php echo BASE_URL; ?>deck/card-flipping" method="post" onsubmit="return validateForm()">
                        <div class="row justify-content-center mt-5 mb-5">
                            <input type="hidden" name="deck_id" value="<?php echo $oneDeck[0]["deck_id"]; ?>">
                            <input type="hidden" id="knownCardsNumber" data-known-cards="<?php echo htmlspecialchars(json_encode($knownCardsNumber)); ?>">
                            <input type="hidden" id="cardsMaxAmount" name="cardsMaxAmount" value="<?php echo $deckSettingsData[0]["deck_settings_max_flip"]?>">
                            
                            <input type="hidden" id="cardsNumberForTheSession" name="cardsNumberForTheSession" value="">
                            
                            <input type="checkbox" class="card-checkbox" id="all" name="options[]" value="0" onchange="updateKnownCardsNumber()">
                            <label for="all" class="card-label">NEW (<?php echo $knownCardsNumber[0]?>)</label>
                            
                            <input type="checkbox" class="card-checkbox" id="fail" name="options[]" value="1" onchange="updateKnownCardsNumber()">
                            <label for="fail" class="card-label">FAIL (<?php echo $knownCardsNumber[1]?>)</label>
                            
                            <input type="checkbox" class="card-checkbox" id="bad" name="options[]" value="2" onchange="updateKnownCardsNumber()">
                            <label for="bad" class="card-label">HARD (<?php echo $knownCardsNumber[2]?>)</label>
                            
                            <input type="checkbox" class="card-checkbox" id="good" name="options[]" value="3" onchange="updateKnownCardsNumber()">
                            <label for="good" class="card-label">GOOD (<?php echo $knownCardsNumber[3]?>)</label>
                            
                            <input type="checkbox" class="card-checkbox" id="easy" name="options[]" value="4" onchange="updateKnownCardsNumber()">
                            <label for="easy" class="card-label">EASY (<?php echo $knownCardsNumber[4]?>)</label>
                        </div>
                        <div class="container-fluid ">
                            <input class="flip-button fixed-bottom" type="submit" id="submitButton" value="Start Flipping Cards" disabled>
                        </div>
                    </form>
                <?php
                    /*
                    // Loop through the array and display each card's details
                    foreach ($oneDeck as $card) {
                        echo "Card ID: " . htmlspecialchars($card["card_id"]) . "";
                        echo "First Word: " . htmlspecialchars($card["card_first"]) . "";
                        echo "Second Word: " . htmlspecialchars($card["card_second"]) . "";
                        echo "Known: " . ($card["card_known"] ? "Yes" : "No") . "";
                        echo "Deck ID: " . htmlspecialchars($card["deck_id"]) . "";
                        echo "";
                    }
                    */
                ?>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
<script>
    // It counts the chosen checkboxes real values for the card-flipping
    function updateKnownCardsNumber() {
        var checkedBoxes = document.querySelectorAll('input[name="options[]"]:checked');
        var sum = 0;
        checkedBoxes.forEach(function(checkbox) {
            var value = parseInt(checkbox.value);
            sum += <?php echo json_encode($knownCardsNumber); ?>[value];
    });
        document.getElementById('cardsNumberForTheSession').value = sum;
        document.getElementById('submitButton').disabled = sum === 0;
            }
</script>