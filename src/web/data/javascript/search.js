$().ready(function() {	
	
	mboxRegister( '.add', 'pages/popup_registerStudents.php', 'Register Student' );

//Opens jQuery UI Dialog Box For the Lottery Status
function mboxRegister( trigger, source, title ) {
			
	$(trigger).click(
		function (){	
			//define config object
			$.fx.speeds._default = 500;
			var dialogOpts = {
					title: title,
					modal: true,
					autoOpen: false,
					show: "blind",
					closeOnEscape: true,
					draggable: false,
					resizable: false,
					height: 165,
					width: 400,
					open: function() {
					//display correct dialog content
					//$("#dialog-message").load(source);
					}
					};
			$("#dialog-message").dialog(dialogOpts);    //end dialog
			$("#dialog-message").dialog("open");
			return false;
		}
	);				
}


$('.add').click(function(){
		var id = $(this).attr("name");
		$.post("pages/popup_registerStudents.php", { room_id: id }, function(data) {
				$('#dialog-message').html(data);
		});		
	});
});
