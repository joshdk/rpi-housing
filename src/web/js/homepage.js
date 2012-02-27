

//Singin Function
$(document).ready(function() {

	$("#signup").click(function() {

		var action = $("#signup-form").attr('action');
		var form_data = {
			username: $("#email").val(),
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == 'success')
						$("#message").html("Success");
			
					
				else
					$("#message").html(response);
			}
		});

		return false;
	});

});





