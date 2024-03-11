<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Card Flipping</title>
        <script>
                function flipCard() {
                    var container = document.querySelector(".container");
                    container.innerHTML = `
                        <div class="container">
                            <?php echo $decks[0]["card_first"]; ?>
                            <p>(voice)</p>
                            <p>----------</p>
                            <?php echo $decks[0]["card_second"]; ?>
                            <p>(voice)</p><br>
                        </div>
                        <div class="button-container"> 
                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="1">
                                <input type="submit" class="fail-button" value="Fail">
                            </form>

                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="2">
                                <input type="submit" class="hard-button" value="Hard">
                            </form>

                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="3">
                                <input type="submit" class="good-button" value="Good">
                            </form>

                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="4">
                                <input type="submit" class="easy-button" value="Easy">
                            </form>
                        </div>
                    `;
                }
            </script>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Card Flipping</h1>
            <div class="container">
                <p>Cards left more: <?php echo $cardsNumberForTheSession;?></p><br>
                <?php echo $decks[0]["card_first"]; ?>
                <br>
                <p>(voice)</p><br>
                <br><br><br>
                <button onclick="flipCard()">Flip</button>
                <br>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>

