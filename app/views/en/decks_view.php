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
                <?php
                    // Serialize the entire array
                    $data = serialize($decks);
                    var_dump($data);

                    // Creating a form to send the serialized data
                    echo "<form action='deck' method='post'>";
                    echo "<input type='hidden' name='serialized_data' value='" . htmlspecialchars($data) . "'>";

                    // Adding submit button with deck_name as its value
                    foreach ($decks as $deck) {
                        echo "<input type='submit' name='deck_name' value='" . htmlspecialchars($deck["deck_name"]) . "'><br>";
                    }

                    echo "</form>";
                ?>
            </div>
        </main>
        <?php include_once 'footer_view.php'; ?>
    </body>
</html>
