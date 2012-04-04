
//Loads the first building on the list
$(document).ready(function(){
	$('#post2').load( "data/buildings_info/blitman.txt")
});

//Loads the chosen building
$('#change-building').click(function(e) {
	$('#post2').load( "data/buildings_info/" + $('#building-info').val() + ".txt" )	
});





