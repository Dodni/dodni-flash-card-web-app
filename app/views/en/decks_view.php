<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>My Decks</title>            
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container text-center mt-2">
                <h1>My Decks</h1>
                <div class="row ">
                    <div class="col">
                        <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post"><input type="submit" class="btn btn-danger custom-button"value="Import new Deck"></form>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="text" class="btn btn-light custom-button"name="search" id="search" placeholder="Search">
                    </div>
                </div>
                <div class="mt-4">
                    <?php
                        foreach ($decks as $item) {
                            ?>
                                <div class="row mt-2">
                                    <div class="col">
                                        <form action="<?php echo BASE_URL; ?>deck" method="post">
                                            <input type="hidden" name="deck_id" value="<?php echo $item["deck_id"]; ?>">
                                            <input type="hidden" name="deck_name" value="<?php echo $item["deck_name"]; ?>">
                                            <input type="submit" class="custom-button" value="<?php echo $item["deck_name"]; ?>">
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
