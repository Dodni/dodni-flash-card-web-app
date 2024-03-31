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
            <div class="row mt-4">
                <div class="col">
                    <form action="<?php echo BASE_URL; ?>decks/deck-import" method="post">
                        <input type="submit" class="btn btn-danger custom-button" value="Import new Deck">
                    </form>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col">
                    <input type="text" id="searchInput" class="btn btn-light custom-button border rounded" placeholder="Search">
                </div>
            </div>
            <div id="dataContainer" class="mb-4"></div>
        </div>
    </main>
    <?php include_once 'footer_view.php'; ?>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const dataContainer = document.getElementById('dataContainer');

        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            if (filter.trim() !== '') {
                filterData(filter);
            } else {
                renderData(publicDecks); // Render all decks if search input is empty
            }
        });

        renderData(publicDecks); // Render all decks initially
    });

    const publicDecks = <?php echo json_encode($decks); ?>;
    const BASE_URL = "<?php echo BASE_URL; ?>";

    function filterData(filter) {
        const filteredData = publicDecks.filter(function(deck) {
            return deck.deck_name.toLowerCase().includes(filter);
        });
        renderData(filteredData);
    }

    function renderData(data) {
    var html = '';
    $.each(data, function(index, deck){
        html += '<div class="row mt-2">';
        html += '<div class="col">';
        html += '<form action="' + BASE_URL +'deck" method="post" class="container-fluid p-0 m-0">';
        html += '<input type="hidden" name="deck_id" value="' + deck.deck_id + '">';
        html += '<input type="hidden" name="deck_name" value="' + deck.deck_name + '">';
        html += '<button type="submit" class="custom-button-blue" value="' + deck.deck_id + '">' + deck.deck_name + '</button>';
        html += '</form>';
        html += '</div>';
        html += '</div>';
    });
    $('#dataContainer').html(html);
}
</script>