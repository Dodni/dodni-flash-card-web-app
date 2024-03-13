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
                <div class="container-fluid mt-5 col-md-8">
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
                    <div class="container-fluid mt-2 mb-5">
                        <p class="mb-4 font-weight-bold">Example:</p>
                        <img class="rounded img-fluid" src="<?php echo BASE_URL; ?>public/img/english-hungarian-words-in-excel.png" alt="English to Hungarian words in Excel" height="400">
                    </div>
                </div>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>