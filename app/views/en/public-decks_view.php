<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'head-main_view.php'; ?>
    <title>Public Decks</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/paginationjs.css">
</head>
<body>
    <?php include_once 'header_view.php'; ?>
    <main>
        <div class="container text-center mt-2">
            <h1>Public Decks</h1>
            <div class="row mt-4 mb-4">
                <div class="col">
                    <input type="text" id="searchInput" class="btn btn-light custom-button border rounded" placeholder="Search for public decks">
                </div>
            </div>
            <div id="dataContainer"></div>
        </div>
        <div id="paginationContainer" class="container text-center mt-2 mb-3"></div>
    </main>
    <?php include_once 'footer_view.php'; ?>
</body>
</html>

<script src="<?php echo BASE_URL; ?>app/js/pagination.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const paginationContainer = document.getElementById('paginationContainer');

        searchInput.addEventListener('input', function() {
            const filter = searchInput.value.toLowerCase();
            if (filter.trim() !== '') {
                paginationContainer.style.display = 'none'; 
                filterData(filter);
            } else {
                paginationContainer.style.display = 'block'; 
                renderData(publicDecks);
            }
        });
    });

    const publicDecks = <?php echo json_encode($publicDecks); ?>;
    const itemsPerPage = 8;
    let currentData = publicDecks;

    function filterData(filter) {
        const filteredData = publicDecks.filter(function(deck) {
            return deck.deck_name.toLowerCase().includes(filter);
        });
        renderData(filteredData);
    }

    function renderData(data) {
        var html = '<table id="myTable" class="mx-auto container-fluid">';
        $.each(data, function(index, deck){
            html += '<tr>';
            html += '<td class="table-cell mb-2">';
            html += '<form action="#" method="post" class="container-fluid p-0 m-0">';
            html += '<input type="hidden" name="deck_id" value="' + deck.deck_id + '">';
            html += '<input type="hidden" name="deck_name" value="' + deck.deck_name + '">';
            html += '<button type="submit" class="custom-button-purple" value="' + deck.deck_id + '">' + deck.deck_name + '</button>';
            html += '</form>';
            html += '</td>';
            html += '</tr>';
        });
        html += '</table>';
        $('#dataContainer').html(html);
    }

    $('#paginationContainer').pagination({
        pageSize: itemsPerPage,
        totalNumber: publicDecks.length,
        dataSource: function(done) {
            done(currentData);
        },
        callback: function(data, pagination) {
            renderData(data);
        }
    });
</script>
