$(document).ready(function() {
    load(1); // Load the first page when the document is ready
});

function load(page) {
    var query = $("#q").val();
    var perPage = 8;
    var parameters = {
        action: "ajax",
        page: page,
        query: query,
        per_page: perPage
    };

    // Show the loader at the start of the request
    $("#loader").fadeIn('slow').html("<p>Loading...</p>");

    $.ajax({
        url: 'listar_pop_finalizadas.php',
        data: parameters,
        type: 'GET',
        success: function(response) {
            $(".outer_div").html(response).fadeIn('slow');
        },
        error: function(xhr, status, error) {
            // Handle errors here
            $(".outer_div").html("<p>An error occurred: " + error + "</p>");
        },
        complete: function() {
            // Always executed after the success or error callbacks
            $("#loader").fadeOut('slow'); // Hide the loader
        }
    });
}

