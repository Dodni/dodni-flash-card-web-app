<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title><?php echo $deckName ?></title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="text-center p-2 full-page-no-roll-container">
                <h3><?php echo $deckName;?></h3>
                
                <!-- Settings -->
                <div class="m-1">
                    <div class="settings-container pt-3">
                        <p class="font-weight-bold text-monospace">Settings:</p>
                        <form action="<?php echo BASE_URL; ?>deck" method="post">
                            <input type="hidden" name="deck_id" value="<?php echo $oneDeck[0]["deck_id"]; ?>">
                            <input type="hidden" name="deck_name" value="<?php echo $deckName; ?>">
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
                                <label for="deck_settings_public" class="col-sm-4 col-form-label">Deck public status:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="deck_settings_public" id="deck_settings_public">
                                        <?php if ($deckSettingsData[0]["deck_settings_public"] == "N") : ?>
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
                                    <select class="form-control language-select" name="deck_settings_language_front">
                                        <?php foreach ($deckLanguageData as $language): ?>
                                            <?php 
                                                $selected = ($language['card_language_id'] == $deckSettingsData[0]['deck_first_column_language_id']) ? 'selected' : ''; 
                                                if ($selected == 'selected') $deck_settings_language_front = $language['card_language_code'];
                                                ?>
                                            <option value="<?php echo $language['card_language_id']; ?>" <?php echo $selected;?>><?php echo $language['card_language_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Back:</label>
                                <div class="col-sm-8">
                                    <select class="form-control language-select" name="deck_settings_language_back">
                                        <?php foreach ($deckLanguageData as $language): ?>
                                            <?php 
                                                $selected = ($language['card_language_id'] == $deckSettingsData[0]['deck_second_column_language_id']) ? 'selected' : ''; 
                                                if ($selected == 'selected') $deck_settings_language_back = $language['card_language_code'];
                                                ?>
                                            <option value="<?php echo $language['card_language_id']; ?>" <?php echo $selected;?>><?php echo $language['card_language_name'];  ?></option>
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
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <!--
                                    <form action="" method="post"></form>
                                 -->
                                <input type="submit" class="btn btn-danger custom-button"value="Deck DELETE" onclick="showAlert()">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Statistics -->
                <div class="m-1 pt-1">
                    <div class="statistics-container pt-3">
                        <p class="font-weight-bold text-monospace">Statistics from last session: </p>
                        <?php if ($cardsStatisticsInOneSession != NULL) { ?>
                        <div class="container">
                            <div class="row">
                                <?php foreach ($cardsStatisticsInOneSession as $key => $value): ?>
                                    <?php $height = $value * $ratio; ?>
                                    <div class="col">
                                        <div class="<?php echo $colors[$key]; ?>" style="height: <?php echo $height; ?>vh;">
                                            <p><?php echo $value; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Cards section -->
                <div class="pt-2">
                    <div class="card-label-container">
                        <form action="<?php echo BASE_URL; ?>deck/card-flipping" method="post" onsubmit="return validateForm()">
                            <div class="container ">
                                <div class="row justify-content-center   " >
                                    <input type="hidden" name="deck_id" value="<?php echo $oneDeck[0]["deck_id"]; ?>">
                                    <input type="hidden" name="deck_settings_language_front" value="<?php echo $deck_settings_language_front; ?>">
                                    <input type="hidden" name="deck_settings_language_back" value="<?php echo $deck_settings_language_back; ?>">
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

                    </div>
                </div>

            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>

<script>
    // It counts the chosen checkboxes real values for the card-flipping page
    // It needs because of the stack overflow
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

    function showAlert() {
        alert("Not available on this trial version.");
    }

</script>