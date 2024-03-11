<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Import new Deck</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <h1>Import new Deck</h1>
            <div class="container">
                <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post" enctype="multipart/form-data">
                    <label for="csvFile">Choose a CSV file:</label><br>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv"><br><br>
                    <input type="submit" value="Import new Deck">
                </form>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
