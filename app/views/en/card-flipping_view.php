<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Card Flipping</title>
        <script>
                function flipCard() {
                    var container = document.querySelector(".x");
                    container.innerHTML = `
                <div class="centered-container-two-side">
                    <div class="text-center">
                        <?php echo "<h2>" . $decks[0]["card_first"] . "</h2>"; ?>
                        <p>(voice coming soon..)</p>
                    </div>
                </div>

                <div class="border pl-5 m-0"></div>
                
                <div class="centered-container-two-side">
                    <div class="text-center">
                        <?php echo "<h2>" .  $decks[0]["card_second"]  . "</h2>"; ?>
                        <p>(voice coming soon..)</p>
                    </div>
                </div>

                <div class="container-fluid joined-buttons fixed-bottom">
                    <div class="row">
                        <div class="col p-0">
                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="1">
                                <input type="submit" class="fail-button" value="Fail">
                            </form>
                        </div>
                        <div class="col p-0">
                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="2">
                                <input type="submit" class="hard-button" value="Hard">
                            </form>        
                        </div>
                        <div class="col p-0">
                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="3">
                                <input type="submit" class="good-button" value="Good">
                            </form>
                        </div>
                        <div class="col p-0">
                            <form action="card-flipping" method="post" onsubmit="return card-flipping">
                                <input type="hidden" name="decks" value="<?php echo htmlspecialchars(serialize($decks)); ?>">
                                <input type="hidden" name="cardsNumberForTheSession" value="<?php echo $cardsNumberForTheSession;?>">
                                <input type="hidden" name="card_id" value="<?php echo $decks[0]["card_id"];?>">
                                <input type="hidden" name="card_known" value="4">
                                <input type="submit" class="easy-button" value="Easy">
                            </form>
                        </div>
                    </div>
                </div>
                    `;
                }
            </script>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="x">
                <div class="centered-container-one-side">
                    <div class="text-center">
                        <p class="text-monospace pb-5" >Cards more left : <?php echo $cardsNumberForTheSession;?></p>
                        <?php echo "<h2>" . $decks[0]["card_first"] . "</h2>"; ?>
                        <p>(voice coming soon..)</p>
                        <button class="flip-button fixed-bottom" onclick="flipCard()">Flip</button>
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>

