<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'head-main_view.php'; ?>
        <title>Import new Deck</title>
    </head>
    <body>
        <?php include_once 'header_view.php'; ?>
        <main>
            <div class="container text-center mt-2 mb-5">
                <h1>Import new Deck</h1>
                <div class="container-fluid mt-2 col-md-8">
                    <div class="row justify-content-center">
                        <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post" enctype="multipart/form-data">
                            <div class="col">
                                <label for="csvFile"><h4>Choose a CSV file:</h4></label>
                            </div>
                            <div class="col ml-2 mt-2 input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <input class="input-group" type="file" id="csvFile" name="csvFile" accept=".csv">
                                </div>
                            </div>
                            <div class="col mt-4">
                                <input class="btn btn-danger" type="submit" value="Import new Deck">
                            </div>
                        </form>
                    </div>
                    <div class="container-fluid mt-5 mb-5">
                        <p class="mb-3">Write your deck like this in Excel, or find one suitable for yourself in the Public Decks.</p>
                        <img class="rounded img-fluid" src="<?php echo BASE_URL; ?>public/img/english-hungarian-words-in-excel.png" alt="English to Hungarian words in Excel" height="400">
                    </div>
                    <div>
                        <p class="mb-3">Download your CSV file from Excel and then import it into the application.</p>
                        <img class="rounded img-fluid" src="<?php echo BASE_URL; ?>public/img/tutorial.png" alt="Tutorial how to download a CSV file from excel" height="400">
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>