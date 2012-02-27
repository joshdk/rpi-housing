
//Loads the first building on the list
$(document).ready(function(){
	$('#post2').load( "buildings/blitman.txt")
});

//Loads the chosen building
$('#change-building').click(function(e) {
	$('#post2').load( "buildings/" + $('#building-info').val() + ".txt" )	
});





