
//Loads the main page content
$(document).ready(function(){
	
	$('#content').load( "pages/homepage.php")	
});

//
// menu -- Loads each page's content
//	
//homepage
$('#homepage').click(function(e) {
	
	location.reload();
});

//buildings
$('#buildings').click(function(e) {
	
	$('#content').load( "pages/buildings.php")	
});


//search
$('#search').click(function(e) {
	
	$('#content').load( "pages/search.php")	
});

//help
$('#help').click(function(e) {
	
	$('#content').load( "pages/help.php" )	
});

//contact
$('#contact').click(function(e) {
	
	$('#content').load( "pages/contact.php" )	
});


