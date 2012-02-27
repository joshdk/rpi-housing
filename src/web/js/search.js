

$('#advanced-search').click(function(e) {
	
	
	var building = $('#building').val();
	var slot_min = $('#slot_min').val();
	var slot_max = $('#slot_max').val();
	$.post('db_query.php',{building:building, slot_min:slot_min, slot_max:slot_max}, function(data){
		$("#search_results").html(data);
	});
	return false;
	
	
	
});


$('#add-to-queue').click(function(e) {
			
	$('input[type=checkbox]').each(function () {
		if(this.checked){
			alert( $(this).val() );
		}  
	});
	
});





