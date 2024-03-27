<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Card Flipping</title>
        <script>
                function flipCard() {
                    var container = document.querySelector(".change");
                    container.innerHTML = `
                    <!DOCTYPE html>
                    <div class="container-second-page">
                        <div class="text-center">
                            <p class="text-monospace">Cards more left : <?php echo $cardsNumberForTheSession;?></p>
                            <?php echo "<h2>" . $decks[0]["card_first"] . "</h2>"; ?>
                            <a id="trigger_me" onclick="speech_text()">listen</a>
                        </div>
                    </div>

                    <div class="border"></div>
                    
                    <div class="container-second-page">
                        <div class="text-center">
                            <?php echo "<h2>" .  $decks[0]["card_second"]  . "</h2>"; ?>
                            <a id="trigger_me2" onclick="speech_text2()">listen</a>
                        </div>
                    </div>
                    
                    <div class="joined-buttons fixed-bottom">
                        <div class="row">
                            <div class="col p-0">
                                <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                    <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                    <input type="hidden" name="cards_statistics_in_one_session" value="<?php echo htmlspecialchars(serialize($cardsStatisticsInOneSession)); ?>">
                                    <input type="hidden" name="deck_settings_language_front" value="<?php echo $_POST["deck_settings_language_front"]; ?>">
                                    <input type="hidden" name="deck_settings_language_back" value="<?php echo $_POST["deck_settings_language_back"]; ?>">
                                    <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                    <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                    <input type="hidden" name="card_known" value="1">
                                    <input type="submit" class="fail-button" value="Fail">
                                </form>
                            </div>
                            <div class="col p-0">
                                <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                    <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                    <input type="hidden" name="cards_statistics_in_one_session" value="<?php echo htmlspecialchars(serialize($cardsStatisticsInOneSession)); ?>">
                                    <input type="hidden" name="deck_settings_language_front" value="<?php echo $_POST["deck_settings_language_front"]; ?>">
                                    <input type="hidden" name="deck_settings_language_back" value="<?php echo $_POST["deck_settings_language_back"]; ?>">                                   
                                    <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                    <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                    <input type="hidden" name="card_known" value="2">
                                    <input type="submit" class="hard-button" value="Hard">
                                </form>        
                            </div>
                            <div class="col p-0">
                                <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                    <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                    <input type="hidden" name="cards_statistics_in_one_session" value="<?php echo htmlspecialchars(serialize($cardsStatisticsInOneSession)); ?>">
                                    <input type="hidden" name="deck_settings_language_front" value="<?php echo $_POST["deck_settings_language_front"]; ?>">
                                    <input type="hidden" name="deck_settings_language_back" value="<?php echo $_POST["deck_settings_language_back"]; ?>">                                    
                                    <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                    <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                    <input type="hidden" name="card_known" value="3">
                                    <input type="submit" class="good-button" value="Good">
                                </form>
                            </div>
                            <div class="col p-0">
                                <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                    <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                    <input type="hidden" name="cards_statistics_in_one_session" value="<?php echo htmlspecialchars(serialize($cardsStatisticsInOneSession)); ?>">
                                    <input type="hidden" name="deck_settings_language_front" value="<?php echo $_POST["deck_settings_language_front"]; ?>">
                                    <input type="hidden" name="deck_settings_language_back" value="<?php echo $_POST["deck_settings_language_back"]; ?>">
                                    <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                    <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                    <input type="hidden" name="card_known" value="4">
                                    <input type="submit" class="easy-button" value="Easy">
                                </form>
                            </div>
                        </div>
                    </div>
                    `;
                    // Itt olvassuk fel
                    speak();
                }

                function speak() {
                    // Ellenőrizzük, hogy a böngésző támogatja-e a SpeechSynthesis API-t
                    if ('speechSynthesis' in window) {
                        // Létrehozunk egy új beszédobjektumot
                        var synthesis = window.speechSynthesis;

                        // Létrehozunk egy beszédfelolvasáshoz szükséges objektumot
                        var utterance = new SpeechSynthesisUtterance('<?php echo $decks[0]["card_first"]; ?>');
                        var utterance2 = new SpeechSynthesisUtterance('<?php echo $decks[0]["card_second"]; ?>');

                        // Felolvassuk a szöveget
                        utterance.lang = "<?php echo $_POST["deck_settings_language_front"] ?>";
                        synthesis.speak(utterance);
                        
                        utterance2.lang = '<?php echo $_POST["deck_settings_language_back"] ?>';
                        synthesis.speak(utterance2);
                    } else {
                        // Ha a böngésző nem támogatja a SpeechSynthesis API-t
                        console.error('A böngésző nem támogatja a beszédfelolvasást.');
                    }
                }
                
                
                function speech_text2() {
                    var synthesis = window.speechSynthesis;
                    var utterance = new SpeechSynthesisUtterance('<?php echo $decks[0]["card_second"]; ?>');
                    utterance.lang = "hu-HU";
                    synthesis.speak(utterance);
                }
                $('#trigger_me2').trigger('click');
                
        </script>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="change">
                <div class="container-first-page">
                    <div class="text-center">
                        <p class="text-monospace">Cards more left : <?php echo $cardsNumberForTheSession;?></p>
                        <?php echo "<h2>" . $decks[0]["card_first"] . "</h2>";?>
                        
                        <a id="trigger_me" onclick="speech_text()">listen</a>
                    </div>
                    <button class="flip-button fixed-bottom" onclick="flipCard()">Flip</button>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>

<script>
    /*
    if ('speechSynthesis' in window) {
        var synthesis = window.speechSynthesis;

        var utterance = new SpeechSynthesisUtterance('<?php // echo $decks[0]["card_first"]; ?>');
        
        utterance.lang = "en-US"; // Korrigáltam az utterance változót

        synthesis.speak(utterance);
    } else {
        console.error('A böngésző nem támogatja a beszédfelolvasást.');
    }
    */
</script>
    
<script>
    function speech_text() {
        var synthesis = window.speechSynthesis;
        var utterance = new SpeechSynthesisUtterance('<?php echo $decks[0]["card_first"]; ?>');
        utterance.lang = "<?php echo $_POST["deck_settings_language_front"] ?>"; 
        synthesis.speak(utterance);
    }
    $('#trigger_me').trigger('click');
</script>