<?php
$pageTitle = "Personal Media Library";
$section = null;
include 'inc/functions.php';

include 'inc/header.php';
?>

<div class="section catalog random">
    <div class="wrapper">
        <h2>May we suggest something?</h2>
        <ul class="items" id="media-items">
            <!-- Media items will be populated here using AJAX -->
        </ul>
    </div>
</div>

<script>
    // Use AJAX to fetch and display media items
    function fetchMedia(category) {
        $.ajax({
            url: 'ajax_handler.php',
            type: 'GET',
            data: {
                action: 'fetch_data',
                category: category
            },
            dataType: 'json',
            success: function (data) {
                var mediaItems = $('#media-items');
                mediaItems.empty();

                $.each(data, function (index, item) {
                    var itemHtml = '<li>';
                    itemHtml += '<a href="#">';
                    itemHtml += '<img src="' + item.img + '" alt="' + item.title + '">';
                    itemHtml += '<p>' + item.title + '</p>';
                    itemHtml += '</a>';
                    itemHtml += '</li>';

                    mediaItems.append(itemHtml);
                });
            },
            error: function () {
                console.error('Error fetching data via AJAX.');
            }
        });
    }

    // Call fetchMedia function with a specific category (e.g., 'Books', 'Movies', 'Music')
    fetchMedia('Books');
</script>

<?php include 'inc/footer.php'; ?>
