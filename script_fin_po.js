$(document).ready(function() {
    load(1);
});

function load(page) {
  var query = $("#q").val();
  var per_page = 8;
  var parameters = {
    action: "ajax",
    page: page,
    query: query,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow").html("<p>Loading...</p>");
  $.ajax({
    url: "listar_po_fina.php",
    data: parameters,
	type: 'GET',
	success: function(response) {
		$(".outer_div").html(response).fadeIn('slow');
	},
	error: function(xhr, status, error) {
		$(".outer_div").html("<p>An error occurred: " + error + "</p>");
	},
	complete: function() {
		$("#loader").fadeOut('slow'); 
	}
  });
}
