<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Import new Deck</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container ">
                <h1>Import new Deck</h1>
                <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post" enctype="multipart/form-data">
                    <label for="csvFile">Choose a CSV file:</label>
                    <input type="file" id="csvFile" name="csvFile" accept=".csv">
                    <input type="submit" value="Import new Deck">
                </form>
                <p>Example:</p>
                
                <img src="<?php echo BASE_URL; ?>public/img/english-hungarian-words-in-excel.png" alt="English to Hungarian words in Excel" height="450">
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
