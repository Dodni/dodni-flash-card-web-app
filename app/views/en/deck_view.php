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
                <h3><?php echo $deckName;?></h3>
                <div class="mt-2">
                    <form action="#" method="post">
                        <div class="form-group row">
                            <label for="deck_settings_max_flip" class="col-sm-4 col-form-label">Maximum cards per session:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="deck_settings_max_flip" name="deck_settings_max_flip">
                                    <?php
                                    $options = array(10, 25, 50, 100, 200, 300, 400, 500);
                                    foreach ($options as $option) {
                                        $selected = ($deckSettingsData[0]["deck_settings_max_flip"] == $option) ? "selected" : "";
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desk_settings_public" class="col-sm-4 col-form-label">Deck public status:</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="desk_settings_public" id="desk_settings_public">
                                    <?php if ($deckSettingsData[0]["desk_settings_public"] == "N") : ?>
                                        <option value="N" selected>No</option>
                                        <option value="Y">Yes</option>
                                    <?php else : ?>
                                        <option value="N">No</option>
                                        <option value="Y" selected>Yes</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Front:</label>
                            <div class="col-sm-8">
                                <select class="form-control language-select" name="selected_language_front">
                                    <?php foreach ($deckLanguageData as $language): ?>
                                        <?php $selected = ($language['card_language_id'] == $deckSettingsData[0]['deck_first_column_language_id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $language['card_language_id']; ?>" <?php echo $selected ?>><?php echo $language['card_language_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Back:</label>
                            <div class="col-sm-8">
                                <select class="form-control language-select" name="selected_language_back">
                                    <?php foreach ($deckLanguageData as $language): ?>
                                        <?php $selected = ($language['card_language_id'] == $deckSettingsData[0]['deck_second_column_language_id']) ? 'selected' : ''; ?>
                                        <option value="<?php echo $language['card_language_id']; ?>" <?php echo $selected ?>><?php echo $language['card_language_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="custom-button">Save</button>
                            </div>
                        </div>
                    </form>
            </div>
                <div class="">
                    <p>Statistics: Coming soon..</p>
                </div>
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