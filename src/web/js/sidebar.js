
//quick search functions
$('#quick-search').click(function(e) {
	
	$('#content').load( "search.php" )	
	$.getScript("js/search.js");
	
	
	var building = $('#quick-building').val();
	$.post('db_query.php',{building:building, slot_min:1, slot_max:100}, function(data){
		$("#search_results").html(data);
	});
	return false;
	
});

//Login Function
$(document).ready(function() {

	$("#login").click(function() {

		var action = $("#login-form").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
						location.reload();
					
				else
					$("#invalid").html("Invalid username and/or password.");
			}
		});

		return false;
	});

});




