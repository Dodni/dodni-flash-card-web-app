<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decks</title>
</head>
<?php include_once 'header_view.php'; ?>
<body>
    <h1>Decks</h1>
    <a href="<?php echo BASE_URL;?>home">Home</a><br>
    <a href="<?php echo BASE_URL;?>about">About</a><br>
    <a href="<?php echo BASE_URL;?>contact">Contact</a><br>
    <a href="<?php echo BASE_URL;?>logout">Log Out</a><br>
    <br>
    <input type="text" name="search" id="search" placeholder="Search"><br>
    <br>

    <form id="deckForm" action="deck" method="post">
        <a href="#" onclick="submitDeck('1')">First Deck</a><br>
        <a href="#" onclick="submitDeck('2')">Second Deck</a><br>
        <a href="#" onclick="submitDeck('3')">Third Deck</a><br>
        <input type="hidden" id="selectedDeck" name="deck" value="">
    </form>

    <script>
        function submitDeck(deckValue) {
            // Beállítjuk a rejtett input mező értékét a kiválasztott pakli értékére
            document.getElementById("selectedDeck").value = deckValue;
            // Űrlapot beküldünk
            document.getElementById("deckForm").submit();
        }
    </script>

</body>
<?php include_once 'footer_view.php'; ?>
</html>
