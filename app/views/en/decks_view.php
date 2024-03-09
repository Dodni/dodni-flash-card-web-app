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
                <input type="text" name="search" id="search" placeholder="Search"><br><br>
                <button>Import new Deck</button><br><br>
                <?php
                    // A $decks változó tartalmazza az adatokat
                    foreach ($decks as $item) {
                        // Deck adatok kiírása és egy gomb, ami POST kérést küld
                        ?>
                        <form action="deck" method="post">
                            <input type="hidden" name="deck_id" value="<?php echo $item["deck_id"]; ?>">
                            <input type="submit" value="<?php echo $item["deck_name"]; ?>">
                        </form>
                        <?php
                    }
                ?>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
