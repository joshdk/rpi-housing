
//Loads the main page content
$(document).ready(function(){
	
	$('#content').load( "homepage.php" , function(){ 
	
		$.getScript("js/homepage.js");
		
	})
	
});


//
// menu -- Loads each page's content
//	
//homepage
$('#homepage').click(function(e) {
	
	$('#content').load( "homepage.php" , function(){ 
	
		$.getScript("js/homepage.js");
		
	})
	
});

//buildings
$('#buildings').click(function(e) {
	
	$('#content').load( "buildings.php" , function(){ 
	
		$.getScript("js/buildings.js");
		
	})
	
});


//search
$('#search').click(function(e) {
	
	$('#content').load( "search.php" , function(){ 
	
		$.getScript("js/search.js");
		
	})
	
});

//help
$('#help').click(function(e) {
	
	$('#content').load( "help.php" )	
});

//contact
$('#contact').click(function(e) {
	
	$('#content').load( "contact.php" )	
});


