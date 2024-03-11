<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Decks</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Decks</h1>
            <div class="container">
                <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post"><input type="submit" value="Import new Deck"></form><br>
                <input type="text" name="search" id="search" placeholder="Search"><br><br><br>
                <?php
                    foreach ($decks as $item) {
                        ?>
                        <form action="<?php echo BASE_URL; ?>deck" method="post">
                            <input type="hidden" name="deck_id" value="<?php echo $item["deck_id"]; ?>">
                            <input type="hidden" name="deck_name" value="<?php echo $item["deck_name"]; ?>">
                            <input type="submit" value="<?php echo $item["deck_name"]; ?>">
                        </form>
                        <?php
                    }
                ?>
            </div>
            <br>
            <br>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
