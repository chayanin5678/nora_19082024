baseurl = 'http://35.194.248.190:8083/api/';

function readContentById(contentId) {
    jQuery.ajax({
        url: baseurl + 'content/' + contentId,
        type: 'GET',
        data: {
            action: 'fetch_api_data'
        },
        success: function (response) {
            jQuery(function ($) {
                res = JSON.stringify(response)

                $('#book-detail').html(response.content);
            })

        },
        error: function (xhr, status, error) {
            $('#book-detail').html('An error occurred: ' + error);
        }
    });
}

jQuery(document).ready(function ($) {

    console.log("DOCUMENT READY")
    const protocol = window.location.protocol; // e.g., 'https:'
    const host = window.location.host;         // e.g., 'www.example.com'
    const pathname = window.location.pathname; // e.g., '/path/to/page'
    const search = window.location.search;     // e.g., '?query=123'
    const hash = window.location.hash;         // e.g., '#section1'
    // Explode the path into its components
    const pathComponents = pathname.split('/').filter(component => component); // Filter removes empty strings
    if (pathComponents.length > 0) {
        currentPage = pathComponents[1];
    }

    switch (currentPage) {
        case "bookpage": {
            // Create a URLSearchParams object
            const urlParams = new URLSearchParams(search);
            // Example: Get the value of a specific query parameter
            const bookId = urlParams.get('bookId'); // Replace 'paramName' with your query parameter name

            if (bookId == null) {
                window.location.href = "/wordpress/books/";
            } else {
                $.ajax({
                    url: baseurl + 'chapters?bookId=' + bookId,
                    type: 'GET',
                    data: {
                        action: 'fetch_api_data'
                    },
                    success: function (response) {

                        $('#book-name').html();

                        const $list = $('#sidebar'); // Get the <ul> element

                        // Iterate over the array and append <li> elements
                        $.each(response, function (index, item) {

                            $list.append(`<a style="color:black" onclick="readContentById(${item.ID})"><li>${item.chapter_name}</li></a>`);
                        });

                    },
                    error: function (xhr, status, error) {
                        $('#data-container').html('An error occurred: ' + error);
                    }
                });
            }

            break;
        }
    }


});


 