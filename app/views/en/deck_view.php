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
            <form action="<?php echo BASE_URL; ?>deck/card-flipping" method="post" onsubmit="return validateForm()">
                <div class="container pt-2">
                    <div class="row justify-content-center   " >
                        <input type="hidden" name="deck_id" value="<?php echo $oneDeck[0]["deck_id"]; ?>">
                        <input type="hidden" id="knownCardsNumber" data-known-cards="<?php echo htmlspecialchars(json_encode($knownCardsNumber)); ?>">
                        <input type="hidden" id="cardsMaxAmount" name="cardsMaxAmount" value="<?php echo $deckSettingsData[0]["deck_settings_max_flip"]?>">
                        <input type="hidden" id="cardsNumberForTheSession" name="cardsNumberForTheSession" value="">
                    </div>
                </div>
                <div class="card-box-flex-container">
                    <div class="card-box ">
                        <input type="checkbox" class="card-checkbox" id="all" name="options[]" value="0" onchange="updateKnownCardsNumber()" hidden>
                        <label for="all" class="card-label-new">NEW (<?php echo $knownCardsNumber[0]?>)</label>
                    </div>
                    <div class="card-box ">
                        <input type="checkbox" class="card-checkbox" id="fail" name="options[]" value="1" onchange="updateKnownCardsNumber()" hidden>
                        <label for="fail" class="card-label-fail">FAIL (<?php echo $knownCardsNumber[1]?>)</label>
                    </div>
                    <div class="card-box ">
                        <input type="checkbox" class="card-checkbox" id="bad" name="options[]" value="2" onchange="updateKnownCardsNumber()" hidden>
                        <label for="bad" class="card-label-hard">HARD (<?php echo $knownCardsNumber[2]?>)</label>
                    </div>
                    <div class="card-box ">
                        <input type="checkbox" class="card-checkbox" id="good" name="options[]" value="3" onchange="updateKnownCardsNumber()" hidden>
                        <label for="good" class="card-label-good">GOOD (<?php echo $knownCardsNumber[3]?>)</label>
                    </div>
                    <div class="card-box">
                        <input type="checkbox" class="card-checkbox" id="easy" name="options[]" value="4" onchange="updateKnownCardsNumber()" hidden>
                        <label for="easy" class="card-label-easy">EASY (<?php echo $knownCardsNumber[4]?>)</label>
                    </div>
                </div>
                <div class="container-fluid ">
                    <input class="flip-button fixed-bottom" type="submit" id="submitButton" value="Start" disabled>
                </div>
            </form>
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