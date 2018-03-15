$(document).ready(function() {


	alert()
	$("table").dynatable({
		 inputs: {
    		queries: $('#search-year')
 		 }
	}).queries.add("apellido","rojas");

	$("#dynatable-query-search-").addClass("form-control")


	
	Menu()
});


